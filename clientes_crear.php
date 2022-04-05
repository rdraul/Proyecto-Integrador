<?php 
require("coneccion/connection.php");
session_start();

// Si se cerro la sesión por otro lado
$definido=isset($_SESSION['usuario']);
// No está definido la variable
if ($definido==false){

    header("Location:error1.php");
    exit();
         
}

// Viene de valida cliente crear
if(isset($_GET['nac'])) {

    $nac=$_GET['nac'];
    $cedula=$_SESSION['cedula'];
    $rif_final=$_SESSION['rif_final'];
    $nombres=$_SESSION['nombres'];
    $apellidos=$_SESSION['apellidos'];
    $telefono=$_SESSION['telefono'];
    $direccion=$_SESSION['direccion'];
    $correo=$_SESSION['correo'];
   
}else{

  $nac="";
  $cedula="";
  $rif_final="";
  $nombres="";
  $apellidos="";
  $telefono="";
  $direccion="";
  $correo="";

}

?>
<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>ComputerSoft - Clientes - Crear - Form</title>

<link rel="stylesheet" href="demo/libs/bundled.css">
<script src="demo/libs/bundled.js"></script>
<script src="js/jquery-latest.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-confirm.css"/>
<script type="text/javascript" src="js/jquery-confirm.js"></script>

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="fonts/style.css">

<link rel="shortcut icon" href="imagen/avatar.jfif" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<style type="text/css">

  .usuario3 {

    color:black;
    font-size:16px;
  
  }

  .th_color{

    background: green;

  }
  .navbar{

    background: black;

  }
  .body1{

    background:silver;

  }
  .menu2{

    font-size:24px;
    color: white;

  }
  .encab{

    font-size:18px;

  }
  @media screen and (max-width:400px ) {

  .menu2{

    font-size:19px;
    color:black;

   }
   
  }   

</style>

<script>

  $(document).on('ready',function(){

    $('#btn-enviar').click(function(){

      // confirmation
      $.confirm({
      title: 'Mensaje',
      content: '¿Confirma en guardar?',
      animation: 'scale',
      closeAnimation: 'zoom',
        buttons: {
          confirm: {
          text: 'Si',
          btnClass: 'btn-orange',

            action: function(){

               var url = "clientes_crear_validar.php";     

               $.ajax({                        
               type: "POST",                 
               url: url,                    
               data: $("#formulario_cliente").serialize(),
               beforeSend: function () {
                $("#resp").html("<img src='imagen/loader-small.gif'/><font color='green'>&nbsp&nbspProcesando, por favor espere...</font>");
               },
               success: function(data)            
               {
                $('#resp').html(data);           
               }
               });          
             
            } // action: function(){

          }, // confirm: {

          cancelar: function(){
              
          } // cancelar: function()
    
        } // buttons
  
      }); // $.confirm

    });

  });

</script>

</head>
<body class="body1">

<nav class="navbar navbar-default">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <p class="navbar-brand"><span class="menu2">ComputerSoft</span></p> 
      <p class="navbar-brand"><span class="menu2"><a href="panel.php">Menu</a></span></p> 
      <p class="navbar-brand"><span class="menu2"><a href="buscar_clientes.php">Volver</a></span></p> 

  </div>
    
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<div class="container">

  <p class="usuario3">

	 <span class="encab">
   <span class="text-danger">
    Fecha: <?php echo $_SESSION['fecha']; ?>
	  <br/>
	  Usuario: <?php echo $_SESSION['usuario']; ?>
   </span>  
	 </span>	

  </p>

  <h4>Crear Cliente</h4>

    <form id="formulario_cliente" class="form-horizontal" method="post" action="return false" onsubmit="return false">

      <div class="form-group">
        <label for="cedula" class="control-label col-md-2">Cédula:</label>
        <div class="col-md-1">
          
            <div class="input-group">
            <input id="nac" style="width:50px" class="form-control" type="text" name="nac" size="1" maxlength="3" autofocus value="<?php echo $nac ?>"/>
            <span class="input-group-addon">-</span>
            <input id="cedula" style="width:150px" class="form-control" type="text" name="cedula" size="20" maxlength="20" value="<?php echo $cedula ?>"/>
            <span class="input-group-addon">-</span>
            <input id="rif_final" style="width:38px" class="form-control" type="text" name="rif_final" size="1" maxlength="1" value="<?php echo $rif_final ?>"/>
            </div>
            <span class="input-group-addon">por ejemplo: 031-1025685-1 o 031-10254856-2</span>

        </div>

      </div>

      <div class="form-group">
        <label for="nombres" class="control-label col-md-2">Nombres:</label>
        <div class="col-md-9">
          <input id="nombres" class="form-control" type="text" name="nombres" value="<?php echo $nombres ?>" size="20" maxlength="20" />
        </div>
      </div>

      <div class="form-group">
        <label for="nombres" class="control-label col-md-2">Apellidos:</label>
        <div class="col-md-9">
          <input id="apellidos" class="form-control" type="text" name="apellidos" value="<?php echo $apellidos ?>" size="20" maxlength="20" />
        </div>
      </div>

      <div class="form-group">
        <label for="telefono" class="control-label col-md-2">Teléfono:</label>
        <div class="col-md-9">
          <input id="telefono" class="form-control" type="text" name="telefono" value="<?php echo $telefono ?>" size="50" maxlength="50" />
        </div>
      </div>

      <div class="form-group">
        <label for="direccion" class="control-label col-md-2">Dirección:</label>
        <div class="col-md-9">
          <input id="direccion" class="form-control" type="text" name="direccion" value="<?php echo $direccion ?>" size="100" maxlength="100" />
        </div>
      </div>

      <div class="form-group">
        <label for="correo" class="control-label col-md-2">Correo:</label>
        <div class="col-md-9">
          <input id="correo" class="form-control" type="text" name="correo" value="<?php echo $correo ?>" size="50" maxlength="50" />
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-1 col-md-offset-2">
          <button id="btn-enviar" class="btn btn-success" /><b>Guardar</b></button>
        </div>
      </div>

      <div>&nbsp&nbsp</div>
      <div id="resp"></div>

    </form>

</div>

<div id="resultado"></div>
<br/>

<?php 

    if ( isset($_SESSION['cliente_mensaje']) && $_SESSION['cliente_mensaje'] == "si" ) {

      $_SESSION['cliente_mensaje']='no';
      $contenido_mensaje=$_SESSION['contenido_mensaje_cliente'];
      echo "<script>
        
        $.alert({

              title: 'Mensaje',
              content: '<span style=color:red>$contenido_mensaje.</span>',
              animation: 'scale',
              closeAnimation: 'scale',
              buttons: {
                okay: {
                    text: 'Cerrar',
                    btnClass: 'btn-warning'
                }
              }
          }); 

      </script>";

    }

?>

<div class="panel-footer">
  <div class="container">
    <?php 
  	// mini Sistemas cjcv
  	require("mini.php"); 
	?>
  </div>
</div>
</body>
</html>