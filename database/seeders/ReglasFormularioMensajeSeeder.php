<?php

namespace Database\Seeders;

use App\Models\ReglasFormularioMensaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ReglasFormularioMensajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** MÓDULO 1: IDENTIFICACIÓN DEL INFORMANTE */
        ReglasFormularioMensaje::create(['id_regla' => '1', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°1 obligatoria: Campo Nombre no puede ser vacio']);
        ReglasFormularioMensaje::create(['id_regla' => '1', 'configuracion_mensaje'=>'max','mensaje'=>'Pregunta N°1 excede caracteres: Campo Nombre no puede exceder los 1000 caracteres']);
        ReglasFormularioMensaje::create(['id_regla' => '2', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°2 obligatoria: Debe indicar un cargo.']);
        ReglasFormularioMensaje::create(['id_regla' => '2', 'configuracion_mensaje'=>'max','mensaje'=>'Pregunta N°2: excede caracteres, Campo cargo no puede exceder los 1000 caracteres.']);
        ReglasFormularioMensaje::create(['id_regla' => '3', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°3 obligatoria: Debe indicar un Correo Eléctronico']);
        ReglasFormularioMensaje::create(['id_regla' => '3', 'configuracion_mensaje'=>'max','mensaje'=>'Pregunta N°3 excede caracteres: Campo email no puede exceder los 1000 caracteres']);
        ReglasFormularioMensaje::create(['id_regla' => '3', 'configuracion_mensaje'=>'email','mensaje'=>'Pregunta N°3: Correo electrónico no cumple con el formato']);
        ReglasFormularioMensaje::create(['id_regla' => '4', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°4 obligatoria: Debe indicar un Teléfono de contacto']);
        
        /** MÓDULO 2: SELECCIÓN PREFERENTE */
        ReglasFormularioMensaje::create(['id_regla' => '5', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°5 obligatoria: Si no se han realizado procesos de selección y/o concursos indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '5', 'configuracion_mensaje'=>'min','mensaje'=>'Pregunta N°5 valor mínimo 0: Si no se han realizado procesos de selección y/o concursos indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '6', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°6 obligatoria: Si no hubo postulantes en procesos de selección y/o concursos indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '6', 'configuracion_mensaje'=>'min','mensaje'=>'Pregunta N°6 valor mínimo 0: Si no hubo postulantes en procesos de selección y/o concursos indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '7', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°7 obligatoria: Si no se hubo postulantes con discapacidad y/o asignatarios de pensión de invalidez en procesos de selección y/o concursos indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '7', 'configuracion_mensaje'=>'min','mensaje'=>'Pregunta N°7 valor mínimo 0: Si no se hubo postulantes con discapacidad y/o asignatarios de pensión de invalidez en procesos de selección y/o concursos indicar 0']);        
        ReglasFormularioMensaje::create(['id_regla' => '7', 'configuracion_mensaje'=>'lte','mensaje'=>'Pregunta N°7: Se ha detectado una inconsistencia con el dato reportado en pregunta 6. El número  de postulantes con discapacidad y/o asignatarios de pensión de invalidez debe ser menor o igual al número total de postulantes a los procesos de selección']);
        ReglasFormularioMensaje::create(['id_regla' => '8', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°8 obligatoria: Si no hubo postulantes con discapacidad y/o asignatarios de pensión de invalidez en una nómina final indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '8', 'configuracion_mensaje'=>'min','mensaje'=>'Pregunta N°8 valor mínimo 0: Si no hubo postulantes con discapacidad y/o asignatarios de pensión de invalidez en una nómina final indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '8', 'configuracion_mensaje'=>'lte','mensaje'=>'Pregunta N°8: Se ha detectado una inconsistencia con el dato reportado en pregunta 7: el total de postulantes con discapacidad que fueron parte de una nómina debe ser igual o menor al total de postulantes con discapacidad']);
        ReglasFormularioMensaje::create(['id_regla' => '9', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°9 obligatoria: Si no hubo postulantes con discapacidad y/o asignatarios de pensión de invalidez en una nómina final indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '9', 'configuracion_mensaje'=>'min','mensaje'=>'Pregunta N°9 valor mínimo 0: Si no hubo postulantes con discapacidad y/o asignatarios de pensión de invalidez en una nómina final indicar 0']);
        ReglasFormularioMensaje::create(['id_regla' => '9', 'configuracion_mensaje'=>'lte','mensaje'=>'Pregunta N°9: Se ha detectado una inconsistencia con el dato reportado en pregunta 8: el número de personas con discapacidad y/o asignatarias de pensión de invalidez seleccionadas debe ser igual o menor que el número de personas en nómina final']);
        ReglasFormularioMensaje::create(['id_regla' => '10', 'configuracion_mensaje'=>'max','mensaje'=>'Pregunta N°11 excede caracteres: Campo no puede exceder los 350 caracteres']);

        /** MÓDULO 3 - MEDIDAS DE ACCESIBILIDAD EN PROCESOS DE SELECCIÓN */
        ReglasFormularioMensaje::create(['id_regla' => '11', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°12 obligatoria: Debe seleccionar una respuesta']);
        ReglasFormularioMensaje::create(['id_regla' => '12', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°13 obligatoria: Debe seleccionar una respuesta']);
        ReglasFormularioMensaje::create(['id_regla' => '13', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°14 obligatoria: Debe seleccionar una respuesta']);

        /** MÓDULO 4 - MANTENCIÓN Y CONTRATACIÓN DE PERSONAS CON DISCAPACIDAD O ASIGNATARIAS DE PENSIÓN DE INVALIDEZ */
        ReglasFormularioMensaje::create(['id_regla' => '14', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°15 obligatoria: Debe seleccionar una respuesta']);
        ReglasFormularioMensaje::create(['id_regla' => '15', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°16 obligatoria: Debe seleccionar una respuesta']);
        ReglasFormularioMensaje::create(['id_regla' => '16', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°17 obligatoria: Debe seleccionar una respuesta']);
        ReglasFormularioMensaje::create(['id_regla' => '16', 'configuracion_mensaje'=>'max','mensaje'=>'Pregunta N°18 excede caracteres: Campo no puede exceder los 350 caracteres']);

        /** MÓDULO 5 - MANTENCIÓN Y CONTRATACIÓN DE PERSONAS CON DISCAPACIDAD O ASIGNATARIAS DE PENSIÓN DE INVALIDEZ */
        ReglasFormularioMensaje::create(['id_regla' => '17', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°19 obligatoria: Debe seleccionar una respuesta']);
        ReglasFormularioMensaje::create(['id_regla' => '18', 'configuracion_mensaje'=>'required','mensaje'=>'Pregunta N°20 obligatoria: Debe seleccionar una respuesta']);
        
    }
}
