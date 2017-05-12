<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<title>PetMe: Registrar Usuario</title>


<?php

	if(isset($_POST["register"])){


	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$full_name=$_POST['full_name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];

		

			
		$query=mysql_query("SELECT * FROM usuarios WHERE correo='".$email."'");
		$query2=mysql_query("SELECT * FROM usuarios WHERE nombre='".$full_name."'");

		$numrows=mysql_num_rows($query)+mysql_num_rows($query2) ;

		
		if($numrows==0)
		{
		$sql="INSERT INTO usuarios
				(nombre,correo,telefono,password) 
				VALUES('$full_name','$email', '$phone', '$password')";

		$result=mysql_query($sql);

		if($result){
		 $message = "El usuario ah sido registrado con exito!";
		} else {
		 $message = "Error al ingresar datos de la informacion!";
		}

		} else {
		 $message = "Un usuario con este correo o nombre ya existe! Por favor, intenta con otro!";
		}

	} else {
		 $message = "Se omitio un campo obligatorio!";
	}
	}
?>
	<h1 class="aviso"><?php if (!empty($message)) {echo "<p class=\"error\">" . "Atencion: ". $message . "</p>";} ?></h1>
<div class="container mlogin login">
	<div id="login">
		<h1>Registrar Usuario</h1>
		<form name="loginform" id="loginform" action="register.php" method="POST">
			<p>
				<input type="text" name="full_name" id="full_name" class="input" required="requiered" placeholder="Nombre Completo" maxlength="50" /></label>
			</p>
			
			
			<p>
				<input type="email" name="email" id="email" class="input" requiered="requiered" placeholder="Correo Electronico" maxlength="60" /></label>
			</p>
			
			<p>
				<input type="password" name="password" id="password" class="input" requiered="requiered" placeholder="Contraseña" maxlength="25" /></label>
			</p>

			<p>
				<input type="number" name="phone" id="username" class="input" placeholder="Telefono (Opcional)" minlength="10" maxlength="10"/></label>
			</p>

			<p class="submit">
				<input type="submit" name="register" id="register" class="button btn btn-primary btn-block btn-large" value="Registrar" />
			</p>
			
			<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
		</form><?php include("includes/footer.php"); ?>
	</div>
</div>
