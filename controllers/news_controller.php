<?php
// vim: set ts=4 sts=4 sw=4 si noet:

class NewsController extends AppController {

	function example() {
	}

	function get_news() {
		$this->Jqgrid->find('News', array(
			'contain' => array('User.login'),
			'recursive' => 0,
			'fields' => array(
				'News.id', 'News.title', 'News.body', 
				'News.created', 'News.modified', 'User.login'
				)
			)

		);
	}
}
