function ResultadosAprendizajeadd() {
    const CompetenciaResultadoAprendizaje = document.getElementById('CompetenciaResultadoAprendizaje').value
    datosFormTable.resultados_aprendizaje.push({
        competencia: CompetenciaResultadoAprendizaje,
        datos: []
    })

    mostrarResultadosAprendizaje();
}

var index = 0
function AbrirResultadosAprendizajadd(indexgo) {
    event.preventDefault()
    index = indexgo
    var myModal = new bootstrap.Modal(document.getElementById('ResultadoAprendizajePlus'));
    myModal.show();
}

function addResultadosAprendizajeContenidoadd() {
    const resultadoaprendizajeResultadoAprendizaje = document.getElementById('resultadoaprendizajeResultadoAprendizaje').value
    const evidenciaresultadoaprendizajeResultadoAprendizaje = document.getElementById('evidenciaresultadoaprendizajeResultadoAprendizaje').value
    datosFormTable.resultados_aprendizaje[index].datos.push({
        resultados: resultadoaprendizajeResultadoAprendizaje,
        evidencia: evidenciaresultadoaprendizajeResultadoAprendizaje
    })
    mostrarResultadosAprendizaje();
}

function mostrarResultadosAprendizaje() {
    const tablaBodyresultado = document.querySelector('#ResultadosAprendizajeTable tbody');
    tablaBodyresultado.innerHTML = '';

    datosFormTable.resultados_aprendizaje.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
                <td rowspan="${dato.datos.length + 1}" class='colorTexto align-middle'>
                    <div class="d-flex justify-content-center align-items-center ">
                        <p class="me-1 my-0">${dato.competencia}</p> 
                        <button onclick="AbrirResultadosAprendizajadd(${index})" class="btn me-1 border-0 px-0"><img src="./resources/images/global/plus-circle-fill.svg" alt="SVG Example"></button>
                        <button onclick="eliminarResultadosAprendizajePadre(${index})" class="btn ms-1 border-0 px-0"><img src="./resources/images/global/x-circle-fill.svg" alt="SVG Example"></button>
                    </div>
                </td>

           
            
        `;
        tablaBodyresultado.appendChild(fila);
        dato.datos.forEach((e, indexNum) => {
            const filaExtra = document.createElement('tr');
            filaExtra.innerHTML = ` 
            <td class='colorTexto'>${e.resultados}</td>
            <td class='colorTexto'>${e.evidencia}</td>
            
            <td>
                <button class="btn btn-danger" onclick="eliminarResultadosAprendizaje(${index}, ${indexNum})"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
            `
            tablaBodyresultado.appendChild(filaExtra);
        });
    });
}

function eliminarResultadosAprendizaje(index, indexNum) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.resultados_aprendizaje[index].datos.splice(indexNum, 1);
        mostrarResultadosAprendizaje();
    }
}

function eliminarResultadosAprendizajePadre(index) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.resultados_aprendizaje.splice(index, 1);

        mostrarResultadosAprendizaje();
    }
}

mostrarResultadosAprendizaje();