function ContenidoAsignaturaSemanasadd() {
    const ContenidoAsignaturaSemanasContenido = document.getElementById('ContenidoAsignaturaSemanasContenido').value
    const ContenidoAsignaturaSemanasSemanas = document.getElementById('ContenidoAsignaturaSemanasSemanas').value

    let datosContenido = {
        nombre: ContenidoAsignaturaSemanasContenido,
        contenido_semana: []
    }
    for (let i = 0; i < ContenidoAsignaturaSemanasSemanas; i++) {
        datosContenido.contenido_semana.push({
            semana: i + 1,
            contenidodeSemana: []
        })

    }
    datosFormTable.contenido_asignatura.push(
        datosContenido
    )

    mostrarContenidoAsignaturaSemanas();
}

var indexContenido = {
    index: 0,
    indexcont: 0,
}
function AbrirContenidoAsignaturaSemanasadd(indexgo, indextt) {
    event.preventDefault()
    indexContenido.indexcont = indexgo
    indexContenido.index = indextt
    var myModal = new bootstrap.Modal(document.getElementById('ContenidoAsignaturaSemanasplus'));
    myModal.show();
}

function addContenidoAsignaturaSemanasadd() {
    const contenidoContenido = document.getElementById('contenidoContenido').value
    const Contenidodocentehoras = document.getElementById('Contenidodocentehoras').value
    const Contenidodocenteactividad = document.getElementById('Contenidodocenteactividad').value
    const ContenidoexperimentaldocenteHoras = document.getElementById('ContenidoexperimentaldocenteHoras').value
    const ContenidoexperimentaldocenteActividad = document.getElementById('ContenidoexperimentaldocenteActividad').value
    const ContenidoExperimentalHoras = document.getElementById('ContenidoExperimentalHoras').value
    const ContenidoExperimentalActividad = document.getElementById('ContenidoExperimentalActividad').value
    const ContenidoAutonomoHoras = document.getElementById('ContenidoAutonomoHoras').value
    const ContenidoAutonomoActividad = document.getElementById('ContenidoAutonomoActividad').value
    datosFormTable.contenido_asignatura[indexContenido.index].contenido_semana[indexContenido.indexcont].contenidodeSemana.push({
        contenido: contenidoContenido,
        aprendizaje_docente: { horas: Contenidodocentehoras, actividades: Contenidodocenteactividad },
        aprendizaje_experimental_docente: { horas: ContenidoexperimentaldocenteHoras, actividades: ContenidoexperimentaldocenteActividad },
        actividades_experimentales_autonomo: { horas: ContenidoExperimentalHoras, descripcion: ContenidoExperimentalActividad },
        actividades_autonomo: { horas: ContenidoAutonomoHoras, descripcion: ContenidoAutonomoActividad }
    })
    mostrarContenidoAsignaturaSemanas();
}


function mostrarContenidoAsignaturaSemanas() {
    const tablaBodycontenido = document.querySelector('#contenidoAsignaturaTable');
    tablaBodycontenido.innerHTML = `<thead class="table-light">
                        <th colspan="11">
                            <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary text-light me-3" data-bs-toggle="modal" data-bs-target="#ContenidoAsignaturaSemanas">
                                    agregar
                                </button></div>
                        </th>
                    </thead>`;
    datosFormTable.contenido_asignatura.forEach((dato, index) => {
        const fila = document.createElement('thead');
        fila.classList.add('table-light');
        fila.innerHTML = `
                            <tr>
                                <th class="align-middle " colspan="11">Contenido de la unidad ${index + 1} : ${dato.nombre}</th>
                            </tr>
                            <tr>
                                <th class="align-middle " rowspan="2">Semana No.</th>
                                <th class="align-middle " rowspan="2">Contenidos</th>
                                <th class="align-middle " colspan="2">Aprendizaje en contacto con el docente</th>
                                <th class="align-middle " colspan="2">Aprendizaje experimental en contacto con el docente</th>
                                <th class="align-middle " colspan="4">Aprendizaje autónomo</th>
                                <th class="align-middle " rowspan="2">Acciones</th>
                            </tr>
                            <tr>
                                <th class="align-middle ">Horas</th>
                                <th class="align-middle ">Actividades</th>
                                <th class="align-middle ">Horas</th>
                                <th class="align-middle ">Actividades</th>
                                <th class="align-middle ">Horas</th>
                                <th class="align-middle ">Actividades experimentale autonomas</th>
                                <th class="align-middle ">Horas</th>
                                <th class="align-middle ">Actividades autonomas</th>
                                
                            </tr>

        `
        tablaBodycontenido.appendChild(fila);
        dato.contenido_semana.forEach((e, indexpro) => {
            const filatbody = document.createElement('tbody');

            filatbody.innerHTML = `
                <tr>
                    <td rowspan="${e.contenidodeSemana.length + 1}" class="align-middle">
                        <div class="d-flex justify-content-center align-items-center ">
                            <p class="me-1 my-0">${indexpro + 1}</p>
                            <button class="btn border-0 px-0" onclick="AbrirContenidoAsignaturaSemanasadd(${indexpro},${index})">
                                <img src="./resources/images/global/plus-circle-fill.svg" alt="SVG Example">
                            </button>
                            <button onclick="eliminarContenidoAsignaturaSemanasPadre(${index},${indexpro})" class="btn ms-1 border-0 px-0"><img src="./resources/images/global/x-circle-fill.svg" alt="SVG Example"></button>
                        </div>
                    </td>
                </tr>
            `;

            e.contenidodeSemana.forEach((contenido, i) => {
                filatbody.innerHTML += `
                    <tr>
                        <td>${contenido.contenido == undefined ? "-" : contenido.contenido}</td>
<td>${contenido.aprendizaje_docente.horas == undefined ? "-" : contenido.aprendizaje_docente.horas}</td>
<td>${contenido.aprendizaje_docente.actividades == undefined ? "-" : contenido.aprendizaje_docente.actividades}</td>
<td>${contenido.aprendizaje_experimental_docente.horas == undefined ? "-" : contenido.aprendizaje_experimental_docente.horas}</td>
<td>${contenido.aprendizaje_experimental_docente.actividades == undefined ? "-" : contenido.aprendizaje_experimental_docente.actividades}</td>
<td>${contenido.actividades_experimentales_autonomo.horas == undefined ? "-" : contenido.actividades_experimentales_autonomo.horas}</td>
<td>${contenido.actividades_experimentales_autonomo.descripcion == undefined ? "-" : contenido.actividades_experimentales_autonomo.descripcion}</td>
<td>${contenido.actividades_autonomo.horas == undefined ? "-" : contenido.actividades_autonomo.horas}</td>
<td>${contenido.actividades_autonomo.descripcion == undefined ? "-" : contenido.actividades_autonomo.descripcion}</td>
<td>
                <button class="btn btn-danger" onclick="eliminarContenidoAsignaturaSemanas(${index},${indexpro},${i})"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>

                    </tr>
                `;
            });

            tablaBodycontenido.appendChild(filatbody);
        });



    });
}

function eliminarContenidoAsignaturaSemanas(index, indexpro, indexNum) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.contenido_asignatura[index].contenido_semana[indexpro].contenidodeSemana.splice(indexNum, 1);
        mostrarContenidoAsignaturaSemanas();
    }
}

function eliminarContenidoAsignaturaSemanasPadre(index, indexpro) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.contenido_asignatura[index].contenido_semana.splice(indexpro, 1);

        mostrarContenidoAsignaturaSemanas();
    }
}

mostrarContenidoAsignaturaSemanas();