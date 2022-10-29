<?php
    session_start();
    $Error="";
    if(isset($_POST["enviar"])){
        if($_POST["nombre"]== "ifp" && $_POST["pass"]==2022){
            $_SESSION["usuario"] = $_POST["nombre"];
            header("Location:index.php");
            exit();
        }else{
            $Error = "La contraseña o el nombre de usuario no son valios";
        }
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/estiloLogin.css">
    <title>Login usuario</title>
</head>
<body>
    <h1 id="tituloprincila">Creacion de actividades</h1>
    <div id="capaPrincipal">
        <div id="capaFormulario">
            <h1>Inicio de sesi&oacute;n</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" id="formulario">
                <label for="text" >Nombre:</label>
                <input class="inputN" type="text" name="nombre" required>
                <label for="text" >Password:</label>
                <input class="input" type="password" name="pass" required>
                <input type="submit" name="enviar" id="enviarI">
            </form>
        </div>
    </div>
    <div class="capaError">
        <h1>
            <?php echo $Error?>
        </h1>
    </div>
    
</body>
</html>