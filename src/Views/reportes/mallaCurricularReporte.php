<?php
ob_start();
$carreras=[
    1 =>'Desarrollo de Software',
    2 =>'Arte Culinaria',
    3 =>'Diseño de Modas',
    4 =>'Guia Nacional De Turismo',
    5 =>'Marketing Digital'
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./resources/images/global/logo-yavirac.png" type="image/x-icon">
    <link rel="stylesheet" href="./resources/boostrap/css/bootstrap.min.css">
</head>
<style>
    .table {
        border-collapse: collapse;
        margin: 20px auto;
        width: 90%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table thead {
        background-color: #FF6F61;
        /* Color de fondo tomate */
        color: white;
        /* Color del texto del encabezado */
    }

    .table th,
    .table td {
        padding: 12px;
        /* Espaciado interno */
        text-align: center;
        /* Centrar texto */
        border-bottom: 1px solid #dddddd;
        /* Línea de separación entre filas */
    }

    .table tbody tr:hover {
        background-color: #FFB6C1;
        /* Color de fondo pastel al pasar el mouse */
    }

    .table tbody tr:nth-child(even) {
        background-color: #ADD8E6;
        /* Color de fondo azul pastel para filas pares */
    }

    .materiaStyleSelect {
        color: #1E90FF;
        /* Color azul para los enlaces de las materias */
        text-decoration: none;
        /* Sin subrayado */
        font-weight: bold;
        /* Negrita */
    }

    .materiaStyleSelect:hover {
        text-decoration: underline;
        /* Subrayado al pasar el mouse */
    }

    .colorSecundario {
        background-color: #FF6F61;
        /* Color secundario para las celdas del encabezado (tomate) */
    }

    .colorTexto {
        color: #333;
        /* Color del texto de la tabla */
    }
</style>

<body>

    <h1 style="text-align: center; margin-bottom: 50px;">Carrera <span style="color: #1E90FF;"><?php echo $carreras[(int)$_GET['action']]; ?></span> periodo <span style="color: #FF6F61;"><?php echo $_GET['mayaYear']; ?></span></h1>

    <table class="table text-center" style="width: 90%;">
        <thead>
            <tr>
                <?php
                if (count($data['coleccion']) > 0) {
                    for ($i = 0; $i < $maxSemestre; $i++) {
                        echo "<th scope='col' class='colorSecundario'>" . $semestres[$i] . "</th>";
                    }
                } else {
                    echo "<th scope='col' class='colorSecundario'>Sin semestres</th>";
                }

                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($data['coleccion']) > 0) {
                $materiasPorSemestre = array_fill(0, $maxSemestre, []);

                foreach ($materias as $materia) {

                    if ($materia['semestre'] <= $maxSemestre) {
                        $materiasPorSemestre[$materia['semestre'] - 1][] = [
                            'materia' => $materia['materia'],
                            'oid' => $materia['oid'],
                        ];
                    }
                }
                $maxMaterias = 0;
                foreach ($materiasPorSemestre as $materias) {
                    $maxMaterias = max($maxMaterias, count($materias));
                }
                for ($i = 0; $i < $maxMaterias; $i++) {
                    echo "<tr>";

                    for ($j = 0; $j < $maxSemestre; $j++) {
                        if (isset($materiasPorSemestre[$j][$i])) {
                            echo "<td class='colorTexto' style='width: calc(100% / " . $maxSemestre . ");'>" . $materiasPorSemestre[$j][$i]['materia'] . "</td>";
                        } else {
                            echo "<td style='width: calc(100% / " . $maxSemestre . ");'>-</td>";
                        }
                    }

                    echo "</tr>";
                }
            } else {
                echo "<tr>
                                    <td class='colorTexto'>sin materias</td>
                            </tr>";
            }
            ?>

        </tbody>
    </table>
</body>



<?php
$html = ob_get_clean();

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$option = $dompdf->getOptions();
$option->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($option);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
//$dompdf->setPaper('letter');
$dompdf->render();
$pereodo=$_GET['mayaYear'];
$materiaMaya=$carreras[(int)$_GET['action']];
$dompdf->stream("$materiaMaya _malla_Curricular_$pereodo.pdf");
?>