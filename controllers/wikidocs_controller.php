<?php
/*-----8<--------------------------------------------------------------------
 * 
 * BEdita - a semantic content management framework
 * 
 * Copyright 2014 ChannelWeb Srl, Chialab Srl
 * 
 * This file is part of BEdita: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * BEdita is distributed WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Lesser General Public License for more details.
 * You should have received a copy of the GNU Lesser General Public License
 * version 3 along with BEdita (see LICENSE.LGPL).
 * If not, see <http://gnu.org/licenses/lgpl-3.0.html>.
 *
 *------------------------------------------------------------------->8-----
 */

/**
 * WikiDocs Controller
 */
class WikidocsController extends ModulesController {

    public $uses = array('WikiDoc');
    public $helpers = array('BeTree', 'BeToolbar');

    protected $moduleName = 'wikidocs';

    public function index($id = null, $order = '', $dir = true, $page = 1, $dim = 20) {
        $objTypeId = Configure::read('objectTypes.wiki_doc.id');
        $filter['object_type_id'] = array($objTypeId);
        $filter['user_created'] = '';
        $filter['count_annotation'] = array('Comment', 'EditorNote');
        $this->paginatedList($id, $filter, $order, $dir, $page, $dim);
    }

    public function view($id = null) {
        $this->viewObject($this->WikiDoc, $id);
        $this->set('objectTypeId', Configure::read('objectTypes.wiki_doc_base.id'));
    }
	
    public function save() {
        $this->checkWriteModulePermission();
        $this->Transaction->begin();
        $this->saveObject($this->WikiDoc);
        $this->Transaction->commit() ;
        $this->userInfoMessage(__('WikiDoc saved', true).' - '.$this->data['title']);
        $this->eventInfo('wiki_doc ['. $this->data['title'].'] saved');
    }
	
    public function delete() {
        $this->checkWriteModulePermission();
        $objectsListDeleted = $this->deleteObjects('WikiDoc');
        $this->userInfoMessage(__('WikiDoc object deleted', true) . ' -  ' . $objectsListDeleted);
        $this->eventInfo("WikiDoc $objectsListDeleted deleted");
    }

    public function deleteSelected() {
        $this->checkWriteModulePermission();
        $objectsListDeleted = $this->deleteObjects('WikiDoc');
        $this->userInfoMessage(__('WikiDoc object', true) . ' -  ' . $objectsListDeleted);
        $this->eventInfo("WikiDoc $objectsListDeleted deleted");
    }

	protected function forward($action, $result) {
		$redirect = array(
			'cloneObject'	=> 	array(
							'OK'	=> '/'.$this->moduleName.'/view/'.@$this->WikiDoc->id,
							'ERROR'	=> '/'.$this->moduleName.'/view/'.@$this->WikiDoc->id 
							),
			'view'	=> 	array(
							'ERROR'	=> '/'.$this->moduleName 
							), 
			'save'	=> 	array(
							'OK'	=> '/'.$this->moduleName.'/view/'.@$this->WikiDoc->id,
							'ERROR'	=> $this->referer()
							),
			'delete' =>	array(
							'OK'	=> $this->fullBaseUrl . $this->Session->read('backFromView'),
							'ERROR'	=> $this->referer()
							),
			'deleteSelected' =>	array(
							'OK'	=> $this->referer(),
							'ERROR'	=> $this->referer() 
							),
			'addItemsToAreaSection'	=> 	array(
							'OK'	=> $this->referer(),
							'ERROR'	=> $this->referer() 
							),
			'changeStatusObjects'	=> 	array(
							'OK'	=> $this->referer(),
							'ERROR'	=> $this->referer() 
							)
		);
		if (isset($redirect[$action][$result])) {
		    return $redirect[$action][$result] ;
		}
		return false ;
	}
	
}
?>
