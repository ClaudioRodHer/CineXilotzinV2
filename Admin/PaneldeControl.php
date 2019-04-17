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
        <link rel="stylesheet" href="../CSS/Admin/Admin.css">
    </head>
    <body>
        <head>
            <h1>Panel de Control</h1>
        </head>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php
         if (isset($_SESSION["Clave_Usuario"])) {//se inicia si existe la variable de session
          //si se inicio sesion hay que ver de quien es
          //Administrador
          if ($_SESSION["Clave_Usuario"] == 1){
        ?>
        <main>
            <div class="contenedor-form">
                <div class="formulario">
                    <div class="row">
                        <div class="col-3">
                            <div
                                class="nav flex-column nav-pills"
                                id="v-pills-tab"
                                role="tablist"
                                aria-orientation="vertical">
                                <a
                                    class="nav-link active"
                                    id="v-pills-home-tab"
                                    data-toggle="pill"
                                    href="#peliculas"
                                    role="tab"
                                    aria-controls="v-pills-home"
                                    aria-selected="true">Peliculas</a>
                                <a
                                    class="nav-link"
                                    id="v-pills-profile-tab"
                                    data-toggle="pill"
                                    href="#funciones"
                                    role="tab"
                                    aria-controls="v-pills-profile"
                                    aria-selected="false">Funciones</a>
                                <a
                                    class="nav-link"
                                    id="v-pills-messages-tab"
                                    data-toggle="pill"
                                    href="#dulceria"
                                    role="tab"
                                    aria-controls="v-pills-messages"
                                    aria-selected="false">Dulceria</a>
                                <a
                                    class="nav-link"
                                    id="v-pills-settings-tab"
                                    data-toggle="pill"
                                    href="#promociones"
                                    role="tab"
                                    aria-controls="v-pills-settings"
                                    aria-selected="false">Promociones</a>
                                <a
                                    class="nav-link"
                                    id="v-pills-settings-tab"
                                    data-toggle="pill"
                                    href="#informacion"
                                    role="tab"
                                    aria-controls="v-pills-settings"
                                    aria-selected="false">Informacon del cine</a>
                                    <a
                                    class="nav-link"
                                    id="v-pills-settings-tab"
                                    data-toggle="pill"
                                    href="#fotos"
                                    role="tab"
                                    aria-controls="v-pills-settings"
                                    aria-selected="false">Fotos del Cine</a>
                                <a
                                    class="nav-link"
                                    id="v-pills-settings-tab"
                                    data-toggle="pill"
                                    href="#conf"
                                    role="tab"
                                    aria-controls="v-pills-settings"
                                    aria-selected="false">Configuracion de Usuario</a>
                                <a
                                    class="nav-link"
                                    id="v-pills-settings-tab"
                                    data-toggle="pill"
                                    href="#reportes"
                                    role="tab"
                                    aria-controls="v-pills-settings"
                                    aria-selected="false">Reportes</a>
                                    <a
                                    class="nav-link"
                                    id="v-pills-settings-tab"
                                    data-toggle="pill"
                                    href="#CerrarS"
                                    role="tab"
                                    aria-controls="v-pills-settings"
                                    aria-selected="false">Cerrar sesion</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                            <!-- Peliculas -->
                                <div
                                    class="tab-pane fade show active"
                                    id="peliculas"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <form action="peliculascod.php" method="POST" enctype="multipart/form-data">
                                        <h3>Peliculas</h3>
                                        <input
                                            type="text"
                                            placeholder="Nombre de la Pelicula"
                                            required="required"
                                            name="txtbnompelicula"/>
                                        <input
                                            type="date"
                                            placeholder="Fecha de estreno: ej.(2017-05-13)"
                                            required="required"
                                            name="dtestreno"/>
                                        <input
                                            type="time"
                                            placeholder="Duracion: ej.(01-45-00)"
                                            required="required"
                                            name="txtDuracion"/>
                                        <textarea
                                            name="txaDescripcion"
                                            rows="6"
                                            cols="68"
                                            placeholder="Ingresa la descripcion de la pelicula"></textarea>
                                        <h4>Agregar Imagen</h4>
                                        <input type="File" name="foto" id="foto">
                                        <!-- solo acepta-->
                                        <div id="imagePreview"></div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                        <script type="text/javascript">
                                            (function () {
                                                function filePreview(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagePreview').html(
                                                                "<center><img src='" + e.target.result + "' alt='imgPelicula' width='200' heigh" +
                                                                "t='200' border='2'></center>"
                                                            );
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                                $('#foto').change(function () {
                                                    filePreview(this);
                                                });
                                            })();
                                        </script>

                                        <br><br>
                                        <!--Es el combo box para los idiomas-->
                                        <center>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04" name="idioma">
                                                    <!-- Se seleccionan los idiomas para la pelicula directamente de la BD-->
                                                    <?php
                                                $conexion = mysqli_connect("localhost", "root", "", "CineXilotzin");
                                                $query = $conexion->query("SELECT * FROM Idioma");
                                                echo'<option selected="true" disabled="disabled"> selecciona un Idioma</option>';
                                                while ($row = $query->fetch_assoc()) {
                                                    echo'<option value="' . $row['Clv_Idioma'] . '">' . $row['Nombre_Idioma'] . '</option>' . "\n";
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </center>
                                        <!--Es el combo box para los Subtitulos-->
                                        <center>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04" name="subtitulos">
                                                    <!-- disabled selected==es el que hace la funcion de placeholder del
                                                    combobox(select)-->
                                                    <!-- Se seleccionan los Subtitulos si es que tiene para la pelicula directamente
                                                    de la BD-->
                                                    <!--selected="true" disabled="disabled"==Hace valor por dafault del ComboBox-->
                                                    ?>
                                                    <?php
                                                    $sin = "SS";
                                                    $conexion = mysqli_connect("localhost", "root", "", "CineXilotzin");
                                                    $query = $conexion->query("SELECT * FROM Subtitulos");
                                                    echo'<option selected="true" disabled="disabled">Selecciona un Subtitulo</option> ';
                                                    while ($row = $query->fetch_assoc()) {
                                                        echo'<option value="' . $row['Clv_Subtitulos'] . '">' . $row['Nombre_Subtitulos'] . '</option>' . "\n";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </center>
                                        <!--Es el combo box para el genero-->
                                        <center>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04" name="genero">
                                                    <!-- disabled selected==es el que hace la funcion de placeholder del
                                                    combobox(select)-->
                                                    <!-- Se seleccionan los Subtitulos si es que tiene para la pelicula directamente
                                                    de la BD-->
                                                    <!--selected="true" disabled="disabled"==Hace valor por dafault del ComboBox-->
                                                    <?php
                                                $conexion = mysqli_connect("localhost", "root", "", "CineXilotzin");
                                                $query = $conexion->query("SELECT * FROM Genero");
                                                echo'<option selected="true" disabled="disabled">Selecciona un Genero</option> ';
                                                while ($row = $query->fetch_assoc()) {
                                                    echo'<option value="' . $row['Clv_Genero'] . '">' . $row['Nombre_Genero'] . '</option>' . "\n";
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </center>
                                        <!--Es el combo box para la clasificacion-->
                                        <center>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04" name="clasificacion">
                                                    <!-- disabled selected==es el que hace la funcion de placeholder del
                                                    combobox(select)-->
                                                    <!-- Se seleccionan los Subtitulos si es que tiene para la pelicula directamente
                                                    de la BD-->
                                                    <!--selected="true" disabled="disabled"==Hace valor por dafault del ComboBox-->
                                    <?php
                                    $conexion = mysqli_connect("localhost", "root", "", "CineXilotzin");
                                    $query = $conexion->query("SELECT * FROM Clasificacion");
                                    echo'<option selected="true" disabled="disabled"> Selecciona una Clasificacion</option> ';
                                    while ($row = $query->fetch_assoc()) {
                                        echo'<option value="' . $row['Clv_Clasificacion'] . '">' . $row['Nombre_Clasificacion'] . '</option>' . "\n";
                                    }
                                    ?>
                                                </select>
                                            </div>
                                        </center>

                                        <!--Es el chec box para definir si es estreno principal(solo se podra
                                        seleccionar 1 por semana)-->
                                        <center>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Estreno Principal
                                                </label>
                                            </div>
                                        </center>
                                        <!--botones de confirmacion y acciones-->
                                        <input type="submit" value="Agregar Pelicula" class="done">
                                        <input type="submit" value="Guardar Edicion de  Pelicula" class="edit">
                                        <input type="submit" value="Eliminar Pelicula" class="drop">
                                    </form>
                                </div>
                                <!-- tab de funciones -->
                                <div
                                    class="tab-pane fade"
                                    id="funciones"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <form action="FuncionesCod.php" method="post" enctype="multipart/form-data">
                                        <h3>Funciones</h3>
                                        <div class="formulario">
                                            <h2>selecciona la pelicula para su funcion</h2>
                                            <center>
                                                <div class="input-group">
                                                    <select
                                                        class="custom-select"
                                                        id="inputGroupSelect04"
                                                        name="peliculas"
                                                        placeholder="peliculas">
                                                        <!--En este script de Php muestra las peliculas que tienen-->

                                                        <?php
                                            $conexion = mysqli_connect("localhost", "root", "", "CineXilotzin");
                                            $query = $conexion->query("SELECT * FROM Peliculas");
                                            echo'<option Value="0"> Selecciona una pelicula</option> ';
                                            while ($row = $query->fetch_assoc()) {
                                                echo'<option value="' . $row['idPeliculas'] . '">' . $row['Nombre_Pelicula'] . '</option>' . "\n";
                                            }
                                            ?>
                                                    </select>
                                                </div>
                                            </center>

                                            <?php
                                 $img=$conexion->query("SELECT URLImagenPelicula FROM CineXilotzin.Peliculas WHERE idPeliculas=".peliculas."");
                                            echo "$img";
                                  ?>
                                            <center>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        Hora de Estreno
                                                    </label>
                                                </div>
                                            </center>
                                            <input
                                                type="date"
                                                placeholder="ingrese la fecha"
                                                name="fechaFunc"
                                                required="required">
                                            <input
                                                type="time"
                                                placeholder="ingrese una hora"
                                                name="horaFunc"
                                                required="required">
                                            <center>
                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect04" name="tipoFuncion">
                                                        <option value="Funcion Principal">Funcion Principal</option>
                                                        <option value="Funcion Normal">Funcion Normal</option>
                                                    </select>
                                                </div>
                                            </center>
                                            <center>
                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect04" name="Salas">
                                                        <option value="Sala 1">Sala 1</option>
                                                        <option value="Sala 2">Sala 2</option>
                                                        <option value="Sala 3">Sala 3</option>
                                                    </select>
                                                </div>
                                            </center>

                                        </div>
                                        <input type="submit" value="Agregar">
                                        <input type="submit" value="Actualizar">
                                    </form>

                                </div>
                                <!-- tab para Dulceria -->
                                <div
                                    class="tab-pane fade"
                                    id="dulceria"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">

                                    <form action="DulcesCod.php" method="post" enctype="multipart/form-data">
                                        <h3>Dulceria</h3>
                                        <input
                                            type="text"
                                            placeholder="Nombre del producto"
                                            required="required"
                                            name="txtproducto"/>
                                        <center>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04" name="tipoProducto">
                                                    <option selected="selected">Tipo</option>
                                                    <option value="Bebida">Bebida</option>
                                                    <option value="Snack">Snack</option>
                                                </select>

                                            </div>
                                        </center>
                                        <input
                                            type="text"
                                            placeholder="precio del producto"
                                            required="required"
                                            name="txtproductoprecio"/>
                                        <textarea
                                            name="txaDescripcion"
                                            rows="6"
                                            cols="68"
                                            placeholder="Ingresa la descripcion del producto"></textarea>
                                        <h4>Agregar Imagen</h4>
                                        <input type="file" value="Agregar imagen" name="fotoDulce" id="fotoDulce">

                                        <div id="imagePreviews"></div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                        <script type="text/javascript">
                                            (function () {
                                                function filePreview(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagePreviews').html(
                                                                "<center><img src='" + e.target.result + "' alt='imgPelicula' width='200' heigh" +
                                                                "t='200' border='2'></center>"
                                                            );
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                                $('#fotoDulce').change(function () {
                                                    filePreview(this);
                                                });
                                            })();
                                        </script>

                                        <br><br>

                                        <input type="submit" value="Agregar producto">
                                        <input type="submit" value="Editar Producto" class="edit">
                                        <input type="submit" value="Elliminar Producto" class="drop">
                                    </form>
                                </div>
                                <!-- es para las promociones -->
                                <div
                                    class="tab-pane fade"
                                    id="promociones"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <form action="PromocionesCod.php" method="post" enctype="multipart/form-data">
                                        <h3>Promociones</h3>
                                        <input
                                            type="text"
                                            placeholder="Nombre de la promocion"
                                            required="required"
                                            name="txtpromocion"/>
                                        <input
                                            type="date"
                                            placeholder="Ingresa la fecha de inicio"
                                            required="required"
                                            name="FechaInicioProm"/>
                                        <input
                                            type="date"
                                            placeholder="Ingrese la fecha de finalizaacion"
                                            required="required"
                                            name="FechaFinProm"/>

                                        <textarea
                                            name="txaDescripcion"
                                            rows="6"
                                            cols="68"
                                            placeholder="Ingresa la descripcion de la promocion"></textarea>
                                        <center>
                                            <div class="input-group">
                                                <select class="custom-select" id="inputGroupSelect04" name="tipoPromocion">
                                                    <option selected="selected">Tipo Promocion</option>
                                                    <option value="Descuento">Descuento</option>
                                                    <option value="Entradas">entradas</option>
                                                    <option value="Articulos">Articulos</option>
                                                </select>

                                            </div>
                                        </center>
                                        <h4>Agregar imagen de la Promocion</h4>
                                        <input type="File" value="Agregar imagen" name="fotoProm" id="fotoProm">

                                        <div id="imagePreviewP"></div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                        <script type="text/javascript">
                                            (function () {
                                                function filePreview(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagePreviewP').html(
                                                                "<center><img src='" + e.target.result + "' alt='imgPelicula' width='200' heigh" +
                                                                "t='200' border='2'></center>"
                                                            );
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                                $('#fotoProm').change(function () {
                                                    filePreview(this);
                                                });
                                            })();
                                        </script>

                                        <br><br>
                                        <input type="submit" value="Agregar Promocion">
                                        <input type="submit" value="Editar Promocion" class="edit">
                                        <input type="submit" value="Elliminar Promocion" class="drop">
                                    </form>
                                </div>
                                <!-- Informacion -->
                                <div
                                    class="tab-pane fade"
                                    id="informacion"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <form action="InfCineCod.php" method="post" enctype="multipart/form-data">
                                        <h3>Informacion del cine</h3>

                                        <textarea
                                            rows="6"
                                            cols="68"
                                            required="required"
                                            placeholder="Ingresa la Historia del Cine"
                                            name="txaHistoria"></textarea>
                                        <input
                                            type="text"
                                            placeholder="link de facebok"
                                            required="required"
                                            name="linkFaceBook"/>
                                        <input
                                            type="text"
                                            placeholder="link de instagram"
                                            required="required"
                                            name="linkInsttagram"/>
                                        <input
                                            type="text"
                                            placeholder="Agregar ubicacion"
                                            required="required"
                                            name="txtUbicacion"/>
                                        <input
                                            type="text"
                                            placeholder="Telefono"
                                            required="required"
                                            name="Telefonocine"/>
                                        <input type="text" placeholder="E-Mail" required="required" name="correoCine"/>
                                        <h4>Ingresa un mapa del cine</h4>
                                        <input type="file" value="Agregar mapa" name='fotoINF' id='fotoINF'>

                                        <div id="imagePreviewINF"></div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                        <script type="text/javascript">
                                            (function () {
                                                function filePreview(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagePreviewINF').html(
                                                                "<center><img src='" + e.target.result + "' alt='imgPelicula' width='200' heigh" +
                                                                "t='200' border='2'></center>"
                                                            );
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                                $('#fotoINF').change(function () {
                                                    filePreview(this);
                                                });
                                            })();
                                        </script>

                                        <br><br>
                                        <input type="submit" value="Actualizar ">

                                    </form>
                                </div>
                                <!-- fotos -->
                                <div
                                    class="tab-pane fade"
                                    id="fotos"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <form
                                        action="AgregarFotosCineCod.php"
                                        method="post"
                                        enctype="multipart/form-data">
                                        <h3>Fotos del cine</h3>
                                        <h5>selecciona las fotos apra el cine</h5>
                                        <input
                                            type="file"
                                            value="Agregar imagenes del cine"
                                            name="fotoMap"
                                            id="fotoMap">

                                        <div id="imagePreviewMap"></div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                        <script type="text/javascript">
                                            (function () {
                                                function filePreview(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            $('#imagePreviewMap').html(
                                                                "<center><img src='" + e.target.result + "' alt='imgPelicula' width='200' heigh" +
                                                                "t='200' border='2'></center>"
                                                            );
                                                        }
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                                $('#fotoMap').change(function () {
                                                    filePreview(this);
                                                });
                                            })();
                                        </script>

                                        <br><br>
                                        <input type="submit" value="Agregar ">
                                        <input type="submit" value="Editar " class="edit">
                                        <input type="submit" value="Elliminar" class="drop">
                                    </form>
                                </div>
                                <!-- Configuracion -->
                                <div
                                    class="tab-pane fade"
                                    id="conf"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <form action="UsuarioinfCod.php" method="post" enctype="multipart/form-data">
                                        <h3>Configuracion de Usuario</h3>

                                        <input
                                            type="password"
                                            placeholder="ingresa tu nueva contraseña"
                                            required="required"
                                            name="NuevaCont"/>

                                        <input type="submit" value="Actualizar ">

                                    </form>
                                </div>
                                <!-- Reportes -->
                                <div
                                    class="tab-pane fade"
                                    id="reportes"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">...</div>

                                    <!-- cerrar sesiwon -->
                            <div
                                    class="tab-pane fade"
                                    id="CerrarS"
                                    role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <form action="../Functions/Login/CerrrarSesion.php" method="post">
                                            <h2>Desea cerrar sesion?</h2>
                                            <button type="submit">Cerrar Sesion</button>
                                           </form> 
                        
                                </div>
                            </div>
                            
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <div id="msg">
        <?php
            }
          }else {
             echo "<center><H1>UPS¡¡¡ Veo que tienes problemas para entrar aqui</H1></center>";
             echo "<center><H2>Debes iniciar sesion para iniciar<H2></center>";
             echo "<center><a href='../Login/Login.php'>Da CLIK aqui para iniciar sesion</a></center>";
         }
        ?>                                  
        </div>
    
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