<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tabla Entity.
 *
 * @property int $id
 * @property int $parent_id
 * @property \App\Model\Entity\ParentTabla $parent_tabla
 * @property int $tipo
 * @property int $valor
 * @property string $codigo
 * @property \Cake\I18n\Time $fecha
 * @property string $nombre
 * @property string $descripcion
 * @property int $lft
 * @property int $rght
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Roluser[] $rolusers
 * @property \App\Model\Entity\ChildTabla[] $child_tablas
 */
class Tabla extends Entity
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
}
