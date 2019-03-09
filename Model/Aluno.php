<?php

class Aluno extends AppModel {

    public $name = 'Aluno';
    public $useTable = 'alunos';
    public $primaryKey = 'id';  // ha outro campo registro
    public $displayField = 'nome';

}

?>
