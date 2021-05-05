<?php
  include 'dbConfig.php';

  $form = '<!DOCTYPE html>
  <html lang="it">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css">
      <title>Form Acquisto</title>
  </head>
  <body>
    <div class="w-50 mx-auto">
      <form class="mx-auto" method="POST" >
        <div class="form-group row">
          <label  class="col-sm-2 col-form-label">Numero documento:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control w-auto" id="nDoc">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Data emissione:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control col-sm-3" id="dataEmissione">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Data scadenza:</label>
          <div class="col-sm-10">
            <input type="date" class="form-control col-sm-3" id="dataScadenza">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Centro di costo:</label>
          <div class="col-sm-10">
            <select class="form-control col-sm-3">';  
            $result = doQuery("SELECT nome FROM CentroCosto ORDER BY nome ASC");
            foreach($result as $value) {
              $form .= '<option>' . $value['nome'] . '</option>';
            }  
            $form .= '</select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fornitore:</label>
          <div class="col-sm-10">
            <select class="form-control col-sm-3">';  
            $result = doQuery("SELECT nome FROM Fornitore ORDER BY nome ASC");
            foreach($result as $value) {
              $form .= '<option>' . $value['nome'] . '</option>';
            }  
            $form .= '</select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Imponibile:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control w-auto" id="imponibile">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Iva:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control w-auto" id="iva">
          </div>
        </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Metodo di pagamento:</label>
        <div class="col-sm-10">
          <select name="" id="" class="form-control col-sm-3">
            <option value="bonifico">bonifico</option>
            <option value="assegno">assegno</option>
            <option value="contanti">contanti</option>
            <option value="carta di credito">carta di credito</option>
        </select>
        </div>
      </div>
      <div class="form-group row">
        
        <div class="col-sm-10">
          <button type="button" class="btn btn-primary">Aggiungi</button>
          <button type="reset" class="btn btn-danger">Annulla</button> 
        </div>
      </div>
      </div>
      </form>
    </div>
    
  </body>
  </html>';

  echo $form;
?>