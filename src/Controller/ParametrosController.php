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
        
        $parentParametros = $this->getParametros();
        
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
          $data = $this->request->data;
          $data['fecha'] = $this->parseFechaPostgresql($data['fecha']);
          $parametro = $this->Parametros->patchEntity($parametro, $data);

          if ($this->Parametros->save($parametro)) {
            $this->Flash->success(__('The parametro has been saved.'));
            return $this->redirect(['action' => 'index']);
          } else {
            $this->Flash->error(__('The parametro could not be saved. Please, try again.'));
          }
        }
        $parentParametros = $this->getParametros('threaded');

        $this->set(compact('parametro', ['parametro']));
        $this->set(compact('parentParametros', ['parentParametros']));
        $this->set('_serialize', ['parametro', 'parentParametros']);
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
    
    public function getParametros($tipo ='treeList'){
      if ($this->request->is('ajax')){
        $tipo = $this->request->query['tipo'];
      }
      $parentParametros = $this->Parametros->ParentParametros->find($tipo, [
            'recoverOrder' => ['nombre' => 'ASC'],
            'limit' => 400,
            'keyPath' => 'id',
            'valuePath' => 'nombre'
        ])->toArray();
        
        $parentParametros = $this->generaTreeData($parentParametros);

      if ($this->request->is('ajax')){
        $this->autoRender = false;
        $this->viewBuilder()->layout('ajax');
        echo json_encode(['data'=>$parentParametros]);
      }else{
        return $parentParametros;
      }
    }

  public function generaTreeData($data = []){
    $result = [];
    foreach ($data as $index=>$value) {
      $result[$index] = 
        [
          'title' => $value['nombre'],
          'key' => $value['id']
        ];
        
      if (count($value['children'])>0){
        $result[$index]['folder'] = true;
        $result[$index]['children'] = $this->generaTreeData ($value['children']);
      }
    }
    return $result;
  }
  
  public function reubicarParametro(){
    if ($this->request->is('post')) {
    
      $id = $this->request->data['id'];
      $parent_id = $this->request->data['parent_id'];

      $parametro = $this->Parametros->get($id);
      if (!isset($parametro)) {
         throw new NotFoundException(__('No existe el parametro que desea reubicar'));
      }
      if ($parent_id >= 0) {
        $parent_id = ($parent_id ==0 ? null : $parent_id);
        $parametro->parent_id = $parent_id;
        $this->Parametros->save($parametro);
        $this->Flash->success(__('Se guardo exitosamente'));
      } else {
        $this->Flash->success(__('Proporsione un número correcto para la reubicación'));
      }
    }
    if ($this->request->is('ajax')){
      $this->autoRender = false;
      $this->viewBuilder()->layout('ajax');
      echo json_encode([]);
    }
  }
  
  public function filtrarParametros($filtro =''){
    if ($this->request->is('ajax')){
      $filtro = $this->request->query['filtro'];
    }

    $parentParametros = $this->Parametros->ParentParametros->find('threaded', [
          'recoverOrder' => ['nombre' => 'ASC'],
          'limit' => 400,
          'keyPath' => 'id',
          'valuePath' => 'nombre'
      ])->where([
        'upper(nombre) like upper(\'%'.$filtro.'%\')'
        ])->toArray();
        
    foreach ($parentParametros as $i=>$par) {
      if (isset($par['parent_id'])){
        $padre = $this->buscarPadre($par['parent_id']);
        $padre['children'][]=$par;
        $parentParametros[$i] = $padre;
      }
    }

    $parentParametros = $this->generaTreeData($parentParametros);

    if ($this->request->is('ajax')){
      $this->autoRender = false;
      $this->viewBuilder()->layout('ajax');
      echo json_encode(['data'=>$parentParametros]);
    }else{
      return $parentParametros;
    }
  }
  
  function buscarPadre($id = null){
    $padre = null;
    $parametro = $this->Parametros->get($id, ['contain' => []])->toArray();

    if (isset($parametro['parent_id'])){
        $padre = $this->buscarPadre($par['parent_id']);
    }
    
    if ($padre !== null){
      $padre['children'][] = $parametro;
      $parametro = $padre;
    }

    return $parametro;
  }
  
  public function mnt($id = null){
    
    parent::setTitle('Gestión de Parametros' );
    
    //debug(parent::miVars['title']);
    
    echo json_encode([]);
  }
      
  
}
