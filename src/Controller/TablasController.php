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
            'contain' => ['ParentTablas']
        ];
        $tablas = $this->paginate($this->Tablas);

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
        $parentTablas = $this->Tablas->ParentTablas->find('list', ['limit' => 200]);
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
        $parentTablas = $this->Tablas->ParentTablas->find('list', ['limit' => 200]);
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
        if ($this->Tablas->delete($tabla)) {
            $this->Flash->success(__('The tabla has been deleted.'));
        } else {
            $this->Flash->error(__('The tabla could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    public function getRolesUsuario(){
        $roles = $this->Tablas->findByParentId(6);
        
        return $roles;
    }
    
}
