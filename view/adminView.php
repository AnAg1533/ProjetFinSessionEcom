<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'/>
    <title>IM NOT GAY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
        form
        {   
            margin:auto;
            margin-top:30px;
            padding:10px;
            border:solid black 1px;
            width:350px;
            display:flex;
            justify-content:space-evenly;
            align-items:center;
            flex-direction:column;
        }
        tr,td,th
        {
            border:solid black 2px;
            text-align:center;
            width:10px;
        }
        table
        {
            width:700px;
            margin:auto;
            margin-top:20px;
        }
    
        img
        {
          height:120px;
          width:120px;
        }

    </style>
</head>


<form method='POST' action='index.php?action=addProduct' enctype='multipart/form-data'>
        <h1>AJOUTER DES PRODUITS</h1><br/>
    <input  type='text' name='titre' placeholder='titre'> <br/>
    <input  type='text' name='couleur' placeholder='couleur'> <br/>
    <input  type='text' name='enstock' placeholder='en stock'> <br/>
    <input  type='text' name='prix' placeholder='prix'> <br/>
    <input  type='file' name='photo'>   <br/>
    <input type='submit' placeholder='AJOUTER' name='submit'/> <br/>
</form>


<table>
  <tr>
    <th>TITRE</th>
    <th>COULEUR</th>
    <th>ENSTOCK</th>
    <th>PRIX</th>
    <th>IMAGE</th>
  </tr>
  <?php 

    $Product->GetAll();
  
  ?>

</table>

<table>
  <tr>
      <td>Name</td>
      <td>LASTNAME </td>
      <td>USERNAME</td>
      <td>PASSWORD</td>
  </tr>
  <?php 

$User->GetAll();

?>
</table>


<br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>



