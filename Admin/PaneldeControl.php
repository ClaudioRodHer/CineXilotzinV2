<?php
     session_start();//aqui se inicia la secion para los usuarios
     ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Panel de Control</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
            <link rel="stylesheet" href="../CSS/Login/login.css">
    </head>
    <body>
        <h1>Panel de Control</h1>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php
         if (isset($_SESSION["Clave_Usuario"])) {//se inicia si existe la variable de session
          //si se inicio sesion hay que ver de quien es
          //Administrador
          if ($_SESSION["Clave_Usuario"] == 1){
        ?>
        <p>lorem</p>
        <?php
            }
          }else {
             echo "<center><H1>UPS¡¡¡ Veo que tienes problemas para entrar aqui</H1></center>";
             echo "<center><H2>Debes iniciar sesion para iniciar<H2></center>";
             echo "<center><a href='../Login/Login.php'>Da CLIK aqui para iniciar sesion</a></center>";
         }
        ?>
        <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    </body>
</html>