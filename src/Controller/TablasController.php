<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tablas Controller
 *
 * @property \App\Model\Table\TablasTable $Tablas
 */
class TablasController extends AppController
{
    
    

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentTablas'],
            'sortWhitelist' => ['id'],
            'limit' => 10
        ];
        
        $tablas = $this->paginate($this->Tablas->find('all')->where(['Tablas.parent_id is null']));

        $this->set('title', 'Lista de Tablas');
        $this->set(compact('tablas'));
        $this->set('_serialize', ['tablas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tabla id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tabla = $this->Tablas->get($id, [
            'contain' => ['ParentTablas', 'Rolusers', 'ChildTablas']
        ]);

        $this->set('title', 'Tabla');
        $this->set('tabla', $tabla);
        $this->set('_serialize', ['tabla']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tabla = $this->Tablas->newEntity();
        if ($this->request->is('post')) {
            $tabla = $this->Tablas->patchEntity($tabla, $this->request->data);
            if ($this->Tablas->save($tabla)) {
                $this->Flash->success(__('The tabla has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tabla could not be saved. Please, try again.'));
            }
        }
        $parentTablas = $this->Tablas->ParentTablas->find('treeList', [
            'recoverOrder' => ['nombre' => 'ASC'],
            'limit' => 400,
            'keyPath' => 'id',
            'valuePath' => 'nombre'
        ]);
         
        $this->set('title', 'Agregar Nuevas Tablas');
        $this->set(compact('tabla', 'parentTablas'));
        $this->set('_serialize', ['tabla']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tabla id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tabla = $this->Tablas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tabla = $this->Tablas->patchEntity($tabla, $this->request->data);
            if ($this->Tablas->save($tabla)) {
                $this->Flash->success(__('The tabla has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tabla could not be saved. Please, try again.'));
            }
        }
        $parentTablas = $this->Tablas->ParentTablas->find('treeList', [
            'recoverOrder' => ['nombre' => 'ASC'],
            'limit' => 400,
            'keyPath' => 'id',
            'valuePath' => 'nombre'
        ]);
        $this->set(compact('tabla', 'parentTablas'));
        $this->set('_serialize', ['tabla']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tabla id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tabla = $this->Tablas->get($id);
       /* if ($this->Tablas->delete($tabla)) {
            $this->Flash->success(__('The tabla has been deleted.'));
        } else {
            $this->Flash->error(__('The tabla could not be deleted. Please, try again.'));
        }*/
        return $this->redirect(['action' => 'index']);
    }

    
    public function getCodigoIncidencia(){
        
        $tabla = $this->Tablas->get(32);
        $cod = split('-',$tabla['codigo']);
        if ($cod[0] != ''.date("Ym")){
            $cod[0] = ''.date("Ym");
            $cod[1] = '000001';
        }else{
            $cod[1] = substr(('000000'.($cod[1]+1)), -6);
        }
        $cod = ['codigo' => $cod[0].'-'.$cod[1]];

        $tabla = $this->Tablas->patchEntity($tabla, $cod);
        if ($this->Tablas->save($tabla)) {
            $codigo = $tabla['codigo'];
        }
        return $codigo;
        
    }
    
}
