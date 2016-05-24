<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity.
 *
 * @property int $id
 * @property string $nombres
 * @property string $apepaterno
 * @property string $apematerno
 * @property string $nombrecompleto
 * @property \Cake\I18n\Time $fechanacimiento
 * @property int $tbltipdocumento
 * @property string $numerodocumento
 * @property int $tblgenero
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\User[] $users
 */
class Persona extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _setFechanacimiento($fechanacimiento)
    {
        return (new DefaultPasswordHasher)->hash($fechanacimiento);
    }    
}
