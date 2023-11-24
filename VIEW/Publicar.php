<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Finca Raíz</title>
    <link rel="stylesheet" href="../CSS/Publicarr.css">
</head>
<body>
    
        <p class="hola"><img src="http://imgfz.com/i/nzv3l4K.png" alt="Descripción de la imagen" style="width: 70px; float: left; margin-right: 10px;"><br><br><br>Real State
        <a href="../Model/cuenta.php"> <button type="button" class="cerrar_sesion" >Cerrar sesion</button></p></a> 
             
    <div class="container">
        <h1>Publicar Establecimiento</h1>
        <form action="procesar.php" method="post">
            <label for="nombre"></label>
            <input type="text" placeholder="Nombre del establecimiento" id="nombre" name="nombre" required>

            <label for="precio"></label>
            <input type="number" placeholder="Precio" id="precio" name="precio" required>

            <label for="ubicacion"></label>
            <input type="text" placeholder="Ubicación" id="ubicacion" name="ubicacion" required>    

        <select class="form-select" aria-label="Default select example">
            <option selected>Tipo de establecimiento</option>
            <option value="1">Casa</option>
            <option value="2">Apartamento</option>
            <option value="3">Local</option>
        </select>

            <label for="descripcion"></label>
            <textarea id="descripcion" placeholder="Descripción" name="descripcion" rows="4" required></textarea>
            
            <input type="submit" value="Publicar">
    </form>
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
</body>
</html>
