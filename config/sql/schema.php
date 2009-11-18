<?php 

class CholesterolizedSchema extends CakeSchema {
	var $name = 'Cholesterolized';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}

	var $news = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'title' => array('type' => 'string'),
		'body' => array('type' => 'string'),
		'created_by' => array('type' => 'integer'),
		'created' => array('type' => 'datetime'), //'default' => '0000-00-00 00:00:00', 'null' => false),
		'modified' => array('type' => 'datetime'),
	);

	var $users = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'login' => array('type' => 'string'),
	);
}
?>
