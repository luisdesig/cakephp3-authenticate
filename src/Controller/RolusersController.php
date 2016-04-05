<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rolusers Controller
 *
 * @property \App\Model\Table\RolusersTable $Rolusers
 */
class RolusersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Tablas']
        ];
        $rolusers = $this->paginate($this->Rolusers);

        $this->set(compact('rolusers'));
        $this->set('_serialize', ['rolusers']);
    }

    /**
     * View method
     *
     * @param string|null $id Roluser id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $roluser = $this->Rolusers->get($id, [
            'contain' => ['Users', 'Tablas']
        ]);

        $this->set('roluser', $roluser);
        $this->set('_serialize', ['roluser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $roluser = $this->Rolusers->newEntity();
        if ($this->request->is('post')) {
            $roluser = $this->Rolusers->patchEntity($roluser, $this->request->data);
            if ($this->Rolusers->save($roluser)) {
                $this->Flash->success(__('The roluser has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The roluser could not be saved. Please, try again.'));
            }
        }
        $users = $this->Rolusers->Users->find('list', ['limit' => 200]);
        $tablas = $this->Rolusers->Tablas->find('list', ['limit' => 200]);
        $this->set(compact('roluser', 'users', 'tablas'));
        $this->set('_serialize', ['roluser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Roluser id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $roluser = $this->Rolusers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $roluser = $this->Rolusers->patchEntity($roluser, $this->request->data);
            if ($this->Rolusers->save($roluser)) {
                $this->Flash->success(__('The roluser has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The roluser could not be saved. Please, try again.'));
            }
        }
        $users = $this->Rolusers->Users->find('list', ['limit' => 200]);
        $tablas = $this->Rolusers->Tablas->find('list', ['limit' => 200]);
        $this->set(compact('roluser', 'users', 'tablas'));
        $this->set('_serialize', ['roluser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Roluser id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $roluser = $this->Rolusers->get($id);
        if ($this->Rolusers->delete($roluser)) {
            $this->Flash->success(__('The roluser has been deleted.'));
        } else {
            $this->Flash->error(__('The roluser could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
