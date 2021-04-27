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
            else if($_GET['action']=='loggedIn')
            {
                Store();
            }
            else if($_GET['action']='learnMore')
            {
                LearnMore();
            }

        }
        else
        {
            Home();
        }




?>