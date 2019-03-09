<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MonografiasController extends AppController {

    public $name = "Monografias";

    public function index() {

        $parametros = $this->params['named'];
        // pr($parametros);

        $periodo = isset($parametros['periodo']) ? $parametros['periodo'] : NULL;
        $professor = isset($parametros['professor']) ? $parametros['professor'] : NULL;
        // echo $professor;

        $condicoes = NULL;

        if ($periodo === NULL):
            // echo 'Periodo vazio ou zero ' . $periodo . '<br>';
            $periodo = $this->Session->read("periodo");
            if ($periodo) {
                $condicoes['periodo'] = $periodo;
            };
        else:
            // echo 'Periodo selecionado: ' . $periodo . '<br>';
            if ($periodo != '0') {
                $this->Session->write("periodo", $periodo);
                $condicoes['periodo'] = $periodo;
            } else {
                $this->Session->delete('periodo');
            }
        endif;

        if ($professor === NULL):
            // echo 'Periodo vazio ou zero ' . $periodo . '<br>';
            $professor = $this->Session->read("professor");
            if ($professor) {
                $condicoes['professor_id'] = $professor;
            };
        else:
            // echo 'Periodo selecionado: ' . $periodo . '<br>';
            if ($professor != '0') {
                $this->Session->write("professor", $professor);
                $condicoes['professor_id'] = $professor;
            } else {
                $this->Session->delete('professor');
            }
        endif;

        $this->set('periodos', $this->Monografia->find('list', array(
                    'fields' => array('Monografia.periodo', 'Monografia.periodo'),
                    'group' => 'periodo', 'id')
                )
        );

        $this->set('professores', $this->Monografia->find('list', array(
                    'joins' => array(array(
                            'table' => 'docentes',
                            'alias' => 'Docente',
                            'type' => 'INNER',
                            'conditions' => array('Docente.id = Monografia.professor_id')
                        )),
                    'fields' => array('Monografia.professor_id', 'Docente.nome'),
                    'group' => 'Monografia.professor_id',
                    'order' => 'Docente.nome')
                )
        );

        $this->Monografia->recursive = 2;
        $this->set('monografias', $this->Paginate('Monografia', $condicoes));
        $this->set('periodo', $periodo);
        $this->set('professor', $professor);
    }

    public function edit($id = NULL) {

        $this->Monografia->id = $id;

        if (empty($this->data)) {
            $this->data = $this->Monografia->read();
        } else {
            if ($this->Monografia->save($this->data)) {
                // print_r($this->data);
                $this->Session->setFlash("Atualizado");
                $this->redirect('/Monografias/view/' . $id);
            }
        }
    }

    public function view($id = NULL) {

        $monografia = $this->Monografia->find('first', array(
            'conditions' => array('Monografia.id' => $id)
        ));
        // pr($disciplina);
        // die();
        $this->set('monografia', $monografia);
    }

    public function add() {

        if ($this->data) {
            if ($this->Monografia->save($this->data)) {
                $this->Session->setFlash('Dados inseridos');
                $this->redirect('/Monografias/view/' . $this->Monografias->getLastInsertId());
            }
        } else {
            $professores = $this->Monografia->Docente->find('list', array(
                'order' => 'Docente.nome',
                'fields' => 'Docente.nome'));
            // pr($professores);

            $this->set('professores', $professores);

            $this->loadModel('Aluno');
            $slunos = $this->Aluno->find('all', array(
                'order' => 'Aluno.nome',
                'fields' => 'Aluno.nome'));
            pr($alunos);
            $log = $this->Aluno->getDataSource()->getLog(false, false);
            // debug($log);
            $this->set('alunos', $alunos);
        }
    }

    public function delete($id = NULL) {

        $this->Monografia->delete($id);
        $this->Session->setFlash("Monografia excluída");
        // die("Disciplina excluída");
        $this->redirect('/Monografia/index/');
    }

}
