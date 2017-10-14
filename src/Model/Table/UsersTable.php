<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use Cake\Event\Event;
use Cake\ORM\Entity;
/**
 * Users Model
 *
 */
class UsersTable extends Table
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
  
        $this->table('users');
        $this->displayField('email');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

        $this->belongsTo('Personas', [
            'className' => 'Personas',
            'foreignKey' => 'persona_id'
        ]);
        
        $this->hasMany('Rolusers', [
            'className' => 'Rolusers',
            'foreignKey' => 'user_id'
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'foto' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'fotodir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'thumb' => [   // Define the prefix of your thumbnail
                        'w' => 150, // Width
                        'h' => 150, // Height
                        'crop' => true,  // Crop will crop the image as well as resize it
                        'jpeg_quality'  => 100,
                        'png_compression_level' => 9
                    ],
                    'mediana' => [     // Define a second thumbnail
                        'w' => 480,
                        'h' => 640,
                        'jpeg_quality'  => 100,
                        'png_compression_level' => 9
                    ],
                    'edit' => [     // Define a second thumbnail
                        'w' => 250,
                        'h' => 300,
                        'jpeg_quality'  => 100,
                        'png_compression_level' => 9
                    ],
                    'ico' => [     // Define a second thumbnail
                        'w' => 18,
                        'h' => 18,
                        'crop' => true,
                        'jpeg_quality'  => 100,
                        'png_compression_level' => 9
                    ],
                    'icofoto' => [     // Define a second thumbnail
                        'w' => 80,
                        'h' => 80,
                        'crop' => true,
                        'jpeg_quality'  => 100,
                        'png_compression_level' => 9
                    ]
                ],
                'thumbnailMethod' => 'php'  // Options are Imagick, Gd or Gmagick
            ]
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
        
        $validator
            ->notEmpty('persona_id', __('No existe una persona relacionada para este usuario.'));

        $validator
            ->add('email', 'validFormat', [
                  'rule' => 'email',
                  'message' => __('Ingrese un Email válido')
            ])
            ->notEmpty('email', __('Debe ingresar el Email del usuario'));
    
        $validator
            ->notEmpty('username', __('Debe ingresar el nombre del usuario'));

        $validator
            ->notEmpty('password', __('Ingrese su contraseña'));

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
        $rules->add($rules->isUnique(['username'], __('El nombre de usuario ingresado ya esta en uso.')));
        $rules->add($rules->isUnique(['email'], __('El Email ingresado ya esta en uso.')));
        return $rules;
    }

    public function beforeSave(Event $event, Entity $entity, \ArrayObject $options){
        
        if ($entity->persona['nombres'] != null and
            $entity->persona['apepaterno'] != null and
            $entity->persona['apematerno'] != null ){
                $entity['nombrecompleto'] = $entity->persona['nombres']
                                            .' '.$entity->persona['apepaterno']
                                            .' '.$entity->persona['apematerno'];   
            }
        $entity['username'] = $entity['email'];
        
        if($entity->isNew()) {       
            
        } else {
            
        }
    }
}