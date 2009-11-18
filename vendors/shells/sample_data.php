<?php
// vim: set ts=4 sw=4 sts=4 si noet:

class SampleDataShell extends Shell {

	function load() {

		$user = ClassRegistry::init('User');

		$data = $user->create(array(
			'id' => 1,
			'login' => 'markstory',
			)
		);
		$user->save($data);

		$data = $user->create(array(
			'id' => 2,
			'login' => 'predominant',
			)
		);
		$user->save($data);


		$news = ClassRegistry::init('News');

		for ($i = 1; $i <= 10; $i++) {
			$data = $news->create(array(
				'title' => 'News title ' . $i,
				'body' => 'News body no: ' . $i,
				'created_by' => ($i % 2) + 1
				)
			);
			$news->save($data);
		}

		$this->out("\nSample data loaded successfully.\n");
	}


	function main() {
		$this->load();
	}
}

?>
