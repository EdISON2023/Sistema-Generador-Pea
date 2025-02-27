<?php
require_once '../src/Views/components/navbar.php';

?>


<script type="text/javascript">
    let datosFormTable = {
        codigo_asignatura: <?php echo json_encode($datos->codigo_asignatura); ?>,
        usuario: <?php echo json_encode($datos->usuario); ?>,
        semestre: <?php echo json_encode($datos->semestre); ?>,
        Distribucion_Horas: <?php echo json_encode($datos->Distribucion_Horas); ?>,
        documento_Validacion: <?php echo json_encode($datos->documento_Validacion); ?>,
        prerequisitos: <?php echo json_encode($datos->prerequisitos); ?>,
        correquisitos: <?php echo json_encode($datos->correquisitos); ?>,
        formacion_habilidades_blandas: <?php echo json_encode($datos->formacion_habilidades_blandas); ?>,
        metodologia_enseñanza: <?php echo json_encode($datos->metodologia_enseñanza); ?>,
        bibliografia: <?php echo json_encode($datos->bibliografia); ?>,
        resultados_aprendizaje: <?php echo json_encode($datos->resultados_aprendizaje); ?>,
        contenido_asignatura: <?php echo json_encode($datos->contenido_asignatura); ?>,
        resultado: <?php echo json_encode($datos->resultado); ?>,
        descripcion: <?php echo json_encode($datos->descripcion); ?>,
        descripcion_materia: <?php echo json_encode($datos->descripcion_materia); ?>,
        objetivo: <?php echo json_encode($datos->objetivo); ?>,
        creditos_materia: <?php echo json_encode($datos->creditos_materia); ?>,
        usuario_revisado:<?php echo json_encode($datos->usuario_revisado); ?>,
        usuario_aprovado:<?php echo json_encode($datos->usuario_aprovado); ?>
    };
    let idMateria = <?php echo json_encode($this->materia); ?>;
</script>
<style>
    .inputWidth {
        width: 40vw !important;
    }
</style>
<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>
    <div class="position-fixed w-100 px-4 ms-4" style="z-index: 9; background-color:rgb(255, 255, 255) !important;">
        <?php require_once '../src/Views/components/header.php'; ?>
    </div>
    <div class="espacioContenido " style="padding-top: 65px;">
        <div class="d-flex  justify-content-center my-3 align-items-center">
            <h4 class="mb-0"><span class="colorPrincipal">Formulario de Edicion</span></h4>
        </div>
        <div class="mx-5 pb-5">
            <div class="my-5">
                <h4 class="colorPrincipal">Informacion General</h4>
            </div>

            <div class="d-flex flex-wrap justify-content-around">
                <div class="form-floating mx-4 mb-2">
                    <input type="text" class="form-control inputWidth " id="descripcionMateria" value="<?php echo $datos->descripcion; ?>">
                    <!-- <textarea class="form-control" placeholder="Leave a comment here" id="descripcionMateria" style="height: 100px"><?php echo $datos->descripcion; ?></textarea> -->
                    <label for="descripcionMateria">Nombre de la asignatura</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control inputWidth" id="creditos_materia" placeholder="Password" value="<?php echo $datos->creditos_materia ?>">
                    <label for="creditos_materia">N.ro de creditos</label>
                </div>
            </div>

            <div class="my-5">
                <h4 class="colorPrincipal">Usuarios</h4>
            </div>

            <div class="d-flex flex-wrap justify-content-around">
                <div class="form-floating mx-4 mb-2">
                    <input type="text" class="form-control inputWidth " id="usuario_revisado" value="<?php echo $datos->usuario_revisado; ?>">
                    <label for="usuario_revisado">Revisado por:</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control inputWidth" id="usuario_aprovado" placeholder="Password" value="<?php echo $datos->usuario_aprovado ?>">
                    <label for="usuario_aprovado">Aprovado por:</label>
                </div>
            </div>


            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Distribución de horas en las actividades de aprendizaje</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-around">
                <div class="form-floating mb-2">
                    <input type="number" class="form-control inputWidth" id="A_contacto_docente" placeholder="Password" value="<?php echo $datos->Distribucion_Horas->A_contacto_docente; ?>">
                    <label for="A_contacto_docente">Aprendizaje en contacto con el docente</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="number" class="form-control inputWidth" id="A_experimental_decente" placeholder="Password" value="<?php echo $datos->Distribucion_Horas->A_experimental_decente; ?>">
                    <label for="A_experimental_decente">Aprendizaje experimental en contacto con el docente</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control inputWidth" id="A_experimental_autonomo" placeholder="Password" value="<?php echo $datos->Distribucion_Horas->A_experimental_autonomo; ?>">
                    <label for="A_experimental_autonomo">Aprendizaje experimental Autonomo</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control inputWidth" id="A_autonomo" placeholder="Password" value="<?php echo $datos->Distribucion_Horas->A_autonomo; ?>">
                    <label for="A_autonomo">Aprendizaje Autonomo</label>
                </div>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Prerrequisitos y Correquisitos</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-50 me-2">
                    <div class="d-flex flex-wrap justify-content-center">
                        <table class="table table-bordered text-center" id="PrerrequisitrosTable">
                            <thead>
                                <tr>
                                    <th scope='col' colspan="3">
                                        <div class="d-flex justify-content-around align-items-center"><u>Prerrequisitros</u> <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#Prerrequisitros">
                                                agregar
                                            </button></div>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope='col' class=''>Codigo</th>
                                    <th scope='col' class=''>Asignatura</th>
                                    <th scope='col' class=''>acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-50">
                    <div class="d-flex flex-wrap justify-content-center">
                        <table class="table table-bordered text-center" id="CorrequisitrosTable">
                            <thead>
                                <tr>
                                    <th scope='col' colspan="3">
                                        <div class="d-flex justify-content-around align-items-center"><u>Correquisitros</u> <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#Correquisitros">
                                                agregar
                                            </button></div>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope='col'>Codigo</th>
                                    <th scope='col'>Asignatura</th>
                                    <th scope='col' class=''>acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <h4 class="colorPrincipal">Descripcion de la Asignatura</h4>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="descripcion_materia" style="height: 100px"><?php echo $datos->descripcion_materia; ?></textarea>
                <label for="objetivoMateria">Descripcion</label>
            </div>

            <div class="my-3">
                <h4 class="colorPrincipal">Objetivo general</h4>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="objetivoMateria" style="height: 100px"><?php echo $datos->objetivo; ?></textarea>
                <label for="objetivoMateria">Descripcion</label>
            </div>
            <div class="my-3">
                <h4 class="colorPrincipal">Resultado de aprendizaje</h4>
            </div>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="resultadoMateria" style="height: 100px"><?php echo $datos->resultado; ?></textarea>
                <label for="resultadoMateria">Descripcion</label>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Formación en habilidades blandas</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center" id="HabilidadesBlandasTable">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary text-light me-3" data-bs-toggle="modal" data-bs-target="#FormacionHabilidadesBlandas">
                                        agregar
                                    </button></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope='col' class=''>Habilidad blanda</th>
                            <th scope='col' class=''>Descripcion de habilidades relacionadas</th>
                            <th scope='col' class=''>acciones</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Resultados de aprendizaje</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center" id="ResultadosAprendizajeTable">
                    <thead>
                        <tr>
                            <th colspan="4">
                                <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary text-light me-3" data-bs-toggle="modal" data-bs-target="#ResultadoAprendizaje">
                                        agregar
                                    </button></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope='col'>Competencia </th>
                            <th scope='col'>resultado de aprendizaje</th>
                            <th scope='col'>evidencia del resultado de aprendizaje</th>
                            <th scope='col' class=''>acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Contenido de la asignatura</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center" id="contenidoAsignaturaTable">

                </table>
            </div>

            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Metodologia de enseñanza</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center" id="MetodologiasEnseñanzaTable">
                    <thead>
                        <tr>
                            <th colspan="3">
                                <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary text-light me-3" data-bs-toggle="modal" data-bs-target="#MetodologiaDeEnseñanza">
                                        agregar
                                    </button></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope='col' colspan="3">Estrategias Metodologica</th>
                        </tr>
                        <tr>
                            <th scope='col'>Estrategia</th>
                            <th scope='col'>Definicion | Finalidad</th>
                            <th scope='col' class=''>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Bibliografia</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary text-light me-3" data-bs-toggle="modal" data-bs-target="#Bibliografia">
                                        agregar
                                    </button></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope='col'>Básica</th>
                            <th scope='col'>acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bibliografiaBasica">

                    </tbody>
                    <thead>
                        <tr>
                            <th scope='col'>Complementaría</th>
                            <th scope='col'>acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bibliografiaComplementaria">
                    </tbody>
                </table>
            </div>


            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Usuarios</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <div class="d-flex justify-content-end"><button type="button" class="btn btn-primary text-light me-3" data-bs-toggle="modal" data-bs-target="#Bibliografia">
                                        agregar
                                    </button></div>
                            </th>
                        </tr>
                        <tr>
                            <th scope='col'>C</th>
                            <th scope='col'>acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bibliografiaBasica">

                    </tbody>
                    <thead>
                        <tr>
                            <th scope='col'>Complementaría</th>
                            <th scope='col'>acciones</th>
                        </tr>
                    </thead>
                    <tbody id="bibliografiaComplementaria">
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

<?php
require_once '../src/Views/components/modalesFormMateria.php';
?>
<script>
    async function enviarDatos() {
        var respuesta = false
        datosFormTable.Distribucion_Horas.A_contacto_docente = document.getElementById('A_contacto_docente').value;
        datosFormTable.Distribucion_Horas.A_experimental_decente = document.getElementById('A_experimental_decente').value;
        datosFormTable.Distribucion_Horas.A_experimental_autonomo = document.getElementById('A_experimental_autonomo').value;
        datosFormTable.Distribucion_Horas.A_autonomo = document.getElementById('A_autonomo').value;

        datosFormTable.usuario_revisado=document.getElementById('usuario_revisado').value;
        datosFormTable.usuario_aprovado = document.getElementById('usuario_aprovado').value;

        datosFormTable.descripcion_materia=document.getElementById('descripcion_materia').value;
        datosFormTable.descripcion = document.getElementById('descripcionMateria').value;
        datosFormTable.objetivo = document.getElementById('objetivoMateria').value;
        datosFormTable.resultado = document.getElementById('resultadoMateria').value;
        datosFormTable.creditos_materia = document.getElementById('creditos_materia').value;

        const response = await fetch('index.php?materiaProcess=true', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: idMateria,
                data: datosFormTable
            })
        });
        const data = await response.json();
        if (data['success'] == true) {
            respuesta = true
            if (respuesta == true) {
                alert('Datos cambiados correctamente')
                window.location.href = "index.php?action=" + <?php echo json_encode($_GET['action']); ?> + "&materia=" + data['updatedData']['id'];
            }
        }





    }
</script>