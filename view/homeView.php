<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'/>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel='stylesheet' href='css/HomeCss.css'/>
</head>
<body>
    <div id="Fmembre">

        <form method='POST' action='index.php?action=membre'>
            <h1>CONNECTEZ-VOUS COMME MEMBRE</h1><br/>
            <input class='input' type='text' name='username' placeholder='username' required/><br/><br/>
            <input class='input' type='password' name='password' placeholder='password' required/><br/><br/>
            <input class='submit' type='submit' value='LOGIN'/><br/><br/>
            <a href='index.php?action=register'>PAS ENCORE MEMBRE?  INSCRIVEZ-VOUS</a><br/>
        </form>

</div>
<div id="Fadmin">



        <form method='POST' action='index.php?action=admin'>
            <h1>CONNECTEZ VOUS COMME ADMIN</h1><br/>
            <input class='input' type='text' name='username' placeholder='username' required/><br/><br/>
            <input class='input' type='password' name='password' placeholder='password' required/><br/><br/>
            <input class='submit' type='submit' value='LOGIN'/><br/><br/>
        </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>