<?php 
require_once 'db_connect.php';
session_start ();
if(isset($_SESSION['logado']):
    header('Location : index.php')
endif;

    $id =  $_SESSION["id_usuario"];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = mysqli_query($connect,$sql);
    $dados = mysqli_fetch_array($result);
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | Painel </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1> Olá <?php echo $dados['nome']; ?> </h1>
    <a href="logout.php">Deslogar</a>
    
</body>
</html>