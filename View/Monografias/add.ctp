<?php

echo $this->Form->Create('Monografia');
echo $this->Form->Input('titulo', array('label' => 'Tĩtulo'));
echo $this->Form->Input('resumo');
echo $this->Form->Input('estudante', array(
    'type' => 'select',
    'label' => 'Estudante',
    'options' => array($alunos),
    'empty' => array('0' => 'Seleciona')
));
echo $this->Form->Input('data');
echo $this->Form->Input('periodo');
echo $this->Form->Input('professor_id', array(
    'type' => 'select',
    'label' => 'Orientador',
    'options' => array($professores),
    'empty' => array('0' => 'Seleciona')));
echo $this->Form->Input('professor2_id', array(
    'type' => 'select',
    'label' => 'Co-Orientador',
    'options' => array($professores),
    'empty' => array('0' => 'Seleciona')));
echo $this->Form->Input('data_defesa');
echo $this->Form->Input('banca1', array(
    'type' => 'select',
    'label' => 'Banca presidente',
    'options' => array($professores),
    'empty' => array('0' => 'Seleciona')
));
echo $this->Form->Input('banca2', array(
    'type' => 'select',
    'label' => 'Banca ',
    'options' => array($professores),
    'empty' => array('0' => 'Seleciona')
));
echo $this->Form->Input('banca3', array(
    'type' => 'select',
    'label' => 'Banca',
    'options' => array($professores),
    'empty' => array('0' => 'Seleciona')
));
echo $this->Form->Input('convidado');
echo $this->Form->Input('url');
echo $this->Form->End('Confirma');
?>

