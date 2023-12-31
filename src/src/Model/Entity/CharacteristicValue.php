<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CharacteristicValue Entity
 *
 * @property int $id
 * @property string $name
 * @property int $characteristic_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 *
 * @property \App\Model\Entity\Characteristic $characteristic
 * @property \App\Model\Entity\CharacteristicValuesProduct[] $characteristic_values_products
 */
class CharacteristicValue extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'characteristic_id' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'characteristic' => true,
        'characteristic_values_products' => true,
    ];
}
