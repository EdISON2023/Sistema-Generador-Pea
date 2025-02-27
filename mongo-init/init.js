db = db.getSiblingDB('peaYavirac');

// Crear la colección de usuarios
db.createCollection('usuarios');
const usuarios = db.usuarios.insertMany([
    {
        nombres: "Juan López",
        cedula: "1111111111",
        contraseña: "111",
        correo_institucional: "juan.lopez@institucion.edu",
        image_url: "pea_67b3d2cb20dcb.png",
        fecha_nacimiento: "2000-05-15",
        role: 0,
        delete_at: false
    },
    {
        nombres: "Maria Rodriguez",
        cedula: "3456789012",
        contraseña: "miContraseña456",
        correo_institucional: "maria.rodriguez@institucion.edu",
        image_url: "pea_67b3d2cb20dcb.png",
        fecha_nacimiento: "1999-10-19",
        role: 1,
        delete_at: false
    }
]);

// Crear la colección de materia
db.createCollection('materia');
const usuarioId = usuarios.insertedIds[0].toString();
const materia = db.materia.insertOne({
    documento_Validacion: "Pea_prueba_ejemplo.pdf",
    codigo_asignatura: "MAT101",
    usuario: usuarioId, // Juan López
    semestre: 1,
    Distribucion_Horas: {
        A_contacto_docente: 32,
        A_experimental_decente: 8,
        A_experimental_autonomo: 16,
        A_autonomo: 32
    },
    prerequisitos: [
        {
            codigo: 'hola',
            asignatura: 'chao'
        }
    ],
    correquisitos: [{
        codigo: 'ma',
        asignatura: 'pa'
    }],
    descripcion: "Matemáticas básicas",
    descripcion_materia:"descripcion_materia",
    usuario_revisado:'Hernan MeJia',
    usuario_aprovado:'Junta de la carrera',
    objetivo: "Iniciar el proceso de aprendizaje matemático",
    resultado: "Comprensión de los conceptos básicos",
    formacion_habilidades_blandas: [
        {
            habilidad_blanda: "Trabajo en equipo",
            descripcion: "Desarrollar habilidades para trabajar en grupo."
        }
    ],
    resultados_aprendizaje: [
        {
            competencia: "Resolución de problemas",
            datos: [
                {
                    resultados: "Utilizar métodos matemáticos.",
                    evidencia: "Exámenes y trabajos prácticos"
                }
            ]
        }
    ],
    creditos_materia: 16,
    contenido_asignatura: [
        {
            nombre: "Introducción a las matemáticas",
            contenido_semana: [
                {
                    semana:1,
                    contenidodeSemana: [
                        {
                            contenido: "Números enteros",
                            aprendizaje_docente: { horas: "2", actividades: "Clase magistral" },
                            aprendizaje_experimental_docente: { horas: "2", actividades: "Ejercicios prácticos" },
                            actividades_experimentales_autonomo: { horas: "1", descripcion: "Lectura de material" },
                            actividades_autonomo: { horas: "1", descripcion: "Resolución de ejercicios" }
                        },
                        {
                            contenido: "Ngggg",
                            aprendizaje_docente: { horas: "2", actividades: "Clase mfgfgfgfgstral" },
                            aprendizaje_experimental_docente: { horas: "2", actividades: "Ejerciciofgfgfgs prácticos" },
                            actividades_experimentales_autonomo: { horas: "1", descripcion: "Lecfgfgfgde material" },
                            actividades_autonomo: { horas: "1", descripcion: "Resolución de ejercicios" }
                        },
                        {
                            contenido: "Núrtrtrs",
                            aprendizaje_docente: { horas: "2", actividades: "Clase magmamamaistral" },
                            aprendizaje_experimental_docente: { horas: "2", actividades: "Ejercicios papapaprácticos" },
                            actividades_experimentales_autonomo: { horas: "1", descripcion: "Lectura dehermanana material" },
                            actividades_autonomo: { horas: "1", descripcion: "Resolución dedfdf ejercicios" }
                        }

                    ]
                },
                {
                    semana:2,
                    contenidodeSemana: [
                        {
                            contenido: "N22222",
                            aprendizaje_docente: { horas: "2", actividades: "Clase magistral" },
                            aprendizaje_experimental_docente: { horas: "2", actividades: "Ejercicios prácticos" },
                            actividades_experimentales_autonomo: { horas: "1", descripcion: "Lectura de material" },
                            actividades_autonomo: { horas: "1", descripcion: "Resolución de ejercicios" }
                        },
                        {
                            contenido: "Nggg22222g",
                            aprendizaje_docente: { horas: "2", actividades: "Clase mfgfgfgfgstral" },
                            aprendizaje_experimental_docente: { horas: "2", actividades: "Ejerciciofgfgfgs prácticos" },
                            actividades_experimentales_autonomo: { horas: "1", descripcion: "Lecfgfgfgde material" },
                            actividades_autonomo: { horas: "1", descripcion: "Resolución de ejercicios" }
                        },
                        {
                            contenido: "Núr22222trtrs",
                            aprendizaje_docente: { horas: "2", actividades: "Clase magmamamaistral" },
                            aprendizaje_experimental_docente: { horas: "2", actividades: "Ejercicios papapaprácticos" },
                            actividades_experimentales_autonomo: { horas: "1", descripcion: "Lectura dehermanana material" },
                            actividades_autonomo: { horas: "1", descripcion: "Resolución dedfdf ejercicios" }
                        }

                    ]
                }
            ]
        }
    ],
    metodologia_enseñanza: [
        {
            estrategia: "Aprendizaje basado en problemas",
            definicion: "Enseñanza centrada en la resolución de problemas."
        }
    ],
    bibliografia: {
        basica: [{ descripcion: "Matemáticas para Dummies" }],
        complementaria: [{ descripcion: "Geometría para la vida cotidiana" }]
    }
});

// Crear la colección de malla curricular
db.createCollection('malla_curricular');
const malla = db['malla_curricular'].insertMany([
    {
        periodo: "2022-3",
        carrera: 1,
        semestres: 2,
        materias: [materia.insertedId], // Referencia a la materia recién insertada
        delete_at: true
    },
    {
        periodo: "2023-2",
        carrera: 1,
        semestres: 2,
        materias: [], // Referencia a la materia recién insertada
        delete_at: true
    },
    {
        periodo: "2012-1",
        carrera: 1,
        semestres: 2,
        materias: [], // Referencia a la materia recién insertada
        delete_at: true
    }
]);