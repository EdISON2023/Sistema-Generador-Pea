function MetodologiaEnseñanzaadd() {
    const MetodologiaDeEnseñanzaestrategia = document.getElementById('MetodologiaDeEnseñanzaestrategia').value
    const MetodologiaDeEnseñanzaDefinicion = document.getElementById('MetodologiaDeEnseñanzaDefinicion').value
    datosFormTable.metodologia_enseñanza.push({
        estrategia: MetodologiaDeEnseñanzaestrategia,
        definicion: MetodologiaDeEnseñanzaDefinicion
    })
    mostrarMetodologiaEnseñanza();
}

function mostrarMetodologiaEnseñanza() {
    const tablaBody = document.querySelector('#MetodologiasEnseñanzaTable tbody');
    tablaBody.innerHTML = '';

    datosFormTable.metodologia_enseñanza.forEach((dato, index) => {
        const fila = document.createElement('tr');

        fila.innerHTML = `
            <td>${dato.estrategia}</td>
            <td>${dato.definicion}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminarMetodologiaEnseñanza(${index})"><img src="./resources/images/global/trash3.svg" alt="SVG Example"></button>
            </td>
        `;
        tablaBody.appendChild(fila);
    });
}

function eliminarMetodologiaEnseñanza(index) {
    event.preventDefault();
    if (confirm("¿Está seguro de eliminar esta fila?")) {
        datosFormTable.metodologia_enseñanza.splice(index, 1);

        mostrarMetodologiaEnseñanza();
    }
}

mostrarMetodologiaEnseñanza();
