<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Monografia extends AppModel {
    /* @var Estagiario */
    /* @var Instituicao */

    public $name = 'Monografia';
    public $useTable = 'monografias';
    public $primaryKey = 'id';
    public $belongsTo = array(
        'Docente' => array(
            'className' => 'Docente',
            'foreignKey' => 'professor_id',
            'joinTable' => 'docentes'
        )
    );
    
    public $hasMany = array('Alunostcc'
        => array(
            'className' => 'Alunostcc',
            'foreignKey' => 'monografia_id'
        )
    );

}
