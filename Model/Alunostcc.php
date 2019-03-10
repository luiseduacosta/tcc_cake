<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Alunostcc extends AppModel {
    /* @var Estagiario */
    /* @var Instituicao */

    public $name = 'Alunostcc';
    public $useTable = 'alunostccs';
    public $primaryKey = 'id';
   
    public $belongsTo = array('Monografia'
        => array(
            'className' => 'Alunostcc',
            'foreignKey' => 'monografia_id', // nao eh o registro
            'joinTable' => 'monografias'
        )
    );
    
}
