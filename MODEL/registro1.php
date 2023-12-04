<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_registro.css">
    <title>Crear Cuenta</title>
</head>
<body>
<form method="post">
    <div id="contenedor">
        <div class="caja1">
            <img src="https://i.postimg.cc/rph6LSWH/nzv3l4-K-removebg-preview.png" class="img">
            <hr>
            <div class="real-state">
                <h1>Real State</h1>
            </div>
            <br>
            <br>
            ¿Ya tienes una cuenta?
            <a href="../MODEL/iniciosesion1.php">Inicia sesión</a>
        </div>
        <div class="caja2">
            <form method="post">
                <h1>Crear Cuenta</h1>
                <hr>
                <?php
include("registro2.php")
?>
    <div class="fila">
        <div class="col-md-12 mx-auto">
            <div class="fila-formulario">
                <div class="grupo-formulario col-md-6">
                    <label for="Usuario">Usuario</label>
                    <br>
                    <input type="text" name="Usuario" id="Usuario" placeholder="Usuario" required>
                </div>
                <div class="grupo-formulario col-md-6">
                    <label for="contrasena">Contraseña</label>
                    <br>
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                </div>
            </div>
            <div class="fila-formulario">
                <div class="grupo-formulario col-md-6">
                    <label for="nombre">Nombres</label>
                    <br>
                    <input type="text" name="nombres" id="nombres" placeholder="Nombres" required>
                </div>
                <div class="grupo-formulario col-md-6">
                    <label for="apellido">Apellidos</label>
                    <br>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario col-md-6">
                    <label for="numeroDocumento">Núm Documento</label>
                    <br>
                    <input type="text" name="numeroDocumento" id="numeroDocumento" placeholder="Número de documento" required>
                </div>
                <div class="grupo-formulario col-md-6">
                    <label for="direccion">Dirección</label>
                    <br>
                    <input type="text" name="direccion" id="direccion" placeholder="Dirección" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario col-md-6">
                    <label for="numeroTelefono">Núm Telefono</label>
                    <br>
                    <input type="tel" name="numeroTelefono" id="numeroTelefono" placeholder="Número de Teléfono" required>
                </div>
                <div class="grupo-formulario col-md-6">
                    <label for="correo">Correo</label>
                    <br>
                    <input type="email" name="correoElectronico" id="correoElectronico" placeholder="Correo Electrónico" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario col-md-6">
                    <label for="fechaNacimiento">Fecha Nacimiento</label>
                    <br>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" required>
                </div>
                <div class="grupo-formulario col-md-6">
                    <label for="tipoDocumento">Tipo Documento</label>
                    <br>
                    <select name="tipoDocumento" id="tipoDocumento" required>
                        <option value=1>Cédula de Ciudadanía</option>
                        <option value=2>Cédula de Extranjería</option>
                    </select>
                </div>
            </div>
            
            <div>
                <br>
                <label for="Rol">Tipo de Rol</label>
                <br>
                <select placeholder="Tipo de rol" name="Rol" id="Rol" required>
                    <option value="2">Vendedor</option>
                    <option value="3">Comprador</option>
                </select>
            </div>
            <input type="hidden" name="activo" value="1">
        </div>
    </div>
    <br>
    <hr>
    <br>
    <button type="submit" name="registrate">Registrate</button>
</form>

        </div>
    </div>
</form>

</body> 
<footer class="footer">
    <div class="footer-heading">Conoce más sobre nosotros</div>
    <div class="footer-content">
        <div class="hello">
        <img src="https://i.postimg.cc/504T57CV/userlmn-c28434f13729b9b1f7f1db10c7eb8d7a.png" width="100px" height="100px" alt="Real State">
        </div>
        <div class="footer-nav-copyright">©Real State 2023</div>
        <div class="footer-nav-link"><a href="">Política de privacidad</a></div>
        <br><br><br>
        <div class="footer-nav-contact"><a href="">Contáctenos 3202026512</a></div>
        <br><br><br>
        <div class="footer-nav-social">
            <a href="https://www.instagram.com/"><img src="https://i.postimg.cc/7P7rT5b2/logo-instagram-removebg-preview.png" width="50px" height="50px" alt="Instagram"></a>
            <a href="https://bit.ly/3RR4ZEE"><img src="https://i.postimg.cc/ZqGBV9md/vecteezy-whatsapp-logo-icon-24996543-361-removebg-preview.png" width="50px" height="50px" alt="WhatsApp"></a>
            <a href="https://www.facebook.com/"><img src="https://i.postimg.cc/Pqjnyhcq/vecteezy-facebook-png-icon-16716481-104-removebg-preview-1.png" width="50px" height="50px" alt="Facebook"></a>
            <a href="https://twitter.com/real_sjr"><img src="https://i.postimg.cc/MGQb6JK1/download-removebg-preview-1.png" width="50px" height="50px" alt="Twitter"></a>
    </div>
    </div>
</footer>
</html>
