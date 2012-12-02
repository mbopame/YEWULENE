<?php

  if (isset($_POST["login"])) {
                $login=$_POST["login"];
                $pass=$_POST["passe"];
                $_SESSION["login"]=$login;
                if ($login=="c4a" AND $pass=="c4a") {
                       //header("Location: admin1.php");
					  // 	include"../dao/user_db.php";
 //dumpMySQL_end("seninfo",3);
                       include"admin1.php";
                }
                else{
                      header("Location: index.php?id=1");
                }
        }
        else{
             header("Location: index.php?id=1");
        }
?>