
<?php 

if (isset($_POST['redirect_url'])) {
    $_SESSION['redirect_url'] = $_POST['redirect_url'];
} else {
    $url_antigua = 'index.php?action=index';
}
?>
<link rel="stylesheet" href="./css/login.css">

<style>
    .botonlogin:hover {
        background-color: #ff6a00e5;
    }
</style>

<div class="fondo">
    <div class="centrar">
        <div class=" card card-login">
            <div class="row card-body h-100">
                <div class="col-5 me-2 h-100">
                    <video height="100%" loop autoplay muted controls src="./resources/videos/yavirac.mp4"></video>
                </div>
                <form class="col d-flex flex-column align-items-center" method="POST">
                    <img width="130px" src="./resources/images/global/logo-yavirac.png" alt="logo-yavirac">
                    <h6 class="text-center mb-2 text-primario">Formar profesionales de excelencia enfocados en Ciencia, Tecnología y Sociedad.</h6>
                    <?php 
                    if (isset($_SESSION['user'])&& $_SESSION['user'] ==false) {
                        echo '<div class="alert alert-danger p-2 m-0" role="alert">
                        Cedula o Contraseña Incorrecta
                    </div>';
                    }else{
                        echo '';
                    }
                    ?>
                    
                    <div class="mb-3 mt-1 input">
                        <label for="Cedula" class="form-label">Cedula</label>
                        <input type="text" name="username" class="form-control" id="Cedula" minlength="10" maxlength="10">
                    </div>
                    <div class="mb-3 input">
                        <label for="Contraseña" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="Contraseña">
                    </div>
                    <button type="submit" class="btn fondoPrincipal text-light px-5 mt-3 botonlogin">Ingresar</button>
                </form>
            </div>

        </div>
    </div>
</div>