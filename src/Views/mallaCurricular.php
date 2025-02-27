<?php
require_once '../src/Views/components/navbar.php';
?>
<style>
    .materiaStyleSelect {
        color: black;
        text-decoration: underline !important;
    }

    .materiaStyleSelect:hover {
        background-color: white !important;
        color: #152533d0 !important;

    }
</style>
<div class="d-flex position-relative">
    <span class="position-absolute">
        <?php require_once '../src/Views/components/sidebar.php'; ?>
    </span>

    <div class="espacioContenido">
        <?php require_once '../src/Views/components/header.php'; ?>
        <div class="d-flex  justify-content-center my-3 align-items-center">
            <h2 class="mb-0">Descripcion de la <span class="colorPrincipal">Carrera</span></h2>
            <p class="colorTexto descripcionPages ms-5 mb-0"><?php echo $data['DescripcionCarrera'] ?></p>
        </div>
        <div class="my-5 d-flex justify-content-around">
            <h3 class="colorPrincipal text-center ">MALLA ACADEMICA</h3>
            <div class="d-flex align-items-center">
                <form id="ciclo" method="post">
                    <select class="form-select" name="ciclo" onchange="actualizarPagina()" style="cursor: pointer; min-width: 190px;">
                        <!--  -->
                        <?php
                        if (count($data['coleccion']) > 0) {
                            foreach ($data['coleccion'] as $opcion) {
                                $opcionSelected = $opcion['periodo'];
                                $selected = "";
                                if ($selectedValue == $opcionSelected) {
                                    $selected = 'selected';
                                }
                                echo "<option value='$opcionSelected' " . $selected . ">$opcionSelected</option>";
                            }
                        } else {
                            echo "<option value=''>Sin periodos</option>";
                        }

                        ?>
                    </select>
                </form>
                <button type="button" onclick="editarMalla()" data-bs-toggle="modal" data-bs-target="#EditMallaFormModal" class="btn btn-warning ms-2 text-dark <?php echo (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 0  || isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 2) ? '' : 'd-none'; ?>">Editar malla</button>

            </div>
        </div>
        <script>
            const coleccionMaterias = <?php
                                        echo json_encode($data['materiasSelected'])
                                        ?>;

            function editarMalla() {


                let dataenvioedit = {
                    dataEdit: <?php echo json_encode($data['coleccion']) ?>,
                    selectedEdit: "<?php echo $selectedValue ?>",
                    MateriasEdit: coleccionMaterias
                }
                console.log(dataenvioedit)
                if (Array.isArray(dataenvioedit['dataEdit'])) {
                    dataenvioedit['dataEdit'].forEach(e => {
                        if (e['periodo'] == dataenvioedit['selectedEdit']) {
                            dataenvioedit['dataEdit'] = e

                            localStorage.setItem('editMalla', JSON.stringify(dataenvioedit))
                        }
                    });
                } else {
                    console.log("coleccion no es un arreglo");
                }

                initEdit()
            }
        </script>


        <div class="d-flex flex-wrap justify-content-center mb-3">
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
                                    'usuarioDocente' => $materia['usuarioDocente']
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

                                    foreach ($data['docentes'] as $docenteProDocente) {

                                        if ($materiasPorSemestre[$j][$i]['usuarioDocente'] == (string) $docenteProDocente->_id) {

                                            $docenteMateriaEnvio = $docenteProDocente->nombres;
                                        }
                                    }

                                    echo "<td class='colorTexto' style='width: calc(100% / " . $maxSemestre . ");'><a class='materiaStyleSelect' href='index.php?action=" . $_GET['action'] . "&materia=" . $materiasPorSemestre[$j][$i]['oid'] . "&periodo=" . $selectedValue . "&docente=" . $docenteMateriaEnvio . "'>" . $materiasPorSemestre[$j][$i]['materia'] . "</a></td>";
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
        </div>
    </div>
</div>


<script>
    function actualizarPagina() {
        document.getElementById("ciclo").submit();
    }
</script>