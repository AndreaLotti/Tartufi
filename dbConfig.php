<?php

    $host = 'localhost';
    $dbname = 'dbsavinitartufi';
    $username = 'root';
    $password = '';

    function doQuery($query){
        try{
			$connection = new PDO( "mysql:host=$host;dbname=$dbname;", $username, $password);
            $result = array();
            foreach($connection->query($query) as $index=>$value){
                array_push($result, $value);
            }
			
		}catch(PDOException $e){
			print "Error!: " . $e->getMessage() . "<br>";
            die();
		}
        return $result;
    }

?>
