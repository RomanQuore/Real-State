<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/P_U.css">
    <title>Perfil Comprador</title>
</head>
<body>
    <center>   
        <p class="hola"><img src="http://imgfz.com/i/nzv3l4K.png" alt="Descripción de la imagen" style="width: 70px; float: left; margin-right: 10px;"><br><br><br>Real State
        
       <a href="../Model/cuenta.php"> <button type="button" class="cerrar_sesion" >Cerrar sesion</button></p></a> 
                 
        <div class="profile">
                <img src="../Image/iconoperfil.png"class="usuario"alt="Imagen de perfil" >
              
                    <div class="Formulario"><br>
                        <span class="input-group-text" id="Nombre"></span><br><br>
                        <input type="text" class="text" placeholder="Nombre" aria-label="text" aria-describedby="text" style="size: 40px;"><br><br>
                                       
                        <span class="input-group-text" id="Apellido"name="Apellido"></span>
                        <input type="text" class="text" placeholder="Apellido" aria-label="text" aria-describedby="text"><br><br>
                    
                        <span class="input-group-text" id="Telefono"></span>
                        <input type="tel" class="tel" placeholder="Telefono" aria-label="tel" aria-describedby="tel"><br><br>
                   
                        <span class="input-group-text" id="email"></span>
                        <input type="email" class="email" placeholder="email" aria-label="email" aria-describedby="email"><br><br>
                    
                        <span class="input-group-text" id="Calificación"></span>
                        <input type="text" class="text" placeholder="Calificación" aria-label="text" aria-describedby="text"><br><br>
                    
                        <span class="input-group-text" id="Reseña"></span>
                        <input id="reseña" type="text" class="text" placeholder="Reseña" aria-label="text" aria-describedby="text">
                        
                     <div class="container">
                        <form action="../Model/upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" />
                            <input type="submit" value="Cargar Imagen" name="submit" />
                        </form>
                        <div class="image-preview">
                        <?php
                            // Mostrar la imagen cargada, si existe
                            if (isset($_GET['image'])) {
                                echo '<img src="' . $_GET['image'] . '" alt="Imagen Cargada">';
                            }
                            ?>
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
