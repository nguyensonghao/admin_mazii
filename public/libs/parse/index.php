<?php 
	
	$object = ParseObject::create("student");

	// Set values:
	$object->set("username", "nguyensonghao");
	$object->set("password", 'thaibinh1994');

	// Save:
	$object->save();

?>