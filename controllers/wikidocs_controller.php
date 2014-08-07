<?php
/*-----8<--------------------------------------------------------------------
 * 
 * BEdita - a semantic content management framework
 * 
 * Copyright 2010 ChannelWeb Srl, Chialab Srl
 * 
 * This file is part of BEdita: you can redistribute it and/or modify
 * it under the terms of the Affero GNU General Public License as published 
 * by the Free Software Foundation, either version 3 of the License, or 
 * (at your option) any later version.
 * BEdita is distributed WITHOUT ANY WARRANTY; without even the implied 
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the Affero GNU General Public License for more details.
 * You should have received a copy of the Affero GNU General Public License 
 * version 3 along with BEdita (see LICENSE.AGPL).
 * If not, see <http://gnu.org/licenses/agpl-3.0.html>.
 * 
 *------------------------------------------------------------------->8-----
 */

/**
 * Sample Module Controller
 * 
 *
 * @version			$Revision: 2590 $
 * @modifiedby 		$LastChangedBy: bato $
 * @lastmodified	$LastChangedDate: 2010-02-09 14:51:28 +0100 (Tue, 09 Feb 2010) $
 * 
 * $Id: sample_module_controller.php 2590 2010-02-09 13:51:28Z bato $
 */
class WikidocsController extends ModulesController {
	
	public $uses = array("Document");
	var $helpers 	= array('BeTree', 'BeToolbar');
	
	protected $moduleName = 'wikidocs';
	
	public function index($id = null, $order = "", $dir = true, $page = 1, $dim = 20) {
		$conf  = Configure::getInstance() ;
		$filter["object_type_id"] = $this->getModuleObjectTypes('Documents');
		$filter["count_annotation"] = array("Comment","EditorNote");
		$this->paginatedList($id, $filter, $order, $dir, $page, $dim);
	}
	
	public function view($id = null) {
		$this->viewObject($this->Document, $id);
		$this->set("objectTypeId", Configure::read("objectTypes.document.id"));
	}
	
	public function save() {
		$this->checkWriteModulePermission();
		$this->Transaction->begin();
		$this->saveObject($this->Document);
	 	$this->Transaction->commit() ;
 		$this->userInfoMessage(__("Skeleton object saved", true)." - ".$this->data["title"]);
		$this->eventInfo("skeleton_object [". $this->data["title"]."] saved");
	}
	
	public function delete() {
		$this->checkWriteModulePermission();
		$objectsListDeleted = $this->deleteObjects("Document");
		$this->userInfoMessage(__("Sample object deleted", true) . " -  " . $objectsListDeleted);
		$this->eventInfo("Document $objectsListDeleted deleted");
	}
	
	public function deleteSelected() {
		$this->checkWriteModulePermission();
		$objectsListDeleted = $this->deleteObjects("Document");
		$this->userInfoMessage(__("Sample object", true) . " -  " . $objectsListDeleted);
		$this->eventInfo("Document $objectsListDeleted deleted");
	}
	
	protected function forward($action, $esito) {
		$REDIRECT = array(
			"cloneObject"	=> 	array(
							"OK"	=> "/".$this->moduleName."/view/".@$this->Document->id,
							"ERROR"	=> "/".$this->moduleName."/view/".@$this->Document->id 
							),
			"view"	=> 	array(
							"ERROR"	=> "/".$this->moduleName 
							), 
			"save"	=> 	array(
							"OK"	=> "/".$this->moduleName."/view/".@$this->Document->id,
							"ERROR"	=> $this->referer()
							),
			"delete" =>	array(
							"OK"	=> $this->fullBaseUrl . $this->Session->read('backFromView'),
							"ERROR"	=> $this->referer()
							),
			"deleteSelected" =>	array(
							"OK"	=> $this->referer(),
							"ERROR"	=> $this->referer() 
							),
			"addItemsToAreaSection"	=> 	array(
							"OK"	=> $this->referer(),
							"ERROR"	=> $this->referer() 
							),
			"changeStatusObjects"	=> 	array(
							"OK"	=> $this->referer(),
							"ERROR"	=> $this->referer() 
							)
		);
		if(isset($REDIRECT[$action][$esito])) return $REDIRECT[$action][$esito] ;
		return false ;
	}
	
}
?>
