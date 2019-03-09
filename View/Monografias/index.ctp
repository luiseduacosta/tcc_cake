<?php // pr($monografias); ?>

<?php
echo $this->Html->script("jquery", array('inline' => false));
echo $this->Html->scriptBlock('

$(document).ready(function() {

var url = location.hostname;

var base_url = window.location.pathname.split("/");

$("#MonografiaPeriodo").change(function() {
	var periodo = $(this).val();
        /* alert(periodo); */
        if (url === "localhost") {
            window.location="/" + base_url[1] + "/Monografias/index/periodo:" +periodo;
        } else {
            window.location="/Monografias/index/periodo:" +periodo;
        }
})

$("#MonografiaProfessor").change(function() {
	var professor = $(this).val();
        /* alert(professor); */ 
        if (url === "localhost") {
            window.location="/" + base_url[1] + "/Monografias/index/professor:" +professor;
        } else {
            window.location="/Monografias/index/professor:" +professor;
        }
})

});

', array("inline" => false));

?>

<div align="center">
    <?php
    echo $this->Form->Create('Monografia', array('inputDefaults' => array('label' => false, 'div' => false)));
    echo $this->Form->Input('periodo', array('type' => 'select', 'options' => array($periodos), 'selected' => array($periodo), 'empty' => array('0' => 'Selecione')));
// echo $this->Form->End('Confirma');
    ?>
    
    <?php
    echo $this->Form->Create('Monografia', array('inputDefaults' => array('label' => false, 'div' => false)));
    echo $this->Form->Input('professor', array('type' => 'select', 'options' => array($professores), 'selected' => array($professor), 'empty' => array('0' => 'Selecione')));
// echo $this->Form->End('Confirma');
    ?>
    
</div>

<div align = 'center'>

<?php echo $this->Paginator->numbers(); ?>

<br>

<?php
// Shows the next and previous links
echo $this->Paginator->prev(
        '« Anterior ', null, null, array('class' => 'disabled')
);
echo $this->Paginator->next(
        ' Posterior »', null, null, array('class' => 'disabled')
);
?>

<br>

<?php
echo $this->Paginator->counter();
?>

</div>

<br>

<table>
    <tr>
        <th><?php echo $this->Paginator->sort('Monografia.titulo', 'Monografia'); ?></th>
        <th>Estudante(s)</th>
        <th>Orientador</th>
        <th><?php echo $this->Paginator->sort('Monografia.periodo', 'Data ou periodo'); ?></th>
    </tr>
    <?php
    foreach ($monografias as $c_monografia):
        ?>
        <tr>
            <td><?php echo $c_monografia['Monografia']['titulo']; ?></td>
            <td>
                <?php foreach ($c_monografia['Alunostcc'] as $alunostcc): ?>
                    <?php echo $alunostcc['nome'] . ", "; ?>
                <?php endforeach; ?>
            </td>            
            <td><?php echo $c_monografia['Docente']['nome']; ?></td>            
            <td><?php echo $c_monografia['Monografia']['periodo']; ?></td>
        </tr>
        <?php
    endforeach;
    ?>
</table>