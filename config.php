<?php

	$host 		= "localhost";
	$database	= "testdb";
	$username	= "root";
	$password	= "";
	$dsn 		= "mysql:dbname=" . $database . ";host=" . $host;

	try {
		$conn = new PDO($dsn, $username, $password);
	}
	catch (PDOException $ex) {
		echo 'Connection failed: ' . $ex->getMessage();
	}

	function getName($conn, $catid) {
	    $query = "SELECT `name` FROM categories WHERE `id` = VALUES (?)";
	    $qdata = array($catid);

	    $stmt = $conn->prepare($query);
	    $stmt->execute($qdata);
	    
	    $row = $stmt->fetch(PDO::FETCH_ASSOC);    
	    
	    return $row[0];
	}

?>