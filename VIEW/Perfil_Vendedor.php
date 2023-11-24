<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/P_U.css">
    <script src="../JS/imagenperfil.js"></script>
    <title>Perfil Comprador</title>
</head>
<body>
    <center>   
        <p class="hola"><img src="http://imgfz.com/i/nzv3l4K.png" alt="Descripción de la imagen" style="width: 70px; float: left; margin-right: 10px;"><br><br><br>Real State
        
       <a href="../MODEL/loginsignup.php"> <button type="button" class="cerrar_sesion" >Cerrar sesion</button></a></p> 
                 
       <div class="profile">
    <img src="" class="usuario" alt="Imagen de perfil">

    <div class="Formulario">
        <form action="../Model/upload.php" method="post" enctype="multipart/form-data" id="profileForm">
            <div class="input-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="text" placeholder="Nombre" required>
            </div><br>

            <div class="input-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="text" placeholder="Apellido" required>
            </div><br>

            <div class="input-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="tel" placeholder="Teléfono" required>
            </div><br>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="email" placeholder="Email" required>
            </div><br>

            <div class="input-group">
                <label for="resena">Reseña:</label>
                <textarea id="resena" name="resena" class="text" placeholder="Reseña"></textarea>
            </div><br>

            <div class="input-group">
                <label for="fileToUpload">Cargar Imagen de Perfil:</label>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" required>
            </div><br>

            <input type="submit" value="Guardar Perfil">
        </form>

        <div class="formulario-publicacion">
            <h2>Formulario de Publicación</h2>
            <form action="procesar_publicacion.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nombreProduc">Nombre del Producto:</label>
                    <input type="text" id="nombreProduc" name="nombreProduc" required>
                </div>
                <div>
                    <label for="valor">Valor:</label>
                    <input type="text" id="valor" name="valor" required>
                </div>
                <div>
                    <label for="imagen">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <div>
                    <label for="Categoria">Categoría:</label>
                    <input type="text" id="Categoria" name="Categoria" required>
                </div>
                <div>
                    <input type="submit" value="Publicar">
                </div>
            </form>
        </div>
    </div>
</div> 
            <footer class="footer">
                <div class="footer-heading">Conoce más sobre nosotros!</div>
                <div class="footer-content">
                    <img src="https://i.postimg.cc/504T57CV/userlmn-c28434f13729b9b1f7f1db10c7eb8d7a.png" width="100px" height="100px" alt="Real State">
                    <div class="footer-nav-copyright">©Real State 2023</div>
                    <div class="footer-nav-link"><a href="">Política de privacidad</a></div>
                    <div class="footer-nav-contact">Contáctenos <a href="">3202026512</a></div>
                    <div class="footer-nav-social">
                        <a href="https://www.instagram.com/"><img src="https://i.postimg.cc/7P7rT5b2/logo-instagram-removebg-preview.png" width="50px" height="50px" alt="Instagram"></a>
                        <a href="https://bit.ly/3RR4ZEE"><img src="https://i.postimg.cc/ZqGBV9md/vecteezy-whatsapp-logo-icon-24996543-361-removebg-preview.png" width="50px" height="50px" alt="WhatsApp"></a>
                        <a href="https://www.facebook.com/"><img src="https://i.postimg.cc/Pqjnyhcq/vecteezy-facebook-png-icon-16716481-104-removebg-preview-1.png" width="50px" height="50px" alt="Facebook"></a>
                        <a href="https://twitter.com/real_sjr"><img src="https://i.postimg.cc/MGQb6JK1/download-removebg-preview-1.png" width="50px" height="50px" alt="Twitter"></a>
                    </div>
                </div>
            </footer>
    </center>
</body>
</html>
