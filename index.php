<?php

require '/app/autoload.php';

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title ></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="./css/app.css" >
        <style> 
        </style>
    </head>     
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <a class="btn btn-primary navbar-btn" href="./">Home</a>
            </div>
        </nav>
        <div class="container">

            <?php
            if (!isset($_GET['page'])):
                app\controllers\HomeController::index();
            else :
                switch ($_GET['page']) {
                    case "home":
                        app\controllers\HomeController::index();
                        break;

                    case "clients":
                        \app\controllers\ClientController::namesList($_GET['order']);
                        break;

                    case "showClient":
                        app\controllers\ClientController::show($_GET['id']);
                        break;
                    
                    default:
                        app\controllers\HomeController::index();
                        break;
                }
            endif;
            ?>
        </div>
        <script>document.getElementsByTagName("TITLE")[0].text = document.getElementById("title").innerHTML;</script>
    </body>
</html>
