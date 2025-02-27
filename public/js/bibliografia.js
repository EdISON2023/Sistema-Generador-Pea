function Bibliografiaadd() {

    const tipoBibliografia = document.getElementById('tipoBibliografia').value
    let tipoDescripcion = document.getElementById('tipoDescripcion').value
    if (tipoBibliografia == 1) {

        datosFormTable.bibliografia.basica.push({
            descripcion: tipoDescripcion,
        })
        mostrarBibliografia();
    } else {
        datosFormTable.bibliografia.complementaria.push({
            descripcion: tipoDescripcion,
        })
        mostrarBibliografiaComplementarias()
    }
}

function mostrarBibliografia() {
    const tablaBody = document.querySelector('#bibliografiaBasica');
    tablaBody.innerHTML = '';
    console.log(datosFormTable)
    datosFormTable.bibliografia.basica.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${dato.descripcion}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminarBibliografia(${index},1)"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
        `;
        tablaBody.appendChild(fila);
    });
}

function mostrarBibliografiaComplementarias() {
    const tablaBody = document.querySelector('#bibliografiaComplementaria');
    tablaBody.innerHTML = '';

    datosFormTable.bibliografia.complementaria.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${dato.descripcion}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminarBibliografia(${index},2)"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
        `;
        tablaBody.appendChild(fila);
    });
}

function eliminarBibliografia(index, tipo) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {

        if (tipo == 1) {
            datosFormTable.bibliografia.basica.splice(index, 1);
            mostrarBibliografia();
        } else {
            datosFormTable.bibliografia.complementaria.splice(index, 1)
            mostrarBibliografiaComplementarias()
        }
    }
}

mostrarBibliografia();
mostrarBibliografiaComplementarias()
