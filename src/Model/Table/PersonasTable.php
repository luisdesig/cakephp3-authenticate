<?php
namespace App\Model\Table;

use App\Model\Entity\Persona;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Event\Event;
use Cake\ORM\Entity;
/**
 * Personas Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 */
class PersonasTable extends Table
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

        $this->table('personas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Users', [
            'foreignKey' => 'persona_id'
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
            ->notEmpty('id', 'create');

        $validator
            ->notEmpty('nombres');

        $validator
            ->notEmpty('apepaterno');

        $validator
            ->notEmpty('apematerno');

        $validator
            ->allowEmpty('nombrecompleto');

        $validator
            ->dateTime('fechanacimiento')
            ->allowEmpty('fechanacimiento');

        $validator
            ->integer('prmtipdocumento')
            ->allowEmpty('prmtipdocumento');

        $validator
            ->allowEmpty('numerodocumento');

        $validator
            ->integer('prmgenero')
            ->allowEmpty('prmgenero');

        return $validator;
    }

    
    public function beforeSave(Event $event, Entity $entity, \ArrayObject $options){
        $entity['nombrecompleto'] = $entity['nombres']
                                    .' '.$entity['apepaterno']
                                    .' '.$entity['apematerno'];

        if($entity->isNew()) {
            
        } else {
            
        }
    }
}
