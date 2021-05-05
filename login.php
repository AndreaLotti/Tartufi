<?php
	require_once './dbConfig.php';
	session_start();
	if(isset($_POST['login'])) {
		$query  = "SELECT password FROM utente WHERE Username = '" . $_POST['username'] . "';";
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

		if(count($result) != 0) {

			if(strcmp($_POST['password'], $result[0]['password']) == 0) {
				$_SESSION['logged'] = true;
                echo "1";
				header("Location: index.php");
            } else $_SESSION['div-error'] = true;
            
		}else $_SESSION['div-error'] = true;
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="stile.css">
    </head>
    <body>
        <form id="loginForm" method="POST" action="login.php">
            <h1>Login</h1>
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="password" id="password" placeholder="Password" name="password">
            <button type="submit" class="btn btn-primary" name="login" id="login">Accedi</button>
            <button type="reset" class="btn btn-danger">Annulla</button> 
            <div <?php if(!isset($_SESSION['div-error'])) echo 'hidden'; ?> >
                <p id="err">Username o password errati</p>
            </div>
            <?php
                unset($_SESSION['div-error']);
            ?>
        </form>
    </body>
</html>

