<?php
require_once '../src/Views/components/navbar.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar qué formulario fue enviado
    if (isset($_POST['form_id']) && $_POST['form_id'] == 'form_pea') {

        // Guardar los datos en la sesión
        $_SESSION['datosPeaImprimir'] = [
            "datos" => $datos,
            "action" => $_GET['action'],
            "periodo"=> $_GET['periodo'],
            "docente"=> $_GET['docente'],
        ];

        // Redirigir a otra página
        header('Location: index.php?reportePea=true');
        exit();
    }
}
$materias=[1=>'Desarrollo de software',2=>'Arte culinario Ecuatoriano',3=>'Diseño de modas',4=>'Guía nacional de turismo',5=>'Marketing digital']
?>
<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>
    <div class="espacioContenido">
        <?php require_once '../src/Views/components/header.php'; ?>
        <div class="d-flex  justify-content-center my-3 align-items-center">
            <h2 class="mb-0">Descripcion de la <span class="colorPrincipal">Carrera</span></h2>
        </div>
        <div class="mx-5 pb-5">
            <div class="my-5">
                <h4 class="colorPrincipal">Informacion General</h4>
            </div>
            <div class="d-flex justify-content-around">
                <p><b>Carrera: </b><?php echo $materias[(int) $_GET['action']] ?></p>
                <p><b>N.ro de creditos:</b> <?php echo $datos->creditos_materia; ?></p>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Distribución de horas en las actividades de aprendizaje</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope='col'>Aprendizaje en contacto con el docente</th>
                            <th scope='col'>Aprendizaje experimental en contacto con el docente</th>
                            <th scope='col'>Aprendizaje experimental Autonomo</th>
                            <th scope='col'>Aprendizaje Autonomo</th>
                            <th scope='col'>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class='colorTexto' style='width: calc(100% / 5);'><?php echo $datos->Distribucion_Horas->A_contacto_docente ?>h</td>
                            <td class='colorTexto' style='width: calc(100% / 5);'><?php echo $datos->Distribucion_Horas->A_experimental_decente ?>h</td>
                            <td class='colorTexto' style='width: calc(100% / 5);'><?php echo $datos->Distribucion_Horas->A_experimental_autonomo ?>h</td>
                            <td class='colorTexto' style='width: calc(100% / 5);'><?php echo $datos->Distribucion_Horas->A_autonomo ?>h</td>
                            <td class='colorTexto' style='width: calc(100% / 5);'>
                                <?php echo $datos->Distribucion_Horas->A_contacto_docente + $datos->Distribucion_Horas->A_experimental_decente + $datos->Distribucion_Horas->A_experimental_autonomo + $datos->Distribucion_Horas->A_autonomo ?>h
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Prerrequisitos y Correquisitos</h4>
            </div>
            <div class="d-flex justify-content-between">
                <div class="w-50 me-2">
                    <div class="d-flex flex-wrap justify-content-center">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope='col' colspan="2" class='text-center'><u>Prerrequisitros</u></th>
                                </tr>
                                <tr>
                                    <th scope='col' class=''>Codigo</th>
                                    <th scope='col' class=''>Asignatura</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($datos->prerequisitos as $data) {
                                    echo "<tr>
                                    <td class='colorTexto' style='width: calc(100% / 2);'>$data->codigo</td>
                                    <td class='colorTexto' style='width: calc(100% / 2);'>$data->asignatura</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="w-50">
                    <div class="d-flex flex-wrap justify-content-center">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope='col' colspan="2" class='text-center'><u>Correquisitros</u></th>
                                </tr>
                                <tr>
                                    <th scope='col'>Codigo</th>
                                    <th scope='col'>Asignatura</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($datos->correquisitos as $data) {
                                    echo "<tr>
                                    <td class='colorTexto' style='width: calc(100% / 2);'>$data->codigo</td>
                                    <td class='colorTexto' style='width: calc(100% / 2);'>$data->asignatura</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="my-3">
                <h4 class="colorPrincipal">Descricion de la asignatura</h4>
            </div>
            <div>
                <p><?php echo $datos->descripcion_materia ?></p>
            </div>
            
            <div class="my-3">
                <h4 class="colorPrincipal">Objetivo general</h4>
            </div>
            <div>
                <p><?php echo $datos->objetivo ?></p>
            </div>
            <div class="my-3">
                <h4 class="colorPrincipal">Resultado de aprendizaje</h4>
            </div>
            <div>
                <p><?php echo $datos->resultado ?></p>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Formación en habilidades blandas</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope='col' class=''>Habilidad blanda</th>
                            <th scope='col' class=''>Descripcion de habilidades relacionadas</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datos->formacion_habilidades_blandas as $data) {
                            echo "<tr>
                            <td class='colorTexto' style='width: 20%;'>$data->habilidad_blanda</td>
                            <td class='colorTexto' style='width: calc(100% / 2);'>$data->descripcion</td>
                        </tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Resultados de aprendizaje</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope='col'>Competencia</th>
                            <th scope='col'>resultado de aprendizaje</th>
                            <th scope='col'>evidencia del resultado de aprendizaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datos->resultados_aprendizaje as $data) {
                            $numeracionextrena = count($data->datos) + 1;
                            echo "<tr>
                            <td rowspan='$numeracionextrena' class='colorTexto align-middle' style='width: calc(100% / 3);'>
                                <div>$data->competencia</div>
                            </td>
                        </tr>";
                            foreach ($data->datos as $dataInterna) {
                                echo "<tr>
                            <td class='colorTexto' style='width: calc(100% / 3);'>$dataInterna->resultados</td>
                            <td class='colorTexto' style='width: calc(100% / 3);'>$dataInterna->evidencia</td>
                        </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Contenido de la asignatura</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <?php
                    foreach ($datos->contenido_asignatura as $indexOne => $data) {
                        $indexOne = $indexOne + 1;
                        echo "<thead class='table-light'>
                        <tr>
                            <th class='align-middle ' colspan='10'>Contenido de la unidad $indexOne: $data->nombre</th>
                        </tr>
                        <tr>
                            <th class='align-middle ' rowspan='2'>Semana No.</th>
                            <th class='align-middle ' rowspan='2'>Contenidos</th>
                            <th class='align-middle ' colspan='2'>Aprendizaje en contacto con el docente</th>
                            <th class='align-middle ' colspan='2'>Aprendizaje experimental en contacto con el docente</th>
                            <th class='align-middle ' colspan='4'>Aprendizaje autónomo</th>
                        </tr>
                        <tr>
                            <th class='align-middle '>Horas</th>
                            <th class='align-middle '>Actividades</th>
                            <th class='align-middle '>Horas</th>
                            <th class='align-middle '>Actividades</th>
                            <th class='align-middle '>Horas</th>
                            <th class='align-middle '>Actividades</th>
                            <th class='align-middle '>Horas</th>
                            <th class='align-middle '>Actividades</th>
                        </tr>
                    </thead>";
                        foreach ($data->contenido_semana as $datossemana) {
                            $semanasContenido = count($datossemana->contenidodeSemana) + 1;
                            echo "<tbody>
                        <tr>
                            <td class='align-middle' rowspan='$semanasContenido'>$datossemana->semana</td>
                        </tr>";
                            foreach ($datossemana->contenidodeSemana as $datossemana) {
                                $aprendizaje_docente = $datossemana->aprendizaje_docente;
                                $aprendizaje_experimental_docente = $datossemana->aprendizaje_experimental_docente;
                                $actividades_experimentales_autonomo = $datossemana->actividades_experimentales_autonomo;
                                $actividades_autonomo = $datossemana->actividades_autonomo;
                                echo "<tr>
                                <td class='align-middle'>" . (!empty($datossemana->contenido) ? $datossemana->contenido : '-') . "</td>
                                <td class='align-middle'>" . (!empty($aprendizaje_docente->horas) ? $aprendizaje_docente->horas : '-') . "</td>
                                <td class='align-middle'>" . (!empty($aprendizaje_docente->actividades) ? $aprendizaje_docente->actividades : '-') . "</td>
                                <td class='align-middle'>" . (!empty($aprendizaje_experimental_docente->horas) ? $aprendizaje_experimental_docente->horas : '-') . "</td>
                                <td class='align-middle'>" . (!empty($aprendizaje_experimental_docente->actividades) ? $aprendizaje_experimental_docente->actividades : '-') . "</td>
                                <td class='align-middle'>" . (!empty($actividades_experimentales_autonomo->horas) ? $actividades_experimentales_autonomo->horas : '-') . "</td>
                                <td class='align-middle'>" . (!empty($actividades_experimentales_autonomo->descripcion) ? $actividades_experimentales_autonomo->descripcion : '-') . "</td>
                                <td class='align-middle'>" . (!empty($actividades_autonomo->horas) ? $actividades_autonomo->horas : '-') . "</td>
                                <td class='align-middle'>" . (!empty($actividades_autonomo->descripcion) ? $actividades_autonomo->descripcion : '-') . "</td>
                              </tr>";
                            }
                            "</tbody>";
                        }
                    }
                    ?>
                </table>
            </div>

            <div class="mb-5 mt-4">
                <h4 class="colorPrincipal">Metodologia de enseñanza</h4>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope='col' colspan="2">Estrategias Metodologica</th>
                        </tr>
                        <tr>
                            <th scope='col'>Estrategia</th>
                            <th scope='col'>Definicion | Finalidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datos->metodologia_enseñanza as $data) {
                            echo "<tr>
                            <td class='colorTexto' style='width: 20%;'>$data->estrategia</td>
                            <td class='colorTexto' style='width: calc(100% / 2);'>$data->definicion</td>
                        </tr>";
                        }
                        ?>
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
                            <th scope='col'>Básica</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($datos->bibliografia->basica) && (is_array($datos->bibliografia->basica) || is_object($datos->bibliografia->basica))) {
                            foreach ($datos->bibliografia->basica as $data) {
                                echo "<tr>
                                    <td class='colorTexto'>{$data->descripcion}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='1'>Sin datos</td></tr>";
                        }
                        ?>
                    </tbody>
                    <thead>
                        <tr>
                            <th scope='col'>Complementaría</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($datos->bibliografia->complementaria) && (is_array($datos->bibliografia->complementaria) || is_object($datos->bibliografia->complementaria))) {
                            foreach ($datos->bibliografia->complementaria as $data) {
                                // Ensure $data has 'descripcion' before accessing
                                echo "<tr>
                                    <td class='colorTexto'>{$data->descripcion}</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='1'>Sin datos</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>





        </div>
    </div>
</div>

<div class="modal fade" id="subirArchivo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Subir Pea Validado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="form_id" value="form_pea">
                    <button type="submit" class="btn btn-warning text-light ms-2 w-100">
                        <img class='me-1' src='./resources/images/global/cloud-download-fill.svg' alt=''>Descargar documento de validación de Pea
                    </button>
                </form>


                <hr>
                <form action="index.php?validacion=true&action=<?php echo $_GET['action'] ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idMateriaArchivo" value="<?php echo $_GET['materia']; ?>">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="archivo" id="archivo">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary text-light">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    async function DataPeaValid() {
        await localStorage.removeItem('datosValidPea')
        await localStorage.setItem('datosValidPea', JSON.stringify({
            datos: <?php echo json_encode($datos) ?>,
            action: <?php echo json_encode($_GET['action']) ?>,
        }))
    }
</script>