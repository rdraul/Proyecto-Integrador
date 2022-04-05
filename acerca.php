<?php
session_start();

// Si se cerro la sesión por otro lado
$definido=isset($_SESSION['usuario']);
// No está definido la variable
if ($definido==false){

    header("Location:error1.php");

  exit();
         
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<title>ComputerSoft - Acerca</title>

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="fonts/style.css">

<link rel="shortcut icon" href="imagen/avatar.jfif" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<style type="text/css">
  .pagina {
   padding:8px 16px;
   border:1px solid #ccc;
   color:#333;
   font-weight:bold;
  }
  .usuario3 {

	color:black;
	font-size:16px;
	
  }
  .navbar{

  	background: black;

  }
  .body1{

  	background:silver;

  }
  .menu2{

  	font-size:24px;
  	color:white;

  }
  p a{
    color: white;
  }
  .encab{

  	font-size:18px;

  }

  .acerca_list{

    font-size:20px;
    padding-left: 20px;

  }

  @media screen and (max-width:400px ) {

  .menu2{

  	font-size:19px;
  	color:black;

   }
   
  }	  
  
</style>
</head>
<body class="body1">

<nav class="navbar navbar-default">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <p class="navbar-brand"><span class="menu2">ComputerSoft</span></p> 
      <p class="navbar-brand"><span class="menu2"><a href="panel.php">Menú</a></span></p> 

    </div>
    
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>

<div class="container">
 
<p class="usuario3">

 	<span class="encab">
 	<span class="text-dark">
	Fecha Sistema: <?php echo $_SESSION['fecha']; ?>
	<br/>
	Usuario: <?php echo $_SESSION['usuario']; ?>
	</span>
	</span>

</p>	

<div class="row">
  <div class="col-md-12">
    <h2>Acerca</h2>
  </div>
</div>
  
<div class="row">

  <div class="col-md-12">
    
    <p class="acerca_list">

      Dirección: Av. Hispanoamericana 100, Santiago De Los Caballeros 51000.
      <br/>
      Telf: 829-751-9699. 
        
    </p>
   
  </div>
</div>

</div>
<br/>
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