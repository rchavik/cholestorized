<?php

class News extends AppModel {
	var $name = 'News';
	var $belongsTo = array(
	'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
		)
	);
}
