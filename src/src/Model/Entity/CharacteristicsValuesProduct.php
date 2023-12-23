<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CharacteristicsValuesProduct Entity
 *
 * @property int $id
 * @property int $characteristic_value_id
 * @property int $product_id
 *
 * @property \App\Model\Entity\CharacteristicValue $characteristic_value
 * @property \App\Model\Entity\Product $product
 */
class CharacteristicsValuesProduct extends Entity
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
        'characteristic_value_id' => true,
        'product_id' => true,
        'characteristic_value' => true,
        'product' => true,
    ];
}
