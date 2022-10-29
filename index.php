<?php
    require "claseA.php";
?>
<?php 
    //con esta funcion iniciamos la sección
    session_start();
    //Comprobamos si se ha declarado la seccion actividad y si no es asi lo hacemos declarandola como un array
    if(!isset($_SESSION["actividad"])){
        $_SESSION["actividad"]= array();
    }
    //cuando se manden los datos que ingrese el usuario haremos una instancia de la clase dando como parametros lo que el usuario ha ingreado
    if(isset($_POST["crearActividad"])){
        $nuevaActividad = new Actividades($_POST["titulo"], $_POST["tipo"]);
        // serialize es una funcion que nos deja asimilar los datos en la sesion
        array_push( $_SESSION["actividad"],serialize($nuevaActividad));//funcion array_push hace que se añada al array los valores de la clase.
    }
    if(!isset($_SESSION["usuario"])){
        header("location: login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UF2 Actividades</title>
    <link rel="stylesheet" href="./estilos/estiloindex.css"> </link>
</head>
<body>
    <div id="salir">
        
        <?php echo "Usuario: ".$_SESSION["usuario"] ?>
        <a class="boton" href="logout.php">
            Cerrar sesi&oacute;n
        </a>
            
        
    </div>
    <div id="Capsula">
        <div class="capsulaPartida">
            <div class="informacion">
                <h1 class="tituloP">Actividades</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="formulario">
                    <label for="text" class="labelP">Titulo:</label>
                    <input class="textoInfo" type="text" name="titulo" required>
                    <p id="parrafo">Tipo de actividad: </p>
                    <select name="tipo" required>
                        <option hidden selected>Seleccione un tipo</option>
                        <option value="cine">Cine</option>
                        <option value="comida">Comida</option>
                        <option value="copas">Copas</option>
                        <option value="cultura">Cultura</option>
                        <option value="musica">M&uacute;sica</option>
                        <option value="viajes">Viajes</option>
                    </select>
                    <div id="contenedorEnviar">
                        <input id="enviarActividad" type="submit" name="crearActividad">
                    </div>
                </form>
            </div>
        </div>
        <!-- Segunda capa que se mostrara los datos que el usuario ha ingresado -->
        <?php foreach ($_SESSION["actividad"] as $campos):
            $camposDeserializados = unserialize($campos);
        ?>
        <div class="capsulaPartida">
            <div class="informacion">
                <h1 class="tituloP">Actividades creada</h1>
                <div class="contenedorTituloA">
                    <h1><?php echo $camposDeserializados->titulo  ?></h1>
                </div>
                <div id="capaImg">
                    <img src="./imgPHP/<?php echo $camposDeserializados-> tipoActividad?>.jpg" alt="Imagen del la actividad" id="imgActividad">
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
   
</body>
</html>