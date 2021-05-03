<?php
    session_start();
    require_once('dbConfig.php');

    $username = $_POST['username'];
    $password =  password_hash($_POST['password'], PASSWORD_DEFAULT);
    $query = '
            SELECT username
            FROM Utenti
            WHERE username = "' . $username . '" 
            ';

    if($connection->query($query)->rowCount() == 0){
        $connection->query("INSERT INTO Utenti (Username, Password) VALUE ('$username', '$password');");
        header("Location: login.php");
    }
    else{
        echo "<script>alert('Username non valido')</script>";
		header("Location: registra.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registrazione</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="POST" action="registra.php">
            <h1>Registrazione</h1>
            <input type="text" id="username" placeholder="Username" name="username">
            <input type="password" id="password" placeholder="Password" name="password">
            <button type="submit" class="btn btn-primary" name="registra">Registrati</button>
            <button type="reset" class="btn btn-danger">Annulla</button> 
            
        </form>
    </body>
</html>