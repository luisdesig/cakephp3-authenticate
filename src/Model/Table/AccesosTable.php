<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Accesos Model
 *
 * @method \App\Model\Entity\Acceso get($primaryKey, $options = [])
 * @method \App\Model\Entity\Acceso newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Acceso[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Acceso|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acceso patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Acceso[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Acceso findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AccesosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('accesos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('prmsujeto')
            ->allowEmpty('prmsujeto');

        $validator
            ->integer('prmtiposujeto')
            ->allowEmpty('prmtiposujeto');

        $validator
            ->integer('prmrecurso')
            ->allowEmpty('prmrecurso');

        $validator
            ->integer('prmtiporecurso')
            ->allowEmpty('prmtiporecurso');

        $validator
            ->allowEmpty('activo');

        $validator
            ->allowEmpty('data');

        return $validator;
    }
}
