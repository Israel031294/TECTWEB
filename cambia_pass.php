<?php
	
	require 'funcs/conexion.php';
	require 'funcs/funcs.php';
	
	if(empty($_GET['user_id'])){
		header('Location: index.php');
	}
	
	if(empty($_GET['token'])){
		header('Location: index.php');
	}
	
	$user_id = $mysqli->real_escape_string($_GET['user_id']);
	$token = $mysqli->real_escape_string($_GET['token']);
	
	if(!verificaTokenPass($user_id, $token))
	{
		echo 'No se pudo verificar los Datos';
		exit;
	}
	
	
?>

<html>
	<head>
		<title>Cambiar Password</title>
		
		<link href="./assets/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
		<link href="./assets/lib/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
		<script src="./assets/js/js/bootstrap.min.js" ></script>
	</head>
	
	<body>
		
		<div class="container">    
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
		<div class="panel panel-info" >
			<div class="panel-heading">
				<div class="panel-title">Cambiar Password</div>
				<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>
			</div>     
			
			<div style="padding-top:30px" class="panel-body" >
				
				<form id="loginform" class="form-horizontal" role="form" action="guarda_pass.php" method="POST" autocomplete="off">
					
					<input type="hidden" id="user_id" name="user_id" value ="<?php echo $user_id; ?>" />
					
					<input type="hidden" id="token" name="token" value ="<?php echo $token; ?>" />
					
					<div class="form-group">
						<label for="password" class="col-md-3 control-label">Nuevo Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
					</div>
					
					<div class="form-group">
						<label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
						<div class="col-md-9">
							<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
						</div>
					</div>
					
					<div style="margin-top:10px" class="form-group">
						<div class="col-sm-12 controls">
							<button id="btn-login" type="submit" class="btn btn-primary btn-lg btn-block">Modificar</a>
						</div>
					</div>   
				</form>
			</div>                     
		</div>  
		</div>
		</div>
	</body>
</html>	