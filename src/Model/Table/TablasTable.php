<?php
namespace App\Model\Table;

use App\Model\Entity\Tabla;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tablas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ParentTablas
 * @property \Cake\ORM\Association\HasMany $Rolusers
 * @property \Cake\ORM\Association\HasMany $ChildTablas
 */
class TablasTable extends Table
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

        $this->table('tablas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentTablas', [
            'className' => 'Tablas',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Rolusers', [
            'foreignKey' => 'tblrolusuario'
        ]);
        $this->hasMany('ChildTablas', [
            'className' => 'Tablas',
            'foreignKey' => 'parent_id'
        ]);
        
        $this->hasMany('Tipoincidencias', [
            'className' => 'Incidencias',
            'foreignKey' => 'tbltipoincidencia'
        ]);
        
        $this->hasMany('Estadoincidencias', [
            'className' => 'Incidencias',
            'foreignKey' => 'tblestadoincidencia'
        ]);
        $this->hasMany('Indicenciausers', [
            'className' => 'Indicenciausers',
            'foreignKey' => 'tblrolincidencia'
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
        $rules->add($rules->existsIn(['parent_id'], 'ParentTablas'));
        return $rules;
    }
}
