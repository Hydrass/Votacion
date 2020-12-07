<?php
// $this->output->enable_profiler(TRUE);
  $mensaje = "";

  if(isset($_POST['ws-lg'])){

    $sql = "SELECT * FROM `ciudadanos` WHERE `Email` = ? AND `Documento_identidad` = ?;";
    // $sql = "SELECT * FROM `usuarios` WHERE `usuario` = ? AND `clave_usuario` = ? AND `privilegio` = 'Moderador';";
    // 202cb962ac59075b964b07152d234b70
    $CI =& get_instance();



    $usuario = $_POST['txtEmail'];
    $clave = $_POST['txtPassword'];

     echo $usuarios = $CI->security->xss_clean($usuario);
     echo $claves = $CI->security->xss_clean($clave);

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
    
    <link rel="stylesheet" href="<?php echo base_url('assest/css/estilos.css'); ?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->
    
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    

    <script src="<?php echo base_url('assest/js/js.js');?>"></script>
<body>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="http://d2r8jqmejizzox.cloudfront.net/361456-853098-65x38-logofinal.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse style= collapse in" id="bs-megadropdown-tabs" style="
    padding-left: 0px;
">

        <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-globe"></i> Inicio</a></li>
            <li><a href="<?php echo base_url('candidatos'); ?>"><i class="fa fa-globe"></i> Candidatos</a></li>
            <li><a href="<?php echo base_url('partidos'); ?>""><i class="fa fa-university"></i> Partidos</a></li>

            <li><a href="<?php echo base_url('ciudadanos'); ?>""><i class="fa fa-university"></i> Ciudadanos</a></li>
            <li><a href="<?php echo base_url(''); ?>""><i class="fa fa-university"></i> Puesto electivo</a></li>
            <li><a href="<?php echo base_url(''); ?>""><i class="fa fa-university"></i> Elecciones</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

<?php if (isset($_SESSION['votacion'])): ?>
        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong><strong><?php echo $_SESSION['votacion']->Nombre; ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul style="background-color:white;" class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $_SESSION['votacion']->Nombre; ?></strong></p>
                                        <p class="text-left small"><?php echo $_SESSION['votacion']->Email; ?></p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="<?php echo base_url('cerrar_session'); ?>" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
<?php else: ?>              
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">REGISTRARSE <span class="caret"></span></a>
             <ul id="login-dp" class="dropdown-menu">
    			<li>
					 <div class="row">
							<div class="col-md-12">
								 <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email</label>
											 <input type="email" name="txtEmail" class="form-control" id="exampleInputEmail2" placeholder="Email address" required="">
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Contraseña</label>
											 <input type="password" name="txtPassword" class="form-control" id="exampleInputPassword2" placeholder="Password" required="">
                                             <div class="help-block text-right"><a href="">¿Olvidaste la contraseña?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" name="ws-lg" class="btn btn-primary btn-block">Registrarse</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> Mantenme conectado
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
                            Nuevo aquí? <a href="#"><b>Únete a nosotros</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
        <?php endif ?>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>