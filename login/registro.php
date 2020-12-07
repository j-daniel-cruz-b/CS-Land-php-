<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS Land | Contacto</title>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="icon" href="img/icono.png">
</head>

<body>
    <header class="site-header contacto">
        <div class="contenido-header">
            <div class="navbar">
            <a class="icono contenedor" href="../index.php">
                <img src="../img/icono.png" alt="Logotipo de CS Land">
                </a>
                <div class="navegacion">
                <nav>
                    <a href="../nosotros.php">Nosotros</a>
                    <a href="../stream.php">Stream</a>
                    <a href="../tienda.php">Tienda</a>
                    <a href="../contacto.php">Contacto</a>
                </nav>
                <a href="../login.php">
                    <img src="../img/login.png" alt="login">
                </a>
                </div>
            </div>
        </div>
    </header>

    <main class="contenedor-contacto seccion ">
        <form name="regUsuario" action="../admin/actions/actionPOST.php" method="POST" >
            <h3>REGISTRO DE USUARIOS</h3>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" value="Cliente" name="entity" readonly>
                </div>
                <div class="form-group col-md-10">
                    <label for="firstnameUser">Nombre</label>
                    <input type="text" class="form-control" name="firstnameUser">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="lastnameUser">Apellidos</label>
                    <input type="text" class="form-control" name="lastnameUser">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="nameUser">Username</label>
                    <input type="text" class="form-control" name="nameUser">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="emailUser">Email</label>
                    <input type="email" class="form-control" name="emailUser">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="passUser">Contraseña</label>
                    <input type="password" class="form-control" name="passUser">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="CpassUser">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="CpassUser">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="phoneUser">Telefóno</label>
                    <input type="tel" class="form-control" name="phoneUser">
                </div>
                <div class="form-group col-md-4">
                    <label for="rolUser">Rol</label>
                    <select class="custom-select" name="rolUser" readonly>
                        <option value="5" selected>Rol de usuario</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
        </form>
    </main>


    <footer>
        <div class="contendor contenido-footer">
            <div class="col">
                <img src="../img/logo-footer.png" alt="" srcset="">
            </div>
            <h5 class="margin-0 "></h5>
            <div>
                <h4 class="margin-0 ">CONTACTO</h4>
                <p class="margin-0 "><span>Correo:</span> &ThinSpace; cs-land.enterprise@gmail.com</p>
                <p class="margin-0 "><span>Teléfono:</span> &ThinSpace; 52(84)200-87-70></p>
                <P class="margin-0 "><span>Direccion:</span> &ThinSpace; Montes Pirineos 947Independencia Oriente, <br> 44340 Guadalajara, Jal.></P>
            </div>
            <h5 class="margin-0 "></h5>
            <div class="margin-0 ">
                <h4 class="margin-0 ">Menú:</h4>
                <lo class="navegacion-footer">
                    <li><a href="login.html">
                        Inicio de Sesión / Registro
                    </a></li>
                    <li><a href="nosotros.html">
                        Nosotros
                    </a></li>
                    <li>
                        <a href="stream.html">
                            Stream
                        </a>
                    </li>
                    <li><a href="tienda.html">
                        Tienda
                    </a></li>
                    <li><a href="contacto.html">
                        Contacto
                    </a></li>
                    <li><a href="blog.html">
                        Blog
                    </a></li>
                </lo>
            </div>
        </div>
        <div class="row ">
            <p> <span> &copy; Carolina Medina & Daniel Cruz &MediumSpace; Todos los derechos reservados </span></p>
        </div>
    </footer>
</body>

</html>