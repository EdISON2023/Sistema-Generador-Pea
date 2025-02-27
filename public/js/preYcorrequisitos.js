function PreRequisitosAdd() {
    const Pre_codigo = document.getElementById('Pre_codigo').value
    const Pre_asignatura = document.getElementById('Pre_asignatura').value
    datosFormTable.prerequisitos.push({
        codigo: Pre_codigo,
        asignatura: Pre_asignatura
    })
    mostrarDatosPrerequisitos();
}

function CoRequisitosAdd() {
    const Pre_codigo = document.getElementById('Co_codigo').value
    const Pre_asignatura = document.getElementById('Co_asignatura').value
    datosFormTable.correquisitos.push({
        codigo: Pre_codigo,
        asignatura: Pre_asignatura
    })
    mostrarDatosCorequisitos()
}

function mostrarDatosPrerequisitos() {
    const tablaBody = document.querySelector('#PrerrequisitrosTable tbody');
    tablaBody.innerHTML = '';

    datosFormTable.prerequisitos.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${dato.codigo}</td>
            <td>${dato.asignatura}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminarFilaPrerequisitos(${index})"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
        `;
        tablaBody.appendChild(fila);
    });
}

function mostrarDatosCorequisitos() {
    const tablaBody = document.querySelector('#CorrequisitrosTable tbody');
    tablaBody.innerHTML = '';

    datosFormTable.correquisitos.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${dato.codigo}</td>
            <td>${dato.asignatura}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminarFilaCorequisitos(${index})"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
        `;
        tablaBody.appendChild(fila);
    });
}

function eliminarFilaPrerequisitos(index) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.prerequisitos.splice(index, 1);

        mostrarDatosPrerequisitos();
    }
}

function eliminarFilaCorequisitos(index) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.correquisitos.splice(index, 1);

        mostrarDatosCorequisitos();
    }
}

mostrarDatosPrerequisitos();
mostrarDatosCorequisitos();