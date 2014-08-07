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
 * module setup array. Edit the array values
 * 
 *
 * @version			$Revision: 2977 $
 * @modifiedby 		$LastChangedBy: bato $
 * @lastmodified	$LastChangedDate: 2010-09-01 16:16:03 +0200 (Wed, 01 Sep 2010) $
 * 
 * $Id: bedita_module_setup.php 2977 2010-09-01 14:16:03Z bato $
 */
$moduleSetup = array(

	"publicName" => "Wiki docs",
	"author" => "Channelweb & Chialab",
	"website" => "http://www.bedita.com",
	"emailAddress" => "info@bedita.com",
	"description" => "A module for creating and display internal instance documentation",
	// plugin module version
	"version" => "0.1",
	// minimum BEdita version required by this module
	"BEditaMinVersion" => "3.1",
	// maximum BEdita version supported by this module
	//"BEditaMaxVersion" => "3.1",
	// model names that are BEdita objects: i.e. extend BEAppObjectModel
	// don't list other model names (simple models)
	//"BEditaObjects" => array("SampleObject"),
	// extra database tables used/needed by this module 
//	"tables" => array("sample_objects"),
);

?>