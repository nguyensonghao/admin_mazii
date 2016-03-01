

<?php 

	require 'BaseHome.php';
	require 'autoload.php';
	use Parse\ParseClient;
	ParseClient::initialize( 'se2LjpDpmoUTEKVs1PuULwirXZWq2YR2jXXQEkjc', '9QhhA5VfHjgqCDOLOuKSSxbMxT1Dn4seac6fOsIM', 'dcpCwpx1ZwQ5ALG3sHdRulieKMYtKedPCTCzx74B' );
	use Parse\ParseObject;
	use Parse\ParseQuery;
	use Parse\ParseACL;
	use Parse\ParsePush;
	use Parse\ParseUser;
	use Parse\ParseInstallation;
	use Parse\ParseException;
	use Parse\ParseAnalytics;
	use Parse\ParseFile;
	use Parse\ParseCloud;

	class Student {

		public function addStudent () {
			$object = ParseObject::create("student");

			// Set values:
			$object->set("username", "nguyenthanhnam");
			$object->set("password", 'thaibinh1994');

			// Save:
			$object->save();
		}

		public function getStudent () {
			$query = new ParseQuery('student');
			return $query->find();
		}

	}

	$student = new Student();
	$listStudent = $student->getStudent();
	foreach ($listStudent as $key => $value) {
		echo "<h1>".$value->get('username')."</h1>";
	}

?>