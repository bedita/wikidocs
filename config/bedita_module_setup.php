<?php

$moduleSetup = array(

	'publicName' => 'Wiki docs',
	'author' => 'Channelweb & Chialab',
	'website' => 'http://www.bedita.com',
	'emailAddress' => 'info@bedita.com',
	'description' => 'A module to handle internal documentation/knowledge base',
	// plugin module version
	'version' => '0.5',
	// minimum BEdita version required by this module
	'BEditaMinVersion' => '3.5',
	// maximum BEdita version supported by this module
	//'BEditaMaxVersion' => '3.1',
	// model names that are BEdita objects: i.e. extend BEAppObjectModel
	// don't list other model names (simple models)
	'BEditaObjects' => array('WikiDoc'),
	// extra database tables used/needed by this module 
//	'tables' => array('sample_objects'),
);

?>