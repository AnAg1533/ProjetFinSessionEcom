<?php 


        require('controller/controller.php');
        if(isset($_GET['action']))
        {
            if($_GET['action']=='register')
            {
                  RegisterPage();
            }
            else if ($_GET['action']=='registerPost')
            {
                RegisterUser();
            }
           
            else if($_GET['action'] == 'admin')
            {
                
                
            }
            else if($_GET['action'] == 'register')
            {

            }
            else if($_GET['action'] == 'membre')
            {   

            }
            else if($_GET['action'] == 'logout')
            {   

            }  
            else if ($_GET['action'] == 'newPost')
            {

            }
            else if($_GET['action'] == 'nouveauPost')
            {
                if($_POST['destinataire'] == "public")
                {

                }
                else
                {

                }

            }
            else if($_GET['action'] == 'Modifier' && isset($_GET['id']))
            {

            }
            else if($_GET['action'] == 'Supprimer' && isset($_GET['id']))
            {


            }
            else if($_GET['action'] == 'modifierPost')
            {
                header('location:index.php');
            }
        }
        else
        {
            Home();
        }




?>