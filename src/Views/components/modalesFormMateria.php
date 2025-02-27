<div class="modal fade" id="Prerrequisitros" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Prerrequisitros</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="Pre_codigo" placeholder="Password">
                    <label for="Pre_codigo">Codigo</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="Pre_asignatura" placeholder="Password">
                    <label for="Pre_asignatura">Asignatura</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="PreRequisitosAdd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Correquisitros" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Correquisitros</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="Co_codigo" placeholder="Password">
                    <label for="Co_codigo">Codigo</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="Co_asignatura" placeholder="Password">
                    <label for="Co_asignatura">Asignatura</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="CoRequisitosAdd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>






<div class="modal fade" id="FormacionHabilidadesBlandas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Formacion de Habilidades Blandas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="HabilidadBlanda" placeholder="Password">
                    <label for="HabilidadBlanda">Habilidad blanda</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="DescripcionHabilidadBlanda" placeholder="Password">
                    <label for="DescripcionHabilidadBlanda">Descripcion</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="HabilidadBlandaadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="MetodologiaDeEnseñanza" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Metodologia De Enseñanza</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="MetodologiaDeEnseñanzaestrategia" placeholder="Password">
                    <label for="MetodologiaDeEnseñanzaestrategia">Estrategia</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="MetodologiaDeEnseñanzaDefinicion" placeholder="Password">
                    <label for="MetodologiaDeEnseñanzaDefinicion">Definicion</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="MetodologiaEnseñanzaadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Bibliografia" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Bibliografia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <select class="form-select" id="tipoBibliografia" aria-label="Floating label select example">

                        <option value="1">Basica</option>
                        <option value="2">Complementaria</option>
                    </select>
                    <label for="tipoBibliografia">Tipo</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control" id="tipoDescripcion" placeholder="Password">
                    <label for="tipoDescripcion">Descripción</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="Bibliografiaadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ResultadoAprendizaje" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Bibliografia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <input type="text" class="form-control" id="CompetenciaResultadoAprendizaje" placeholder="Password">
                    <label for="CompetenciaResultadoAprendizaje">Competencia</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="ResultadosAprendizajeadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ResultadoAprendizajePlus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detalles de Resultado de Aprendizajes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="resultadoaprendizajeResultadoAprendizaje" placeholder="Password">
                    <label for="resultadoaprendizajeResultadoAprendizaje">resultado de aprendizaje</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="evidenciaresultadoaprendizajeResultadoAprendizaje" placeholder="Password">
                    <label for="evidenciaresultadoaprendizajeResultadoAprendizaje">Evidencia de resultado de aprendizaje</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="addResultadosAprendizajeContenidoadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ContenidoAsignaturaSemanas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Contenido de la Unidad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="ContenidoAsignaturaSemanasContenido" placeholder="Password">
                    <label for="ContenidoAsignaturaSemanasContenido">contenido de la semana</label>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" id="ContenidoAsignaturaSemanasSemanas" placeholder="Password">
                    <label for="ContenidoAsignaturaSemanasSemanas">Semanas</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="ContenidoAsignaturaSemanasadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ContenidoAsignaturaSemanasplus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Semanas del Contenido de Aprendizaje</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="contenidoContenido" placeholder="Password">
                    <label for="contenidoContenido">Contenidos</label>
                </div>
                <p class="mb-1">*Aprendizaje en contacto con el docente</p>
                <div class="d-flex justify-content-between">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="Contenidodocentehoras" placeholder="Password">
                        <label for="Contenidodocentehoras">Horas</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="Contenidodocenteactividad" placeholder="Password">
                        <label for="Contenidodocenteactividad">Actividad</label>
                    </div>
                </div>
                <p class="mb-1 mt-2">*Aprendizaje experimental en contacto con el docente</p>
                <div class="d-flex justify-content-between">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="ContenidoexperimentaldocenteHoras" placeholder="Password">
                        <label for="ContenidoexperimentaldocenteHoras">Horas</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="ContenidoexperimentaldocenteActividad" placeholder="Password">
                        <label for="ContenidoexperimentaldocenteActividad">Actividad</label>
                    </div>
                </div>
                <p class="mb-1 mt-2">*Aprendizaje autónomo</p>
                <div class="d-flex justify-content-between">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="ContenidoExperimentalHoras" placeholder="Password">
                        <label for="ContenidoExperimentalHoras">Horas</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="ContenidoExperimentalActividad" placeholder="Password">
                        <label for="ContenidoExperimentalActividad">Actividades experimental</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="ContenidoAutonomoHoras" placeholder="Password">
                        <label for="ContenidoAutonomoHoras">Horas</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="ContenidoAutonomoActividad" placeholder="Password">
                        <label for="ContenidoAutonomoActividad">Actividades autonomas</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-light" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="addContenidoAsignaturaSemanasadd()" data-bs-dismiss="modal" class="btn btn-primary text-light">Guardar</button>
            </div>
        </div>
    </div>
</div>



<script src="./js/preYcorrequisitos.js"></script>
<script src="./js/habilidadesBlandas.js"></script>
<script src="./js/metodologiaEnsenanza.js"></script>
<script src="./js/bibliografia.js"></script>
<script src="./js/resultadosAprendizaje.js"></script>
<script src="./js/contenidoAsignatura.js"></script>