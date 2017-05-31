<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parametros Controller
 *
 * @property \App\Model\Table\ParametrosTable $Parametros
 */
class ParametrosController extends AppController
{
    
    

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentParametros'],
            'sortWhitelist' => ['id'],
            'limit' => 10
        ];
        
        $parametros = $this->paginate($this->Parametros->find('all')->where(['Parametros.parent_id is null']));

        $this->set('title', 'Lista de Parametros');
        $this->set(compact('parametros'));
        $this->set('_serialize', ['parametros']);
    }

    /**
     * View method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parametro = $this->Parametros->get($id, [
            'contain' => ['ParentParametros', 'Rolusers', 'ChildParametros']
        ]);

        $this->set('title', 'Parametro');
        $this->set('parametro', $parametro);
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parametro = $this->Parametros->newEntity();
        if ($this->request->is('post')) {
            $parametro = $this->Parametros->patchEntity($parametro, $this->request->data);
            if ($this->Parametros->save($parametro)) {
                $this->Flash->success(__('The parametro has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametro could not be saved. Please, try again.'));
            }
        }
        
        $parentFilter =[];
        if (isset($this->request->query['parent_id'])){
            $parentFilter = ['id' => $this->request->query['parent_id']];
            $parametro['parent_id'] = $this->request->query['parent_id'];
        }
        
        $parentParametros = $this->Parametros->ParentParametros->find('treeList', [
            'recoverOrder' => ['nombre' => 'ASC'],
            'conditions' => $parentFilter,
            'limit' => 400,
            'keyPath' => 'id',
            'valuePath' => 'nombre'
        ]);
        $this->set(compact('parametro', 'parentParametros'));
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parametro = $this->Parametros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parametro = $this->Parametros->patchEntity($parametro, $this->request->data);
            if ($this->Parametros->save($parametro)) {
                $this->Flash->success(__('The parametro has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametro could not be saved. Please, try again.'));
            }
        }
        $parentParametros = $this->Parametros->ParentParametros->find('treeList', [
            'recoverOrder' => ['nombre' => 'ASC'],
            'limit' => 400,
            'keyPath' => 'id',
            'valuePath' => 'nombre'
        ]);
        $this->set(compact('parametro', 'parentParametros'));
        $this->set('_serialize', ['parametro']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametro id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parametro = $this->Parametros->get($id);
       /* if ($this->Parametros->delete($parametro)) {
            $this->Flash->success(__('The parametro has been deleted.'));
        } else {
            $this->Flash->error(__('The parametro could not be deleted. Please, try again.'));
        }*/
        return $this->redirect(['action' => 'index']);
    }

    
    public function getCodigoIncidencia(){
        
        $parametro = $this->Parametros->get(32);
        $cod = split('-',$parametro['codigo']);
        if ($cod[0] != ''.date("Ym")){
            $cod[0] = ''.date("Ym");
            $cod[1] = '000001';
        }else{
            $cod[1] = substr(('000000'.($cod[1]+1)), -6);
        }
        $cod = ['codigo' => $cod[0].'-'.$cod[1]];

        $parametro = $this->Parametros->patchEntity($parametro, $cod);
        if ($this->Parametros->save($parametro)) {
            $codigo = $parametro['codigo'];
        }
        return $codigo;
        
    }
    
}
