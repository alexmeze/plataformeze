<?php
/**
 * Created by PhpStorm.
 * User: Yozki
 * Date: 28/07/2015
 * Time: 07:28 PM
 */

require_once("PersonaModelo.php");

class AlumnoModelo extends PersonaModelo
{
    public static function getAlumnoPorCredenciales($matricula, $password)
    {
        $query = "SELECT * FROM persona WHERE matricula = '$matricula' AND password = '$password' AND tipo_persona = 1 LIMIT 1";
        $res = APIDatabase::select($query);
        $usuario = new PersonaModelo($res[0]['id_persona']);
        return $usuario;
    }

    public function getBecaActual()
    {
        $ciclo_actual = CicloEscolar::getActual();
        $query = "SELECT beca.*, CONCAT(tipo_beca, '-', subtipo_beca) AS tipo FROM beca
            JOIN beca_subtipo ON beca_subtipo.id_subtipo_beca = beca.id_subtipo
            JOIN beca_tipo ON beca_tipo.id_tipo_beca = beca_subtipo.id_tipo_beca
            WHERE id_alumno = $this->id_persona AND id_ciclo_escolar = $ciclo_actual->id_ciclo_escolar";
            $res = Database::select($query);
        return $res[0];
    }

    public function getTareas()
    {
        $query = "SELECT id_tarea, clase.id_clase, descripcion, fecha_encargo, IF(fecha_entrega = 0, 'N/A', fecha_entrega), materia,
            materia.materia, IF(fecha_entrega > fecha_encargo, true, false) AS completada FROM tarea
            JOIN clase ON clase.id_clase = tarea.id_clase
            JOIN materia ON materia.id_materia = clase.id_materia
            WHERE tarea.id_clase IN (SELECT clase.id_clase FROM alumno_grupo
            JOIN clase ON clase.id_grupo = alumno_grupo.id_grupo
            JOIN materia ON clase.id_materia = materia.id_materia
            WHERE id_alumno = $this->id_persona)";
        return APIDatabase::select($query);
    }

    public function getTareasPendientes()
    {
        $query = "SELECT id_tarea, clase.id_clase, descripcion, fecha_encargo, IF(fecha_entrega = 0, 'N/A', fecha_entrega) AS fecha_entrega, materia,
            materia.materia, IF(fecha_entrega > fecha_encargo, true, false) AS completada FROM tarea
            JOIN clase ON clase.id_clase = tarea.id_clase
            JOIN materia ON materia.id_materia = clase.id_materia
            WHERE tarea.id_clase IN (SELECT clase.id_clase FROM alumno_grupo
            JOIN clase ON clase.id_grupo = alumno_grupo.id_grupo
            JOIN materia ON clase.id_materia = materia.id_materia
            WHERE id_alumno = $this->id_persona AND fecha_entrega >= CURDATE()) ";
        return APIDatabase::select($query);
    }

    public function getTareasFecha($fecha)
    {
        $query = "SELECT id_tarea, clase.id_clase, descripcion, fecha_encargo, IF(fecha_entrega = 0, 'N/A', fecha_entrega) AS fecha_entrega, materia,
            materia.materia, IF(fecha_entrega > fecha_encargo, true, false) AS completada FROM tarea
            JOIN clase ON clase.id_clase = tarea.id_clase
            JOIN materia ON materia.id_materia = clase.id_materia
            WHERE tarea.id_clase IN (SELECT clase.id_clase FROM alumno_grupo
            JOIN clase ON clase.id_grupo = alumno_grupo.id_grupo
            JOIN materia ON clase.id_materia = materia.id_materia
            WHERE id_alumno = $this->id_persona AND fecha_entrega = '$fecha') ";
        return APIDatabase::select($query);
    }

    public function getClases()
    {
        $query = "SELECT clase.*, CONCAT(grado.grado, '-', grupo.grupo, ' ', materia.materia) AS descripcion FROM clase
            JOIN grupo ON clase.id_grupo = grupo.id_grupo
            JOIN grado ON grupo.id_grado = grado.id_grado
            JOIN materia ON clase.id_materia = materia.id_materia
            WHERE clase.id_clase IN (SELECT clase.id_clase FROM alumno_grupo
            JOIN clase ON clase.id_grupo = alumno_grupo.id_grupo
            WHERE id_alumno = $this->id_persona)";
        return APIDatabase::select($query);
    }

    public function getLista()
    {
        $query = "SELECT * FROM persona WHERE tipo_persona = 1";
        return APIDatabase::select($query);
    }
}