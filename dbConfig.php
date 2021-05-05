<?php

    $host = 'localhost';
    $dbname = 'dbsavinitartufi';
    $username = 'root';
    $password = '';
<<<<<<< HEAD
    
=======

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
>>>>>>> cf23250a5debba764ad0130574bc839f22a71fcb

?>
