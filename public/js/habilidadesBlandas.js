function HabilidadBlandaadd() {
    const HabilidadBlanda = document.getElementById('HabilidadBlanda').value
    const DescripcionHabilidadBlanda = document.getElementById('DescripcionHabilidadBlanda').value
    datosFormTable.formacion_habilidades_blandas.push({
        habilidad_blanda: HabilidadBlanda,
        descripcion: DescripcionHabilidadBlanda
    })
    mostrarHabilidadBlanda();
}

function mostrarHabilidadBlanda() {
    const tablaBody = document.querySelector('#HabilidadesBlandasTable tbody');
    tablaBody.innerHTML = '';

    datosFormTable.formacion_habilidades_blandas.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${dato.habilidad_blanda}</td>
            <td>${dato.descripcion}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminarHabilidadBlanda(${index})"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
        `;
        tablaBody.appendChild(fila);
    });
}

function eliminarHabilidadBlanda(index) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.formacion_habilidades_blandas.splice(index, 1);

        mostrarHabilidadBlanda();
    }
}

mostrarHabilidadBlanda();
