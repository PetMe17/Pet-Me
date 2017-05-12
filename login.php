<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>

<?php

if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: index.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $peticion = "SELECT * FROM usuarios WHERE correo='".$username."' AND password='".$password."'";

    $query =mysql_query($peticion);

    $numrows=mysql_num_rows($query);

    if($numrows!=0)
    {
        while($row=mysql_fetch_assoc($query))
        {
        $dbusername=$row['correo'];
        $dbpassword=$row['password'];
        $dbnombre=$row['nombre'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {


    $_SESSION['session_username']=$dbnombre;

    /* Redirect browser */
    header("Location: index.php");
    }
    } else {

 $message =  "Nombre de usuario ó contraseña invalida!";
    }

} else {
    $message = "Todos los campos son requeridos!";
}
}
?>
  
  <title>PetMe: Iniciar Sesion</title>
<?php include("includes/header.php"); ?>
<link href="css/freelancer.min.css" rel="stylesheet">

<div class="container mlogin login">
    <div id="login">
             <img src="img/logo1.png" href="index.php">
        <h1>Iniciar Sesion</h1>

        <form name="loginform" id="loginform" action="" method="POST">
            <p>
            <input type="email" name="username" id="username" placeholder="Correo Electronico" class="input" required="requiered" /></label>
            </p>
            
            <p>
            <input placeholder="Contraseña" type="password" name="password" id="password" class="input" requiered="requiered" /></label>
            </p>

            <p class="submit">
            <input type="submit" name="login" class="button btn btn-primary btn-block btn-large" value="Entrar" />
            </p>

            <p class="regtext">No estas registrado? <a href="register.php" >Registrate Aquí</a>!</p>

        </form><?php include("includes/footer.php"); ?>

    </div>

</div>
	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	