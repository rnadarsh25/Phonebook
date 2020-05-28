<?php

$connection = mysqli_connect('localhost', 'root', '', 'phonebook');

if(!$connection){
    die("Connection Failed!".mysqli_error($connection));
}


?>