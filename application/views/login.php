<?php
// $this->output->enable_profiler(TRUE);
  $mensaje = "";

  if(isset($_POST['ws-lg'])){

    $sql = "SELECT * FROM `ciudadanos` WHERE `Email` = ? AND `Documento_identidad` = ?;";
    // $sql = "SELECT * FROM `usuarios` WHERE `usuario` = ? AND `clave_usuario` = ? AND `privilegio` = 'Moderador';";
    // 202cb962ac59075b964b07152d234b70
    $CI =& get_instance();



    $usuario = $_POST['txtEmail'];
    $clave = $_POST['txtClave'];

      $usuarios = $CI->security->xss_clean($usuario);
      $claves = $CI->security->xss_clean($clave);

     $rs = $CI->db->query($sql, array($usuarios, $claves));
     $rs = $rs->result();

     if(count($rs) > 0){
        $_SESSION['votacion'] = $rs[0];
        if($_SESSION['votacion']);

           redirect('');
 
      }else {
       $mensaje .= "Usuario o clave incorrecta";
      }
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assest/css/login.css'); ?>">

  </head>
<body>




<div class="container">
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6 solc-box">
                <div class="nameSocial">
                    <h1>Pare poder votar es necesario iniciar session</h1>
                </div>     

                <div class="sipnoSocial">
                    <h2>Es facil y sensillo solo sigue los pasos</h2>
                </div>
            </div>
            <div class="form-group col-md-6 login-box">
                <div class="form-login">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" name="txtEmail" class="form-control" id="email" placeholder="Introduce tu E-Mail">
                    </div>
                    <div class="form-group">
                        <label for="clave">Contrasena</label>
                        <input type="password" name="txtClave" class="form-control" id="clave" placeholder="Introduce tu clave">
                    </div>

                    <div class="text-center pt-2">
                        <button class="btn btn-primary btn-lg btn-block" name="ws-lg">Entrar</button>
                    </div>
                    <div class="text-center pt-2">
                        <a href="<?php echo base_url();?>">Ir a Inicio</a>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
        <div class="text-center">
                <p id='error'><?php echo $mensaje?></p>
        </div>
     </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</body>