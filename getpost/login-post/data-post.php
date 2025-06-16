<?php

    $usern = $_POST['name'];
    $contra = $_POST['pw'];
    $def_pw = 10293;

    if($contra == $def_pw){
        echo $usern . "inicio de sesion succesful";
    }else{
        echo "error, incorrect password";
    }

    //echo $nombre;
    //echo "<br>";
    //echo $edad;

?>