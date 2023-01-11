<?php
//connecting DB
$connect = mysqli_connect('localhost','Kamran','test123','pizza_box');

//checking DB connection
if(!$connect){
    echo 'connection unstable' . mysqli_connect_error();
}

?>