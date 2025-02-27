<div class="modal fade" id="MallaFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-4" style="max-width: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Agregar Malla Curricular</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-1"><b>Datos de la malla curricular</b></p>
                <div class="d-flex gap-3">
                    <div class="form-floating">
                        <select class="form-select" id="years" aria-label="Floating label select example">
                            <option selected>Seleccionar año</option>
                        </select>
                        <label for="years">Año</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="periodo" aria-label="Floating label select example">
                            <option selected>Seleccionar período</option>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <label for="floatingSelect">Período</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="TotalSemestres" aria-label="Floating label select example">
                            <option>Seleccionar semestres</option>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <label for="floatingSelect">Total de Semestres</label>
                    </div>
                </div>
                <p class="mb-1 mt-3"><b>Datos de la Materia</b></p>
                <div class="d-flex gap-3">
                    <div class="form-floating">
                        <select class="form-select" id="ValoresSemestre">


                        </select>
                        <label for="semestre">Semestre</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="Co_codigo" placeholder="Nombre de la materia">
                        <label for="Co_codigo">Nombre</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="docente">
                            <option selected>Seleccionar docente</option>
                            <?php
                            if (count($data['docentes']) > 0) {
                                foreach ($data['docentes'] as $opcion) {
                                    echo "<option value='$opcion[_id]'>$opcion[nombres]</option>";
                                }
                            } else {
                                echo "<option value=''>Sin docentes</option>";
                            }

                            ?>
                        </select>
                        <label for="docente">Docente a cargo</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-warning text-dark" id="agregarBtn">Agregar Materia</button>
                    </div>
                </div>

                <table class="table text-center mx-2 mt-3" id="materiasTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="addMallaModal()" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="addMalla()" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>




<script>
    function cargarAnios() {
        const selectAnios = document.getElementById('years');
        const anioActual = new Date().getFullYear();
        const anioInicio = anioActual + 1;
        const cantidadAnios = 10;

        selectAnios.innerHTML = '<option value="" disabled selected>Seleccionar año</option>';

        for (let i = 0; i <= cantidadAnios; i++) {
            const anio = anioInicio - i;
            const option = document.createElement('option');
            option.value = anio;
            option.textContent = anio;
            selectAnios.appendChild(option);
        }

        selectAnios.value = anioActual;
    }

    window.onload = cargarAnios;
</script>

<script>
    let TotalSemestres = document.getElementById('TotalSemestres');



    function actualizarSemestresMateria(num) {
        let valoresSemestre = document.getElementById('ValoresSemestre');
        let valoresSemestreEdit = document.getElementById('ValoresSemestreEdit');
        valoresSemestre.innerHTML = "<option selected>Seleccionar semestre</option>"
        if (valoresSemestreEdit) {
            for (let index = 1; index <= num; index++) {

                let optionEdit = document.createElement('option');
                optionEdit.value = index;
                optionEdit.textContent = index;
                valoresSemestreEdit.appendChild(optionEdit);
            }
        }
        if (valoresSemestre) {
            for (let index = 1; index <= num; index++) {

                let option = document.createElement('option');
                option.value = index;
                option.textContent = index;
                valoresSemestre.appendChild(option);
            }
        }



    }

    TotalSemestres.addEventListener('change', (e) => {
        console.log(TotalSemestres.value)
        actualizarSemestresMateria(TotalSemestres.value)
    })

    actualizarSemestresMateria(TotalSemestres.value)
    let materias = [];
    let editingIndex = -1;

    document.getElementById('agregarBtn').addEventListener('click', function() {
        const semestre = document.getElementById('ValoresSemestre').value;
        const nombre = document.getElementById('Co_codigo').value;
        const docente = document.getElementById('docente').value;

        if (semestre && nombre && docente) {
            if (editingIndex === -1) {
                const materia = {
                    semestre,
                    nombre,
                    docente
                };
                materias.push(materia);
            } else {
                materias[editingIndex] = {
                    semestre,
                    nombre,
                    docente
                };
                editingIndex = -1;
            }
            renderTable();
            clearInputs();
        } else {
            alert("Completa todos los campos");
        }
    });

    function renderTable() {
        let docentes = <?php echo json_encode($data['docentes']) ?>;
        const materiasTableBody = document.querySelector('#materiasTable tbody');
        materiasTableBody.innerHTML = '';
        materias.forEach((materia, index) => {
            let docente = ""
            docentes.forEach((e) => {
                if (materia.docente == e['_id']['$oid']) {
                    docente = `${e['nombres']}`
                }
            })
            const row = `<tr>
                <th scope="row">${index + 1}</th>
                <td>${materia.semestre}</td>
                <td>${materia.nombre}</td>
                <td>${docente}</td>
                <td>
                    <button class="btn btn-primary text-light" onclick="editMateria(${index})">Editar</button>
                    <button class="btn btn-danger text-light" onclick="deleteMateria(${index})">Eliminar</button>
                </td>
            </tr>`;
            materiasTableBody.innerHTML += row;
        });
    }

    function deleteMateria(index) {
        const confirmDelete = window.confirm("¿Estás seguro de que deseas eliminar esta materia?");
        if (confirmDelete) {
            materias.splice(index, 1);
            renderTable();
        }
    }

    function editMateria(index) {
        const materia = materias[index];
        document.getElementById('ValoresSemestre').value = materia.semestre;
        document.getElementById('Co_codigo').value = materia.nombre;
        document.getElementById('docente').value = materia.docente;
        editingIndex = index;
    }

    function clearInputs() {
        document.getElementById('ValoresSemestre').selectedIndex = 0;
        document.getElementById('Co_codigo').value = '';
        document.getElementById('docente').selectedIndex = 0;
    }
</script>
<script>
    async function addMalla() {
        let dataExistente = <?php echo json_encode($data['coleccion']); ?>;
        let permisoAdd = true;
        let dataenvio = {
            periodo: `${document.getElementById('years').value}-${document.getElementById('periodo').value}`,
            carrera: <?php echo $_GET['action']; ?>,
            semestres: Number(document.getElementById('TotalSemestres').value),
            materias: materias,
            delete_at: true
        }
        await dataExistente.forEach((exist) => {
            if (dataenvio.periodo == exist.periodo) {
                permisoAdd = false
            }
        })
        console.log(dataExistente)
        if (permisoAdd == true) {
            const response = await fetch('index.php?mallaProcess=true', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataenvio)
            });
            const data = await response.json();
            if (data['success'] == true) {
                location.reload();
            }
        } else {
            alert('Periodo ya existente')
        }

    }
</script>






<div class="modal fade" id="EditMallaFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mx-4" style="max-width: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualizar Malla Curricular <span style="color: red;" id="fechaedit"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-1"><b>Datos de la malla curricular </b></p>
                <div class="d-flex gap-3">
                    <div class="form-floating">
                        <select class="form-select" id="TotalSemestresEdit" aria-label="Floating label select example">
                            <option>Seleccionar semestres</option>
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <label for="floatingSelect">Total de Semestres</label>
                    </div>
                </div>
                <p class="mb-1 mt-3"><b>Datos de la Materia</b></p>
                <div class="d-flex gap-3">
                    <div class="form-floating">
                        <select class="form-select" id="ValoresSemestreEdit">


                        </select>
                        <label for="semestre">Semestre</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="Co_codigoEdit" placeholder="Nombre de la materia">
                        <label for="Co_codigo">Nombre</label>
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="docenteEdit">
                            <option selected>Seleccionar docente</option>
                            <?php
                            if (count($data['docentes']) > 0) {
                                foreach ($data['docentes'] as $opcion) {
                                    echo "<option value='$opcion[_id]'>$opcion[nombres]</option>";
                                }
                            } else {
                                echo "<option value=''>Sin docentes</option>";
                            }

                            ?>
                        </select>
                        <label for="docente">Docente a cargo</label>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-warning text-dark" id="agregarBtnEdit">Agregar Materia</button>
                    </div>
                </div>

                <table class="table text-center mx-2 mt-3" id="materiasTableEdit">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Docente</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="cerrarventanaModalEdit()" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="Editmalla()" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>



<script>
    let materiasEdit = [];
    let editingIndexEdit = -1;
    let EliminarMateriaExitente = []
    let datosEdit = {}

    function initEdit() {

        EliminarMateriaExitente = []
        datosEdit = JSON.parse(localStorage.getItem('editMalla'));

        document.getElementById('fechaedit').innerText = datosEdit['selectedEdit']
        //console.log(datosEdit['dataEdit']['materias'])
        let TotalSemestresEdit = document.getElementById('TotalSemestresEdit');
        TotalSemestresEdit.value = datosEdit['dataEdit']['semestres']
        TotalSemestresEdit.addEventListener('change', (e) => {
            actualizarSemestresMateriaEdit(TotalSemestresEdit.value)
        })
        actualizarSemestresMateriaEdit(TotalSemestresEdit.value)
        materiasEdit = datosEdit['MateriasEdit'];

        renderTableEdit()
    }

    function actualizarSemestresMateriaEdit(num) {
        //console.log('num',num)
        let valoresSemestreEdit = document.getElementById('ValoresSemestreEdit');
        valoresSemestreEdit.innerHTML = "<option selected>Seleccionar semestre</option>"
        if (valoresSemestreEdit) {
            for (let index = 1; index <= num; index++) {

                let optionEdit = document.createElement('option');
                optionEdit.value = index;
                optionEdit.textContent = index;
                valoresSemestreEdit.appendChild(optionEdit);
            }
        }
    }






    document.getElementById('agregarBtnEdit').addEventListener('click', function() {
        const semestreedit = document.getElementById('ValoresSemestreEdit').value;
        const nombreedit = document.getElementById('Co_codigoEdit').value;
        const docenteedit = document.getElementById('docenteEdit').value;

        if (semestreedit && nombreedit && docenteedit) {
            if (editingIndexEdit === -1) {
                const materia = {
                    semestre: semestreedit,
                    descripcion: nombreedit,
                    usuario: docenteedit
                };
                materiasEdit.push(materia);
            } else {
                materiasEdit[editingIndexEdit]['semestre'] = semestreedit
                materiasEdit[editingIndexEdit]['descripcion'] = nombreedit
                materiasEdit[editingIndexEdit]['usuario'] = docenteedit
                // materiasEdit[editingIndexEdit] = {
                //     semestre: semestreedit,
                //     descripcion: nombreedit,
                //     usuario: docenteedit
                // };
                editingIndexEdit = -1;
            }
            console.log(materiasEdit)
            renderTableEdit();
            clearInputseDIT();
        } else {
            alert("Completa todos los campos");
        }
    });

    function renderTableEdit() {
        let docentesEdit = <?php echo json_encode($data['docentes']) ?>;
        const materiasTableBody = document.querySelector('#materiasTableEdit tbody');
        materiasTableBody.innerHTML = '';

        if (materiasEdit) {
            materiasEdit.forEach((materia, index) => {
                let docenteEdit = ""
                docentesEdit.forEach((e) => {
                    if (materia.usuario == e['_id']['$oid']) {
                        docenteEdit = `${e['nombres']}`
                    }
                })
                const row = `<tr>
                <th scope="row">${index + 1}</th>
                <td>${materia.semestre}</td>
                <td>${materia.descripcion}</td>
                <td>${docenteEdit}</td>
                <td>
                    <button class="btn btn-primary text-light" onclick="editMateriaeDIT(${index})">Editar</button>
                    <button class="btn btn-danger text-light" onclick="deleteMateria(${index})">Eliminar</button>
                </td>
            </tr>`;
                materiasTableBody.innerHTML += row;
            });
        }
    }


    function deleteMateria(index) {

        const confirmDelete = window.confirm("¿Estás seguro de que deseas eliminar esta materia?");
        if (confirmDelete) {
            if (materiasEdit[index]['_id']['$oid']) {
                EliminarMateriaExitente.push(materiasEdit[index]['_id']['$oid'])
            }
            materiasEdit.splice(index, 1);
            renderTable();
        }
    }

    function editMateriaeDIT(index) {
        const materia = materiasEdit[index];
        document.getElementById('ValoresSemestreEdit').value = materia.semestre;
        document.getElementById('Co_codigoEdit').value = materia.descripcion;
        document.getElementById('docenteEdit').value = materia.usuario;
        editingIndexEdit = index;
    }

    function clearInputseDIT() {
        document.getElementById('ValoresSemestreEdit').selectedIndex = 0;
        document.getElementById('Co_codigoEdit').value = '';
        document.getElementById('docenteEdit').selectedIndex = 0;
    }

    function cerrarventanaModalEdit() {
        addMallaModal()
        EliminarMateriaExitente = []
    }
</script>
<script>
    async function Editmalla() {
        let dataenvioEdit = {
            data: {
                periodo: datosEdit['selectedEdit'],
                carrera: <?php echo $_GET['action']; ?>,
                semestres: Number(document.getElementById('TotalSemestresEdit').value),
                materias: materiasEdit,
                delete_at: true
            },
            eliminar: EliminarMateriaExitente,
            id: datosEdit['dataEdit']['_id']['$oid']

        }
        console.log(dataenvioEdit)

        const response = await fetch('index.php?mallaEditProcess=true', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dataenvioEdit)
        });
        location.reload();
    }
</script>