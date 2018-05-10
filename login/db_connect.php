<?php 
// Connect your database //
$severname = "localhost";
$username  = "root";
$password  = "";
$db_name   = "sys_control";

$connect = mysqli_connect($severname,$username,$password,$db_name);
if (mysqli_connect()):
    echo"Não foi possivel conectar-se ao banco".mysqli_connect_error();
endif;
?>