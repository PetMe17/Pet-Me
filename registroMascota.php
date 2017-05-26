<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<title>PetMe: Registrar Mascota</title>

<?php
    if(isset($_POST["enviar"])){

        if (!empty($_POST['titulo']) && !empty($_POST['categoria']) && !empty($_POST['edad']) && !empty($_POST['lugar']) && !empty($_POST['descripcion']) /*&& !empty($_POST['image'])*/)
        {
            $titulo=$_POST['titulo'];
            $categoria=$_POST['categoria'];
            $edad=$_POST['edad'];
            $image=$_POST['image'];
            $lugar=$_POST['lugar'];
            $descripcion=$_POST['descripcion'];
            //$hoy = getdate();

            $sql = "INSERT INTO publicacion_mascotas(titulo, descripcion, categoria, edad_mascota, lugar, imagen) VALUES('$titulo','$descripcion','$categoria','$edad','$lugar','$image')";

            $resultQuery = mysql_query($sql);

            if ($resultQuery){
                $message = "La mascota ha sido registrada con exito!";
            }else{
                $message = "Error al registrar la mascota!";
            }
        } else {
            $message = "Se omitio un campo obligatorio!";
        } 
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Modal</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>


<!-- Trigger -->
<div class="boton" onclick="desplegar()">
    <div class="txt">
        Registrar Mascota
    </div>

</div>
<br>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">

        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Registrar mascota</h2>
        </div>

        <h1 class="aviso"><?php if (!empty($message)) {echo "<p class=\"error\">" . "Atencion: ". $message . "</p>";} ?></h1>
        <div class="modal-body">
            <!-- Show feedback sent -->
            <div class="result">
                Registrado correctamente
            </div>

            <!-- form -->
            <div class="form">

                <!-- <form action="" -->
                <form id="formulario" name="form" method="post" enctype="multipart/form-data" action="">


                    <!-- Title -->
                    <label for="titulo">Titulo</label>
                    <input type="text" id="titulo" maxlength="30" name="titulo" value="">


                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria">
                        <option value="Perros" name="categoria">Perros</option>
                        <option value="Gatos" name="categoria">Gatos</option>
                    </select>

                    <!-- Tel num  -->
                    <label for="edad">Edad</label>
                    <input type="text" id="edad" name="edad" placeholder="Años de la mascota">

                    <!-- Fecha
                    <label for="date">Fecha</label>
                    <input type="text" readonly="readonly" name="date" id="date" value="">
                    -->

                    <!-- Part num
                    <label for="numeroParte">Numero de Parte</label>
                    <input type="text" readonly="readonly" id="numeroParte" name="numeroParte" value="%%GLOBAL_SKU%%"
                           autocomplete="off" class="txtinput">
                    -->

                    <!--
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="50" value="1">
                    -->


                    <!-- URL -->
                    <input type="hidden" name="url" id="url" value="">

                    <label for="lugar">Lugar</label>
                    <select id="lugar" name="lugar">
                        <option value="Ensenada" name="lugar">Ensenada</option>
                        <option value="Tecate" name="lugar">Tecate</option>
                        <option value="Tijuana" name="lugar">Tijuana</option>
                    </select>
                    <br>
                    <!-- Comment  -->
                    <label for="descripcion">Descripción</label>
                    <div class="descripcion">
                        <textarea name="descripcion" id="descripcion" placeholder="Describe a la mascota" class="texto"
                                  rows="5"></textarea>
                    </div>

                    <!-- Subir imagen -->
                    <input type="HIDDEN" name="MAX_FILE_SIZE" value="102400">
                    <input type="file" name="image" id="image">


                    <!-- Captcha -->
                    <div class="captcha">
                        <div class="g-recaptcha" data-sitekey=""
                             data-callback="YourOnSubmitFn"></div>
                    </div>

                    <!-- Submit -->
                    <div class="sub">
                        <input type="submit" id="enviar" name="enviar" value="Registrar">
                    </div>


                </form>

            </div>
        </div>


        <div class="modal-footer">
            <h3></h3>
        </div>

    </div>

</div>


<script src='js/myScript.js' charset="utf-8"></script>

</body>

</html>