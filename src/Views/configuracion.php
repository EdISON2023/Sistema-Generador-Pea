<?php
require_once '../src/Views/components/navbar.php';
?>


<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>
    <div class="espacioContenido">
        <?php require_once '../src/Views/components/header.php'; ?>
        <div class="mx-5 pb-5">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="mb-2 mt-4">
                    <h4 class="colorPrincipal">Usuarios</h4>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    <button type="button" onclick="eliminarContenido()" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#usuariosAdd">Agregar Usuarios</button>
                </div>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <!--dsfdsfdsfsdf-->
                <div class="modal modal-xl fade" id="usuariosAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <form id="usuariosForm" class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Correquisitros</h1>
                                <button type="button" onclick="editUserClose()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <label for="formFileMultiple" class="form-label">Foto del docente</label>
                                    <input class="form-control" type="file" accept="image/*" name="imagenUser" id="imagenUser" multiple>
                                </div>
                                <div class="mb-2 text-info" id="imagenEdit"></div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="nombresUser" id="nombresUser" placeholder="nombre">
                                    <label for="Co_codigo">Nombres</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <select class="form-select" name="roleUser" id="roleUser" aria-label="Role">
                                        <?php
                                        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0) {
                                            echo "<option value='0'>Admin</option>
                                        <option value='2'>Coordinador de Carrera</option>";
                                        }

                                        ?>

                                        <option value="1" selected>Docente</option>

                                    </select>
                                    <label for="floatingSelect">Rol</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="cedulaUser" id="cedulaUser" placeholder="cedula" minlength="10" maxlength="10">
                                    <label for="Co_asignatura">Cedula</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="correoUser" id="correoUser" placeholder="correo">
                                    <label for="Co_codigo">Correo Institucional</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="editUserClose()" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary text-light">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>


                <!--dsfdsfdsfsdf-->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope='col'>imagen</th>
                            <th scope='col'>role</th>
                            <th scope='col'>nombres</th>
                            <th scope='col'>cedula</th>
                            <th scope='col'>correo_institucional</th>
                            <th scope='col'>accion</th>

                        </tr>
                    </thead>
                    <tbody id="tableBody">

                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" id="pagination">
                        <!-- Los botones de paginación se generarán dinámicamente con JavaScript -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


<script>
    function eliminarContenido(){
        if (sessionStorage.getItem('id_edit')) {
            sessionStorage.removeItem('id_edit')
        }
        document.getElementById('usuariosForm').reset();
    }
    // Datos de ejemplo
    let usuarioRole = <?php echo $_SESSION['user']['role'] ?>;
    const dataConfig = <?php echo json_encode($data['datosUser']); ?>;

    const itemsPerPage = 5; // Número de elementos por página
    let currentPage = 1;

    function renderTable(page) {

        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedItems = dataConfig.slice(start, end);
        const roles = {
            0: 'admin',
            1: 'docente',
            2: 'coordinador de carrera'
        }
        console.log(paginatedItems)
        paginatedItems.forEach((item, index) => {
            let ocultar = ""
            if (usuarioRole == 2 && item.role == 0) {
                ocultar = "d-none"
            }
            const row = `<tr class="${ocultar}">
                    <td class='colorTexto' style='width: calc(100% / 6);'><img src='./resources/docentesImages/${item.image_url}' width="50" alt=''></td>
                    <td class='colorTexto' style='width: calc(100% / 6);'>${roles[item.role]}</td>
                    <td class='colorTexto' style='width: calc(100% / 6);'>${item.nombres}</td>
                    <td class='colorTexto' style='width: calc(100% / 6);'>${item.cedula}</td>
                    <td class='colorTexto' style='width: calc(100% / 6);'>${item.correo_institucional}</td>
                    <td class='colorTexto' style='width: calc(100% / 6);'>
    <button type="button" onclick="editUser('${item['_id']['$oid']}')" class="btn text-light" data-bs-toggle="modal" data-bs-target="#usuariosAdd">
        <img class="mb-1 ms-1" src="./resources/images/global/pencil-square.svg" alt="">
    </button>
</td>
                </tr>`;
            tableBody.innerHTML += row;
        });
    }

    function renderPagination() {
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        const totalPages = Math.ceil(dataConfig.length / itemsPerPage);

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === currentPage) {
                li.classList.add('active');
            }
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                renderTable(currentPage);
                renderPagination();
            });
            pagination.appendChild(li);
        }
    }

    // Inicializar la tabla y la paginación
    renderTable(currentPage);
    renderPagination();

    //edit
    function editUser(id) {
        if (sessionStorage.getItem('id_edit')) {
            sessionStorage.removeItem('id_edit')
        }
        let datosEdit = {};
        console.log(dataConfig)
        dataConfig.forEach(e => {
            if (e['_id']['$oid'] == id) {
                datosEdit = e
            }
        })
        document.getElementById('imagenEdit').textContent = datosEdit['image_url']
        document.getElementById('nombresUser').value = datosEdit['nombres']
        document.getElementById('roleUser').value = datosEdit['role']
        document.getElementById('cedulaUser').value = datosEdit['cedula']
        document.getElementById('correoUser').value = datosEdit['correo_institucional']
        sessionStorage.setItem('id_edit', JSON.stringify({
            id: id,
            urlImagen: datosEdit['image_url']
        }));
    }

    function editUserClose() {
        eliminarContenido()
    }

    document.getElementById('usuariosForm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario de forma tradicional

        // Crear un objeto FormData con el formulario
        const formData = new FormData(event.target);
        let continueDataSend = true
        if (sessionStorage.getItem('id_edit')) {
            const idEdit = JSON.parse(sessionStorage.getItem('id_edit'));
            formData.append('idEdit', idEdit['id']);
            formData.append('urlEdit', idEdit['urlImagen']);
            await fetch('index.php?userProcess=create', {
                method: 'POST',
                body: formData // El cuerpo de la solicitud es el objeto FormData
            })
            await alert('Usuario Editado con exito')
            location.reload();

        } else {
            dataConfig.forEach(e => {
                if (e.cedula == formData.get('cedulaUser')) {
                    continueDataSend = false
                }
            })

            if (formData.get('imagenUser')['name'].length == 0) {
                await alert('suba una imagen')
            }else if (continueDataSend == true) {
                await fetch('index.php?userProcess=create', {
                    method: 'POST',
                    body: formData // El cuerpo de la solicitud es el objeto FormData
                })
                await alert('Usuario creado con exito')
                location.reload();
            } else {
                await alert('Usuario ya existente')
            }
        }

        // Hacer la solicitud fetch


    });
</script>