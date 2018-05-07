<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used
	| by the validator class. Some of the rules contain multiple versions,
	| such as the size (max, min, between) rules. These versions are used
	| for different input types such as strings and files.
	|
	| These language lines may be easily changed to provide custom error
	| messages in your application. Error messages for custom validation
	| rules may also be added to this file.
	|
	*/

	
        'Alumno' => array(
          'show' => "Dades de l'alumne",
          'edit' => "Modificació del perfil de l'Alumne", 
        ),
	'Comision' => array(
		'create'=>'Sol.licitud autorizació comisió Servei',
                'index'=>'Gestionar comisions Servei',
                'edit'=> 'Modificació comisió de servei',
                'alta'=> 'Alta Comisió de Servei',
                'autorizar' => 'Autoritzar comisions pendents',
                'pdf' => 'Imprimir Comisions autoritzades',
                'delete' => 'Esborrar Comisió',
                'notification' => 'Avisar equip educatiu',
                'email' => 'Enviar para autortizar',
                'show' => 'Mostra Comisió id.',
                '3' => 'Registrada',
                '4' => 'Pendent Cobrament',
                '2' => 'Autoritzada',
                '1' => 'Enviada',
                '-1' => 'Anul.lada',
                '5' => 'Cobrada',
                '0' => 'No autoritzada/comunicada',
                'unpaid' => 'Cobrar',
                'paid' => 'Imprimir pagaments'
	     ),
        'Falta' => array(
		'create'=>'Comunicació de Ausència Profesorat',
                'index'=>'Gestionar Baixes',
                'edit'=> 'Modificació Ausència',
                'alta' => 'Alta Ausència',
                'resolve'=> 'Autoritzar Baixes',
                'pdf' => 'Imprimir Baixes pendents',
                'notification' => 'Avisar Equip',
                'email' => 'Comunicar a direcció',
                'show' => 'Vore Ausència id.',
                '3' => 'Autoritzada',
                '4' => 'Resolta',
                '2' => 'Justificada',
                '1' => 'Sense justificant',
                '5' => 'Llarga Durada',
                '0' => 'No enviada/autoritzada'
                
             ),
        'Profesor' => array(
                'edit' => 'Modificar Perfil Professor',
                'show' => 'Dades Professor',
                'index' => 'Listat Professors',
                'list' => 'Professors Absents',
                'horario-cambiar' => 'Canviar horari Professor',
                
        ),
        'Menu' => array(
                'index' => 'Elements del menú',
                'create' => 'Crear entrada',
                'edit' => 'Editar element del menú'
        ),
        'Alumno_grupo' => array(
            'index' => 'Gestionar Grup :quien',
            'carnet' => 'Imprimeix Carnets de Grup',
            'profile' => 'Plantilla Alumnes',
            'show' => 'Llista Alumnes',
            'edit' => 'Editar Perfil Alumne'
        ),
        'Inventario' => array(
            'espacios' => 'Vore Espais',
            'materiales' => 'Vore Materials'
        ),
        'Alumno_curso' => array(
            'index' => 'Alumnes Curs',
        ),
        'Actividad' => array(
            'index' => 'Gestionar Activitats extraescolars',
            'create' => 'Alta actividad',
            'autorizacion' => 'Imprimir Autorizatció menors',
            'edit' => 'Modificar Activitat extraescolar',
            'detalle' => 'Detall activitat',
            'titulo' => 'Detall activitat :actividad',
            'profesores' => 'Professors participants',
            'grupos' => 'Grups participants',
            'email' => 'Enviar per autoritzar',
            'pdf' => 'Imprimir Activitats Autoritzades',
            'delete' => 'Esborrar Activitat',
            'autorizar' => 'Autoritzar totes activitats',
            'notification' => 'Avisar professorat',
            '2' => 'Autoritzada',
            '3' => 'Impressa',
            '1' => 'Pendent',
            '0' => 'Rebutjada/No comunicada'
        ),
        'Incidencia' => array(
            'index' => 'Gestionar Incidències',
            'create' => 'Crear Incidència',
            'email' => 'Passar a processament',
            'authorize' => 'Tractar Incidència',
            'unauthorize' => 'Abandonar Incidència',
            'resolve' => 'Resoldre Incidència',
            'edit' => 'Modificar Incidència',
            'notification' => 'Avisa Responsable',
            '3' => 'Resolta',
            '2' => 'En procés',
            '1' => 'Assignada',
            '0' => 'No comunicada'
        ),
        'Material' => array(
            'index' => 'Gestionar Materials',
            'create' => 'Crear Material',
            'delete' => 'Esborrar Material',
            'edit' => 'Editar Material',
            'list' => 'Llistat Inventari'
        ),
        'Espacio' => array(
            'index' => 'Gestionar Espais',
            'create' => 'Crear Espai',
            'delete' => 'Esborrar Espai',
            'edit' => 'Editar Espai',
            'detalle' => 'Vore Materials'
        ),
    
        'Grupo' => array(
            'index' => 'Grups',
            'detalle' => 'Vore alumnes',
            'edit' => 'Editar Grup',
            'pdf' => 'Imprimir Full de fotos',
            'asigna' => 'Asigna cicle Automàticament'
        ),
        'Curso' => array(
            'create' => 'Nou Curs/Ponència',
            'index' => 'Gestionar Cursos/Ponències',
            'edit' => 'Modifica Curso/Ponència',
        ),
        'Notification' => array(
            'index' => 'Notificacions',
            'read' => 'Marca com a llegida',
            'show' => 'Detalls Notificació',
        ),
        'Programacion' => array(
            'item0' => 'Propostes de millora',
            'item1' => 'Secuenciació',
            'item2' => 'Continguts',
            'item3' => 'Metodologia',
            'item4' => 'Avaluació.Criteris de qualificació',
            'item5' => 'Programa de recuperació',
            'item6' => 'Recursos',
            'index' => 'Manteniment Programacions',
            'create' => 'Nova Programació',
            'checklist' => "Confirmar Requeriments",
            'save' => 'Guardar requeriments',
            'edit' => 'Editar programació',
            'resolve' => 'Aprovar',
            'email' => 'Enviar per revisar',
            'show' => 'Mostrar Programació id.',
            'seguimiento' => 'Omplir seguiment de la programació',
            '2' => 'Comprobada i compleix els requeriments.',
            '3' => 'Aprobada pel departament',
            '1' => 'Pendent de revisar',
            '0' => 'Rebutjada. Li manquen els següents requeriments: '
        ),
        'Guardia' =>  array(
            'edit' => 'Guàrdia a realitzar',
            'create' => 'Dades de la guàrdia',
            'control' => 'Control de les guàrdies'
        ),
        'Modulo' => array(
            'asigna' => 'Assigna Cicle Automàticament',
            'index' => 'Mantenimient mòduls',
            'edit' => 'Modifica mòdul',
            'list' => 'Estat Programacions'
        ),
        'Expediente' => array(
            'show' => 'Mostra expedient id.',
            'index' => 'Gestió de expedients',
            'create' => 'Nou expedient',
            'edit' => 'Editar expedient',
            'pdf' => 'Imprimir Tramitats',
            'authorize' => 'Tramitar',
            'unauthorize' => 'No tramitar',
            'autorizar' => 'Tramitar tots els expedients',
            '2' => 'En tramit',
            '3' => 'Resolts',
            '1' => 'Pendent de revisar',
            '0' => 'No comunicat/Rebutjat',
            '4' => 'Comunicat Orientador',
        ),
        'Reunion'=> array(
            'show' => 'Mostra reunió id.',
            'index' => 'Gestió de reunions',
            'create' => 'Nova reunió',
            'edit' => 'Editar ',
            'pdf' => 'Imprimir',
            'email' => 'Enviar convocatòria/acta',
            'notification' => 'Avisar participants',
            'titulo' => 'Participants reunió',
            'participantes' => 'Assistents',
            'ordenes' => 'Ordre del dia',
            'detalle' => 'Dades reunió',
            'saveFile' => 'Arxivar',
            'control' => 'Control Reunions per grup',
        ),
        'Grupotrabajo'=> array(
            'show' => 'Mostra grup de treball id.',
            'index' => 'Gestió de Grups',
            'create' => 'Nou Grup',
            'edit' => 'Editar Grup',
            'participantes' => 'Membres'
        ),
        'Resultado' => array(
            'index' => "Gestiona els teus resultats d'avaluació",
            'create' => 'Crea resultats per un grup',
            'edit' => 'Edita resultats',
            'delete' => 'Esborra resultats',
            'informe' => 'Gestionar Informes de Departament',
            'llenar' => 'Omplir dades complementàries',
            'faltan' => "Per generar l'informe falten els resultats dels següents mòduls",
            'avisa' => 'Avisa Professors',
            'estan' => 'Tens tots els resultats del departament disponibles',
            'generado' => "L'informe del departament està disponible",
        ),
        'Documento' => array(
            'index' => 'Cercar Documents',
            'create' => 'Crear Document',
        ),
        'Proyecto' => array(
            'create' => 'Pujar projecte alumne'
        ),
        'Empresa' => array(
            'index' => 'Llistat Empreses',
            'create' => 'Crear empresa',
            'edit' => 'Editar empresa',
            'delete' => 'Esborrar empresa',
            'detalle' => 'Editar centre de treball',
            'anexo' => 'Editar col.laboracions'
        ),
        'Centro' => array(
            'index' => 'Centre de treball de :quien',
            'edit' => 'Editar centre',
            'delete' => 'Esborrar centre',
            'copy' => 'Crear centre'
        ),
        'Colaboracion' => array(
            'index' => 'Colaboracions de treball de :quien',
            'edit' => 'Editar colaboració',
            'delete' => 'Esborrar colaboració',
            'copy' => 'Crear colaboració'
        ),
        'Fct' => array(
            'index' => 'FCT',
            'create' => 'Nova Fct',
            'edit' => 'Editar Fct',
            'delete' => 'Esborrar Fct',
            'fin' => 'Finalitzar Fct',
            'pdf' => 'Imprimir certificats',
            'mail' => 'Enviar emails feedback',
            'apte' => 'Qualificar Apto',
            'noApte' => 'Qualificar No Apte',
            'noProyecto' => 'Renùncia al Projecte',
            'nuevoProyecto' => 'Accedeix al Projecte',
            'upload' => 'Pujar informació Qualitat',
            'pg0301' => 'Imprimeix PG03-01 (Full Control Servei)',
            'pr0301' => 'Imprimeix PR03-01 (Informar Alumne)',
            'pr0601' => 'Imprimeix PR06-01 (Entrega Certificat)',
            'pr0402' => 'Imprimeix PR04-02 (Entrevista Alumne)',
            'pr0401' => 'Imprimeix PR04-01 (Entrevista Instructor)',
            'list' => 'Acta Grupo :quien',
        ),
        'Direccion' => array(
           'acta' => 'Acta completada' 
        ),
        'Falta_profesor' => array(
            'index' => 'Panel Fitxaje'
        ),
        'Tutoria' => array(
            'index' => 'Índex de Tutories :que',
            'edit' => 'Editar tutoria',
            'delete' => 'Esborrar tutoria',
            'document' => 'Vore fitxer',
            'detalle' => 'Vore comentaris',
            'create' => 'Crear tutoria',
            'anexo' => 'Crear comentari',
            
        ),
        'GrupoTrabajo' => array(
            'index' => 'Grups treball',
            'create' => 'Crear grup treball',
        ),
        'TutoriaGrupo' => array(
            'index' => 'Índex de Tutories',
            'edit' => 'Editar FeedBack tutoria',
            'create' => 'Crear FeedBack tutoria',
            'list' => 'Llistat feedbacks :que'
        ),
        'Ordentrabajo' => array(
            'index' => 'Gestionar Ordres de Treball',
            'edit' => 'Editar Ordre',
            'delete' => 'Esborrar Ordre',
            'anexo' => 'Vore Incidències',
            'pdf' => 'Llistar ordre',
            'open' => 'Obrir ordre a més incidències',
            'resolve' => 'Finalitzar ordre'
        ),
        'Ciclo' => array(
            'index' => 'Manteniment cicles',
            'create' => 'Nou cicle',
            'edit' => 'Editar cicle',
            'delete' => 'Esborrar cicle'
        ),
        'Falta_itaca' => array(
            'index' => 'No marcatge Birret',
            'edit' => 'Editar Birret',
            'resolve' => 'Justificar',
            '0' => 'No comunicada',
            '3' => 'Rebutjada',
            '1' => 'Pendent',
            '2' => 'Justificada',
        ),
        'Horario' => array(
            'index' => 'Modificar Horari :quien',
            'edit' => 'Edita Horari',
            'cambiar' => "Canviar funcions horari",
        ),
        'Instructor' => array(
          'index' => 'Consulta de instructors',
           'edit' => 'Editar instructor',
           'create' => 'Crear instructor',
           'copy' => 'Copiar instructor'
        ),
        'Infdepartamento' => array(
          'index' => 'Consulta informes de departament',  
        ),
        'modelos' => array(
            'Comision' => 'Comisió de Servei',
            'Curso' => 'Curs',
            'Grupo' => 'Grup',
            'Falta' => 'Falta',
            'Actividad' => 'Activitat Extraescolar',
            'Profesor' => 'Professor',
            'Alumno_grupo' => 'Alumnes del grup',
            'Alumno' => 'Alumne',
            'Menu' => 'Menú general',
            'Programacion' => 'Programació',
            'Expediente' => 'Expedient',
            'Reunion' => 'Reunió',
            'GrupoTrabajo' => 'Grup de Treball',
            'OrdenReunion' => 'Ordre',
            'Resultado' => 'Resultat Avaluació',
            'Documento' => 'Gestor Documental',
            'Empresa' => 'Empresa FCT',
            'Centro' => 'Centre de Treball',
            'Colaboracion' => 'Colaboració',
            'Fct' => 'FCT',
            'Tutoria' => 'Tutoria',
            'TutoriaGrupo' => 'FeedBack Tutoria',
            'Material' => 'Material',
            'Incidencia' => 'Incidència',
            'OrdenTrabajo' => 'Ordre de Treball',
            'Ciclo' => 'Cicle',
            'Falta_itaca' => 'Justificar Birret',
            'Instructor' => 'Instructor',
            'Proyecto' => 'Projecte',
            'Evaluacion' => 'Avaluació',
        ),
        'resign' => array(
            'Falta' => 'El document no justifica la baixa',
        ),
        'refuse' => array(
            'Programacion' => 'En la programació falten els siguents requeriments: ',
            
        ),
        'deliver' => array(
            'Falta' => 'Has de justificar la falta en Caporalia',
        ),
        'accept' => array(
            'Expediente' => "Baixa per inasistència de l'alumne :alumno initziada automàticament pel tutor :profesor",
        ),
        
);
