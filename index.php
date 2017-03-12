<?php
class MyDB extends SQLite3 {
	function __construct() {
		$this->open('company.db');
	}
}
$db = new MyDB();
if (!$db) {
	echo $db->lastErrorMsg();
} else {
	echo 'Open db successfully';
}

?>

<?php
	
		if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['salary'])) {
		$sql = "INSERT INTO employee (firstname, lastname, salary) 
		VALUES (\"{$_POST['firstname']}\", \"{$_POST['lastname']}\", \"{$_POST['salary']}\")";	
		}
		
		$res = $db->exec($sql);
		if (!$res) {
			echo "Eroare" . $db->lastErrorMsg();
		} else {
			echo "Saved successfully<br />";
		}

		$sql = 'SELECT * from employee ORDER BY salary DESC';

	    $result = $db->query($sql);
	    while($row = $result->fetchArray(SQLITE3_ASSOC) ){
	      echo "Firstname = ". $row['firstname'] ."\n";
	      echo "Lastname = ". $row['lastname'] ."\n";
	      echo "Salary =  ".$row['salary'] ."\n\n<br />";
	    }
	    echo "Operation done successfully\n";
	   
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Employee</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<br /><br /><br />
	<form action="index.php" method="POST">
		Firstname: <input type="text" name="firstname"><br />
		Lastname: <input type="text" name="lastname"><br />
		Salary: <input type="text" name="salary"><br />
		<input type="submit" name="Save">
	</form>
</body>
</html>


	