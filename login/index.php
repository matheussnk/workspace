<?php 
require_once 'db_connect.php';
session_start ();
if(isset($_POST['btn_login']));
     $errors = array();
     $login  = mysqli_escape_string( $connect,$_POST['login']);
     $psw  = mysqli_escape_string( $connect,$_POST['psw']);   
     if (empty($login) or empty($psw));
    $errors[] = "<li> Os campos não foram prenchidos corretamente</li>";
      else :
        $sql ="SELECT login FROM usuarios WHERE login ='$login'";
        $result = mysqli_query ($connect,$sql);
        $psw = md5($psw);
        if(mysqli_num_rows($result) > 0):

          
          $sql ="SELECT * FROM usuarios WHERE login ='$login' AND psw ='$psw'";
            if(mysqli_num_rows($result) == 1):
              $dados = mysqli_fetch_array($result);
              mysqli_close($connect);
              $_SESSION["logado"]=true;
              $_SESSION["id_usuario"]= $dados ['id'];
              header('Location: home.php');
              else :
                $errors = "<li> Usuario ou senha não conferem</li>";
              endif;
          
          
          else :
          $errors = "<li> Usuário não encontrado</li>";
     endif;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
</head>
<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
      <div class="section"></div>

      <h5 class="indigo-text">Painel Administrativo</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='login' id='login' />
                <label for='login'>Usuario</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='psw' />
                <label for='psw'>Senha</label>
              </div>
              <label style='float: right;'>
								<a class='pink-text' href='#!'><b>Esqueceu a sua Senha ?</b></a>
							</label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="#!">Cadastrar-se</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>