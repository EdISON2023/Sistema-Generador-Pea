<?php
ob_start();
//print_r($_SESSION['datosPeaImprimir']['datos']);
$materias=[1=>'Desarrollo de software',2=>'Arte culinario Ecuatoriano',3=>'Diseño de modas',4=>'Guía nacional de turismo',5=>'Marketing digital'];
$materiasSiglas=[1=>'DS-',2=>'ARC-',3=>'DM-',4=>'GT-',5=>'MD-'];
$fechaHoy = date('d/m/Y');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEA</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            font-size: 9px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #000000;
            margin-bottom: 80px;

        }

        th,
        td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #000000;

        }

        .backblue {
            background-color: rgb(175, 216, 216);
        }



        td {
            color: #000000;
        }

        .tituloBody {
            background-color: rgb(182, 206, 182);
        }

        .backorange {
            background-color: rgb(230, 215, 189);
        }

        .header {
            font-weight: bold;
            text-align: center;
            border: 1px solid #000000;
            /* Borde más oscuro */
        }

        .cell:focus {
            background-color: #e6f3ff;
            outline: none;
        }

        .textcenter {
            text-align: center;
        }

        p {
            margin: 0;
        }

        table {
            border-collapse: collapse;

        }

        td,
        th {
            border: 1px solid black;
            padding: 5px;

        }
        .orangeIntenso{
            background-color: orangered;
        }
    </style>
</head>

<body>


    <table style="width: 100%;">
        <tbody>
            <tr>
                <th class="header" colspan='3' rowspan="4">
                    <img src="https://ignug.yavirac.edu.ec/assets/images/web/logo_login.png" alt="" width="100px">
                </th>
                <th class="backblue header" colspan='11'>
                    INSTITUTO SUPERIOR TECNOLOGICO DE TURISMO Y PATRIMONIO YAVIRAC
                </th>

            </tr>
            <tr>
                <th class=" header" colspan='11'>
                    MACROPROCESO 01 DOCENCIA
                </th>

            </tr>
            <tr>
                <th class="orangeIntenso header" colspan='11' >
                    PROCESO 01 SEGUIMIENTO, CONTROL Y EVALUACION DEL PROCESO DOCENTE
                </th>
                
            </tr>
            <tr>
            <th class=" header" colspan='11'>
                    FORMATO DE PRORAMACION DE ESTUDIO DE LA ASIGNATURA
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    1. Información General de la asignatura
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" colspan='2'>Asignatura:</td>
                <td class="cell" colspan='12' id="asignatura"><?php echo $_SESSION['datosPeaImprimir']['datos']->descripcion ?></td>
            </tr>
            <tr>
                <td class="cell tituloBody" colspan='2'>Carrera:</td>
                <td class="cell" colspan='5' id="carrera"><?php echo $materias[$_SESSION['datosPeaImprimir']['action']] ?></td>
                <td class="cell tituloBody" colspan='3'>Codigo de la Asignatura:</td>
                <td class="cell" colspan='4' id="codigoAsigntura"><?php echo $materiasSiglas[$_SESSION['datosPeaImprimir']['action']] ?><?php echo $_SESSION['datosPeaImprimir']['periodo']?></td>
            </tr>
            <tr>
                <td class="cell tituloBody" colspan='2'>Periodo academico:</td>
                <td class="cell" colspan='5' id="PeriodoAcademico"><?php echo $_SESSION['datosPeaImprimir']['periodo']?></td>
                <td class="cell tituloBody" colspan='3'>N total de horas de la asignatura:</td>
                <td class="cell" colspan='4' id="numHoras"><?php echo $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_contacto_docente +  $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_experimental_decente + $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_experimental_autonomo + $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_autonomo ?></td>
            </tr>
            <tr>
                <td class="cell tituloBody" colspan='2'>Modalidad:</td>
                <td class="cell" colspan='5' id="modalidad">Dual / Jornada intensiva</td>
                <td class="cell tituloBody" colspan='3'>N total de creditos:</td>
                <td class="cell" colspan='4' id="Ncreditos"><?php echo $_SESSION['datosPeaImprimir']['datos']->creditos_materia ?></td>
            </tr>
            <tr>
                <td class="cell tituloBody" style="text-align: center;" colspan='14'>Distribucion de horas en las actividades de aprendizaje</td>
            </tr>
            <tr>
                <td class="cell tituloBody backorange" colspan='2'>Aprendizaje en contacto con el docente:</td>
                <td class="cell" colspan='2'><?php echo $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_contacto_docente ?></td>
                <td class="cell tituloBody backorange" colspan='2'>Aprendizaje experimental en contacto con el docente:</td>
                <td class="cell"><?php echo $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_experimental_decente ?></td>
                <td class="cell tituloBody backorange" colspan='2'>Aprendizaje experimental autonomo:</td>
                <td class="cell" colspan='2'><?php echo $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_experimental_autonomo ?></td>
                <td class="cell tituloBody backorange" colspan='2'>Aprendizaje autonomo:</td>
                <td class="cell"><?php echo $_SESSION['datosPeaImprimir']['datos']->Distribucion_Horas->A_autonomo ?></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    2. Prerrequisitos y Correquisitos
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody textcenter" colspan='7'>Prerrequisitos de la asignatura</td>
                <td class="cell tituloBody textcenter" colspan='7'>Correquisitos de la asignatura</td>
            </tr>
            <tr>
                <td class="cell tituloBody backorange" colspan='3'>Codigo:</td>
                <td class="cell tituloBody backorange" colspan='4'>Asignatura:</td>
                <td class="cell tituloBody backorange" colspan='3'>Codigo:</td>
                <td class="cell tituloBody backorange" colspan='4'>Asignatura:</td>
            </tr>
        </tbody>
        <tbody>
            <?php
            $correquisitos = $_SESSION['datosPeaImprimir']['datos']->correquisitos;
            $prerequisitos = $_SESSION['datosPeaImprimir']['datos']->prerequisitos;
            $maxLength = max(count($correquisitos), count($prerequisitos));
            for ($i = 0; $i < $maxLength; $i++) {

                $correquisito1 = isset($correquisitos[$i]) ? $correquisitos[$i]->codigo : "-";
                $correquisito2 = isset($correquisitos[$i]) ? $correquisitos[$i]->asignatura : "-"; // El siguiente número para la columna "Número 2"


                $prerequisitos1 = isset($prerequisitos[$i]) ? $prerequisitos[$i]->codigo : "-";
                $prerequisitos2 = isset($prerequisitos[$i]) ? $prerequisitos[$i]->asignatura : "-"; // El siguiente color para la columna "Color 2"


                echo "
                <tr>
                <td class='cell' colspan='3'>$correquisito1</td>
                <td class='cell' colspan='4'>$correquisito2</td>
                <td class='cell' colspan='3'>$prerequisitos1</td>
                <td class='cell' colspan='4'>$prerequisitos2</td>
            </tr>";
            }
            ?>
        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    3. Descripcion de la Asignatura
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell" colspan='14'>
                    <?php echo $_SESSION['datosPeaImprimir']['datos']->descripcion_materia ?>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    4. Objetivo general
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell" colspan='14'>
                    <?php echo $_SESSION['datosPeaImprimir']['datos']->objetivo ?>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    5. Resultado de aprendizaje de la asignatura
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell" colspan='14'>
                    <?php echo $_SESSION['datosPeaImprimir']['datos']->resultado ?>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    6. Formacion en habilidades blandas
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" colspan='4'>Habilidades Blandas</td>
                <td class="cell tituloBody" colspan='10'>Descripcion de actividades relacionadas</td>
            </tr>
        </tbody>
        <tbody>

            <?php
            foreach ($_SESSION['datosPeaImprimir']['datos']->formacion_habilidades_blandas as $valueHabilidades) {
                $habilidad_blanda = $valueHabilidades->habilidad_blanda;
                $descripcion = $valueHabilidades->descripcion;
                echo "
            <tr>
                <td class='cell' colspan='4'>$habilidad_blanda</td>
                <td class='cell' colspan='10'>$descripcion</td>
            </tr>
            ";
            }
            ?>

        </tbody>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    7. Resultado de aprendizaje de la asignatura
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" colspan='2'>Competencia</td>
                <td class="cell tituloBody" colspan='6'>Resultado de Aprendizaje</td>
                <td class="cell tituloBody" colspan='6'>Evidencia del resultado de aprendizaje</td>
            </tr>
        </tbody>

        <tbody>
            <?php
            foreach ($_SESSION['datosPeaImprimir']['datos']->resultados_aprendizaje as $datosResultadoAsignatura) {
                foreach ($datosResultadoAsignatura->datos as $indexresul => $datosresultados) {
                    if ($indexresul == 0) {
                        $competencia = $datosResultadoAsignatura->competencia;
                        $totalDatosRes = count($datosResultadoAsignatura->datos);

                        // Corrected HTML with echo
                        echo "
                        <tr>
                            <td class='cell' colspan='2' rowspan='$totalDatosRes'>$competencia</td>
                            <td class='cell' colspan='6'>$datosresultados->resultados</td>
                            <td class='cell' colspan='6'>$datosresultados->evidencia</td>
                        </tr>";
                    } else {
                        // Else case: correctly output the result and evidence
                        echo "
                        <tr>
                            <td class='cell' colspan='6'>$datosresultados->resultados</td>
                            <td class='cell' colspan='6'>$datosresultados->evidencia</td>
                        </tr>";
                    }
                }
            }

            ?>
        </tbody>


        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    8. Contenidos de la asignatura
                </th>
            </tr>
        </tbody>
        <?php
        foreach ($_SESSION['datosPeaImprimir']['datos']->contenido_asignatura as $contenidoPrincipal) {
            echo "<tbody>
            <tr>
                <td class='cell tituloBody textcenter' colspan='14'>Contenido de la unidad 1: $contenidoPrincipal->nombre</td>
            </tr>
        </tbody>
        <tbody>

            <tr>
                <td class='cell textcenter backorange' colspan='1' rowspan='2' style='width: 5%;'>semana N</td>
                <td class='cell textcenter backorange' colspan='1' rowspan='2'>contenido</td>
                <td class='cell textcenter backorange' colspan='3'>Aprendizaje en contacto con el docente</td>
                <td class='cell textcenter backorange' colspan='3'>Aprendizaje experimental en contacto con el docente</td>
                <td class='cell textcenter backorange' colspan='6'>Aprendizaje Autónomo</td>
            </tr>
            <tr>
                <td class='cell' colspan='1' style='width: 5%;'>hora</td>
                <td class='cell' colspan='2'>Actividad1</td>
                <td class='cell' colspan='1' style='width: 5%;'>hora</td>
                <td class='cell' colspan='2'>Actividad</td>
                <td class='cell' colspan='1' style='width: 5%;'>hora</td>
                <td class='cell' colspan='2'>Actividad</td>
                <td class='cell' colspan='1' style='width: 5%;'>hora</td>
                <td class='cell' colspan='2'>Actividad</td>
            </tr>
        </tbody>
        <tbody>";
            foreach ($contenidoPrincipal->contenido_semana as $contenidoSemana) {
                $totalData = count($contenidoSemana->contenidodeSemana);
                if ($totalData == 0) {
                    echo "<tr>
                <td class='cell textcenter' colspan='1' rowspan='$totalData'>$contenidoSemana->semana</td>
                
                <td class='cell' colspan='1'></td>
                <td class='cell textcenter' colspan='1'></td>
                <td class='cell' colspan='2'></td>
                <td class='cell textcenter' colspan='1'></td>
                <td class='cell' colspan='2'></td>
                <td class='cell textcenter' colspan='1'></td>
                <td class='cell' colspan='2'></td>
                <td class='cell textcenter' colspan='1'></td>
                <td class='cell' colspan='2'></td>
            
                </tr>";
                } else {
                    echo "<tr>
                <td class='cell textcenter' colspan='1' rowspan='$totalData'>$contenidoSemana->semana</td>";
                }

                foreach ($contenidoSemana->contenidodeSemana as $indexpro => $contenidodeSemana) {

                    $contenidodeSemanaContactoDocenteHoras = $contenidodeSemana->aprendizaje_docente->horas;
                    $contenidodeSemanaContactoDocenteactividad = $contenidodeSemana->aprendizaje_docente->actividades;
                    $aprendizaje_experimental_docenteHoras = $contenidodeSemana->aprendizaje_experimental_docente->horas;
                    $aprendizaje_experimental_docenteActividad = $contenidodeSemana->aprendizaje_experimental_docente->actividades;
                    $actividades_experimentales_autonomoHoras = $contenidodeSemana->actividades_experimentales_autonomo->horas;
                    $actividades_experimentales_autonomoActividad = $contenidodeSemana->actividades_experimentales_autonomo->descripcion;
                    $actividadesautonomoHoras = $contenidodeSemana->actividades_autonomo->horas;
                    $actividadesautonomoActividad = $contenidodeSemana->actividades_autonomo->descripcion;
                    if ($indexpro == 0) {
                        echo "
                <td class='cell' colspan='1'>$contenidodeSemana->contenido</td>
                <td class='cell textcenter' colspan='1'>$contenidodeSemanaContactoDocenteHoras</td>
                <td class='cell' colspan='2'>$contenidodeSemanaContactoDocenteactividad</td>
                <td class='cell textcenter' colspan='1'>$aprendizaje_experimental_docenteHoras</td>
                <td class='cell' colspan='2'>$aprendizaje_experimental_docenteActividad</td>
                <td class='cell textcenter' colspan='1'>$actividades_experimentales_autonomoHoras</td>
                <td class='cell' colspan='2'>$actividades_experimentales_autonomoActividad</td>
                <td class='cell textcenter' colspan='1'>$actividadesautonomoHoras</td>
                <td class='cell' colspan='2'>$actividadesautonomoActividad</td>
            </tr>";
                    } else {
                        echo "
                    <tr>
                <td class='cell' colspan='1'>$contenidodeSemana->contenido</td>
                <td class='cell textcenter' colspan='1'>$contenidodeSemanaContactoDocenteHoras</td>
                <td class='cell' colspan='2'>$contenidodeSemanaContactoDocenteactividad</td>
                <td class='cell textcenter' colspan='1'>$aprendizaje_experimental_docenteHoras</td>
                <td class='cell' colspan='2'>$aprendizaje_experimental_docenteActividad</td>
                <td class='cell textcenter' colspan='1'>$actividades_experimentales_autonomoHoras</td>
                <td class='cell' colspan='2'>$actividades_experimentales_autonomoActividad</td>
                <td class='cell textcenter' colspan='1'>$actividadesautonomoHoras</td>
                <td class='cell' colspan='2'>$actividadesautonomoActividad</td>
            </tr>";
                    }
                }
            }
            echo "</tbody>";
        }
        ?>
        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    9. Metodologia de enseñanza
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" style="text-align: center;" colspan='14'>Estrategias metodológicas</td>
            </tr>
            <tr>
                <td class="cell tituloBody backorange textcenter" colspan='4'>Estrategia</td>
                <td class="cell tituloBody backorange textcenter" colspan='10'>Definicion / Finalidad</td>
            </tr>
        </tbody>
        <tbody>
            <?php
            foreach ($_SESSION['datosPeaImprimir']['datos']->metodologia_enseñanza as $metodologia_enseñanza) {
                echo "
                <tr>
                <td class='cell' colspan='4'>$metodologia_enseñanza->estrategia</td>
                <td class='cell' colspan='10'>$metodologia_enseñanza->definicion</td>
            </tr>
                ";
            }
            ?>


        </tbody>


        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    10. Bibliografia
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" style="text-align: center;" colspan='14'>Básica:</td>
            </tr>
        </tbody>
        <tbody>
            <?php
            foreach ($_SESSION['datosPeaImprimir']['datos']->bibliografia->basica as $basica) {
                echo "
                <tr>
                <td class='cell' colspan='14'>
                    $basica->descripcion
                </td>
            </tr>
                ";
            }
            ?>


        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" style="text-align: center;" colspan='14'>Complementaria:</td>
            </tr>
        </tbody>
        <tbody>
            <?php
            foreach ($_SESSION['datosPeaImprimir']['datos']->bibliografia->complementaria as $complementaria) {
                echo "
                <tr>
                <td class='cell' colspan='14'>
                    $complementaria->descripcion
                </td>
            </tr>
                ";
            }
            ?>
        </tbody>

        <tbody>
            <tr>
                <th class="backblue header" colspan='14'>
                    11. Elaborado, Revision y Aprobación
                </th>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td class="cell tituloBody" style="text-align: center;" colspan='4'>Elaborado por:</td>
                <td class="cell tituloBody" style="text-align: center;" colspan='5'>Revisado por:</td>
                <td class="cell tituloBody" style="text-align: center;" colspan='5'>Aprobado por:</td>
            </tr>
            <tr>
                <td class="cell tituloBody" style="text-align: center;" colspan='4'>Comisión designada</td>
                <td class="cell tituloBody" style="text-align: center;" colspan='5'>Coordinacion de Carrera</td>
                <td class="cell tituloBody" style="text-align: center;" colspan='5'>Junta de Carrera</td>
            </tr>
            <tr>
                <td class="cell" style="text-align: center; " colspan='4'>
                    <p><?php echo $_SESSION['datosPeaImprimir']['docente'] ?></p>
                    <div style="height: 60px;"></div>
                </td>
                <td class="cell" style="text-align: center;" colspan='5'>
                    <p><?php echo $_SESSION['datosPeaImprimir']['datos']->usuario_revisado ?></p>
                    <div style="height: 60px;"></div>
                </td>
                <td class="cell" style="text-align: center;" colspan='5'>
                    <p><?php echo $_SESSION['datosPeaImprimir']['datos']->usuario_aprovado ?></p>
                    
                    <div style="height: 60px;"></div>
                </td>
            </tr>
        </tbody>
        <tr>
            <td class="cell" style="text-align: center;" colspan='4'>Fecha de elaboracion: <?php echo $fechaHoy?></td>
            <td class="cell " style="text-align: center;" colspan='5'>Fecha: <?php echo $fechaHoy?></td>
            <td class="cell " style="text-align: center;" colspan='5'>Fecha de aprobacion: <?php echo $fechaHoy?></td>
        </tr>
    </table>

</body>

</html>


<?php
$html = ob_get_clean();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$option = $dompdf->getOptions();
$option->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($option);
$dompdf->loadHtml($html);
//$dompdf->setPaper('A4', 'landscape');
$dompdf->setPaper('latter');
$dompdf->render();
$PDFnAME=$_SESSION['datosPeaImprimir']['datos']->descripcion;
$dompdf->stream("Pea_$PDFnAME.pdf", array("Attachment" => true));
?>