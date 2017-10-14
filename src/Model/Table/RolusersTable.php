<?php
namespace App\Model\Table;

use App\Model\Entity\Roluser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rolusers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class RolusersTable extends Table
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

        $this->table('rolusers');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'className' => 'Users',
            'foreignKey' => 'user_id'
        ]);
        
        $this->belongsTo('Roles', [
            'className' => 'Parametros',
            'foreignKey' => 'prmrolusuario',
            'joinType' => 'INNER',
            'conditions' => ['Roles.parent_id' => 6] // 6 Tipo de de usuario del sistema
        ]);
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
            ->integer('prmrolusuario')
            ->requirePresence('prmrolusuario', 'create')
            ->notEmpty('prmrolusuario');

        $validator
            ->requirePresence('activo', 'create')
            ->notEmpty('activo');

        $validator
            ->allowEmpty('eliminado');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
