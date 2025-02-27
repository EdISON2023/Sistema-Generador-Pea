<?php
require_once '../src/Views/components/navbar.php';
?>

<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>

    <div class="espacioContenido">
        <?php require_once '../src/Views/components/header.php'; ?>

        <div class="d-flex flex-wrap justify-content-center mb-3">
            <div class="container mb-5">
                <div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Nueva Contraseña</label>
                        <input type="text" class="form-control" id="Newcontrasena">
                    </div>

                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control" id="Confirmcontrasena">
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombresEditUser" value="<?php echo $datosUser->nombres ?>">
                    </div>

                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedulaEditUser" value="<?php echo $datosUser->cedula ?>">
                    </div>

                    <div class="mb-3">
                        <label for="correo_institucional" class="form-label">Correo Institucional</label>
                        <input type="email" class="form-control" id="correo_institucionalEditUser" value="<?php echo $datosUser->correo_institucional ?>">
                    </div>

                    <div class="mb-3">
                        <label for="image_url" class="form-label">Imagen URL</label>
                        <input type="file" class="form-control" id="image_urlEditUser">
                    </div>


                    <button type="button" onclick="configuracionPefil()" class="btn btn-primary w-100 text-light">Guardar</button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function configuracionPefil() {
        event.preventDefault(); // Evitar que se envíe el formulario de forma tradicional
        envioDataEdit=true;
        let formData = new FormData();

        let Newcontrasena = document.getElementById('Newcontrasena').value
        let Confirmcontrasena = document.getElementById('Confirmcontrasena').value
        
        formData.append('nombresEditUser', document.getElementById('nombresEditUser').value);
        formData.append('cedulaEditUser', document.getElementById('cedulaEditUser').value);
        formData.append('correo_institucionalEditUser', document.getElementById('correo_institucionalEditUser').value);
        formData.append('roleEditUser', '<?php echo $datosUser->role ?>');

        // Agregar la imagen si está presente
        let imageInput = document.getElementById('image_urlEditUser');
        if (imageInput.files[0]) {
            formData.append('image_urlEditUser', imageInput.files[0]);
        } else {
            formData.append('image_urlEditUser', '<?php echo $datosUser->image_url ?>');
        }

        if (Newcontrasena.length > 0 || Confirmcontrasena > 0) {
            envioDataEdit=false;
            if (Newcontrasena === Confirmcontrasena) {
                envioDataEdit=true;
                formData.append('Newcontrasena', document.getElementById('Newcontrasena').value);
            } else {
                alert('La confirmacion de la contraseña es incorrecta')
            }
        } else {
            formData.append('Newcontrasena', <?php echo $datosUser->contraseña ?>); 
        }

        // Agregar el ID de usuario
        formData.append('id', '<?php echo (string) $datosUser->_id; ?>');
        if(envioDataEdit == true){
            fetch('index.php?userProcess=editPerfil', {
                method: 'POST',
                body: formData
            })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud');
                }
                return response.json();
            })
            .then((data) => {
                
                let confirmacionDeUser=confirm('Datos Cambiado Exitosamente')
                if(confirmacionDeUser){
                    location.reload();
                }
                
            })
            .catch((error) => {
                console.error('Hubo un error:', error);
            });
        }
        
    };
</script>