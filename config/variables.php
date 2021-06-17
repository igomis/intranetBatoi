<?php

return [
    'controlDiario' => 1,
    'diasNoCompleta' => 45,
    'precioKilometro' => 0.19,
    'reservaAforo' => 1.2,
    'programaciones' => [ 'fichero' => '0' , 'enlace' => '1'],
    'mostrarProgramacionesEstado' => '3',
    'comisionFCTexterna' => 1,
    'httpFCTexterna' => 'http://www.fpxativa.es/admin',
    'ipGuardias' => [ [ 'ip' => '172.16.20.238', 'codOcup' => 149034734 ],
        [ 'ip' => '172.16.109.206', 'codOcup' => 3249454 ],
        [ 'ip' => '172.16.109.207', 'codOcup' => 3249454 ],
        [ 'ip' => '172.16.109.208', 'codOcup' => 3249454 ]],
    'ocupacionesGuardia' => [3249454,149034734],
    'pdf' =>
        [   'partAmonestacio' => ['codi' => 'F1.PC01' , 'edicio' => '00', 'vista'=>'expediente.4'],
            'memoriaDepartament' => ['codi' => 'F3.PC02' , 'edicio' => '00','vista' => 'infDep'],
            'actaReunio' => ['codi' => 'F4.PC02', 'edicio' => '00','vista'=>'reunion.acta'],
            'actaAvaluacio' => ['codi' => 'F5.PC02' ,'edicio' => '00','vista'=>'reunion.avaluacio'],
            'actaFSE' => ['codi' => 'F6.PC02' , 'edicio' => '00', 'vista'=>'alumnos.fse'],
            'actaDelegat' => ['codi' => 'F7.PC02' , 'edicio' => '00','vista' => 'reunion.delegado'],
            'autoritzacioMenors' => ['codi' => 'F10.PC02', 'edicio' => '00','vista'=>'autorizacionMenores'],
            'extraescolars' => ['codi' => 'F18.PC02' ,'edicio' => '00','vista'=>'actividads'],
            'baixaInasistencia' => ['codi' => 'F11.PC02' , 'edicio' => '00', 'vista'=>'expediente.1'],
            'perdidaContinua' => ['codi' => 'F12.PC02' , 'edicio' => '00','vista' => 'expediente.2'],
            'actaProyecto' => ['codi' => 'F14.PC02', 'edicio' => '00','vista'=>'reunion.proyecto'],
            'actaDefensa' => ['codi' => 'F15.PC02' ,'edicio' => '00','vista'=>'reunion.defensa'],
            'comisionsServei' => ['codi' => 'F2.PC04' , 'edicio' => '00', 'vista'=>'comisions'],
            'certificatsFCT' => ['codi' => 'F3.PC04' , 'edicio' => '00','vista' => ''],
            'controlServei' => ['codi' => 'F4.PC04', 'edicio' => '00','vista'=>'fct.pg0301'],
            'seguimentInstructor' => ['codi' => 'F5.PC04' ,'edicio' => '00','vista'=>'fct.pr0401'],
            'seguimentAlumnes' => ['codi' => 'F6.PC04' ,'edicio' => '00','vista'=>'fct.pr0402'],
            'fullVacances' => ['codi' => 'F7.PC04' ,'edicio' => '00','vista'=>'fct.pasqua'],
            'comunicacioAbsencia' => ['codi' => 'F1.PS04' ,'edicio' => '00','vista'=>'faltas'],
            'comunicacioBirret' => ['codi' => 'F2.PS04' ,'edicio' => '00','vista'=>'birret'],
            'certificatRiscos' => ['codi' => '' ,'edicio' => '00','vista'=>''],
        ]
    ,
];