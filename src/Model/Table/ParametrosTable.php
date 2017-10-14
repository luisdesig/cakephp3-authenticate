<?php
namespace App\Model\Table;

use App\Model\Entity\Parametros;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Parametros Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentParametros
 * @property \Cake\ORM\Association\HasMany $Rolusers
 * @property \Cake\ORM\Association\HasMany $ChildParametros
 */
class ParametrosTable extends Table
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

        $this->table('parametros');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentParametros', [
            'className' => 'Parametros',
            'foreignKey' => 'parent_id'
        ]);
        
        $this->hasMany('ChildParametros', [
            'className' => 'Parametros',
            'foreignKey' => 'parent_id'
        ]);
        
        $this->hasMany('Rolusers', [
            'foreignKey' => 'prmrolusuario'
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
            ->integer('tipo')
            ->allowEmpty('tipo');
        $validator
            ->allowEmpty('valor');
        $validator
            ->allowEmpty('codigo');
        $validator
            ->dateTime('fecha')
            ->allowEmpty('fecha');
        $validator
            ->allowEmpty('nombre');
        $validator
            ->allowEmpty('descripcion');
        $validator
            ->integer('lft')
            ->allowEmpty('lft');
        $validator
            ->integer('rght')
            ->allowEmpty('rght');
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentParametros'));
        return $rules;
    }
}
