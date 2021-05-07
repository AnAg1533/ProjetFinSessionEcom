<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'/>
    <title>IM NOT GAY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel='stylesheet' href='css/style2.css'/>
</head>


<body>
<h1 class='logo'>E-COMMERCE.ORG</h1>
<div class='prod'>
    <?php while($data= $sql->fetch()){?>
    
    <div class='card'>

    <img src='uploads/<?=$data['photo']?>' class='productImage' />
    <div>

      

        <h2><?=$data['titre']?></h2>

        <h3>PRIX : <?=$data['price']?></h3>
        <h3>EN STOCK : <?=$data['enStock']?></h3>
        <h3>COULEUR : <?=$data['color']?></h3>

        <a href='index.php?action=SHOP&id=<?=$data['id']?>' class='learnMore'>SHOP</a>

    </div>

    <?php
        }
    ?>
    
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>