<?php
    include './dbConfig.php';
    session_start();
    try{
		$connection = new PDO( "mysql:host=$host;dbname=$dbname;", $username, $password);
			
        if(isset ($_POST['btn-cc'])){
            $query = "INSERT INTO CentroCosto ('Nome', 'Citta', 'Cap', 'Via', 'nCivico') VALUES (:nome, :citta, :cap, :via, :ncivico)";
            $data = ['nome'=> $_POST['nome'], 'citta' => $_POST['citta'], 'cap' => $_POST['cap'], 'via' => $_POST['via'], 'nCivico' => $_POST['nCivico']];  
            $result = $connection->prepare($query);  
            $result->execute($data);
        }
        else if(isset ($_POST['btn-fornitori'])){
            $query = "INSERT INTO Fornitore ('Nome', 'Citta', 'Cap', 'Via', 'nCivico') VALUES (:nome, :citta, :cap, :via, :ncivico)";
            $data = ['nome'=> $_POST['nome'], 'citta' => $_POST['citta'], 'cap' => $_POST['cap'], 'via' => $_POST['via'], 'nCivico' => $_POST['nCivico']];  
            $result = $connection->prepare($query);  
            $result->execute($data);
        }
        else if(isset ($_POST['btn-prodotti'])){
            $query = "INSERT INTO Prodotto ('Nome', 'Prezzo', 'Peso') VALUES (:nome, :prezzo, :peso)";
            $data = ['nome'=> $_POST['nome'], 'prezzo' => $_POST['prezzo'], 'peso' => $_POST['peso']];  
            $result = $connection->prepare($query);  
            $result->execute($data);
        }

    }catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br>";
        die();  
    }finally{
        $connection = null;
    }

?>