<?php
    ob_start();
    session_start();

    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location: login.php");
    }

    if(!isset($_SESSION['logged']))
        header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Gestione fatture Savini Tartufi</title>
    </head>
    <body>
    <img src="./img/logo.png">
        <h1>Home</h1>
        <a href="formVendita.php"><button class="btn btn-primary">Inserisci fatt vendita</button></a>
            <a href="formAcquisto.php"><button class="btn btn-primary">Inserisci fatt acquisto</button></a>
            <a href="formCentriCosto.html"><button class="btn btn-primary">Inserisci centro di costo</button></a>
            <a href="formFornitori.html"><button class="btn btn-primary">Inserisci fornitore</button></a>
            <a href="formProdotti.html"><button class="btn btn-primary">Inserisci prodotto</button></a>
            <a href="ricercaFatture.php"><button class="btn btn-primary">Ricerca fattura</button></a>
        <form action="index.php" method="post">   
            <button type="submit" class="btn btn-danger" name="logout">Esci</button>
        </form>
    </body>
</html>