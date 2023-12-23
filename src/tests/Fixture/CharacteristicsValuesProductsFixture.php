<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CharacteristicsValuesProductsFixture
 */
class CharacteristicsValuesProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'characteristic_value_id' => 1,
                'product_id' => 1,
            ],
        ];
        parent::init();
    }
}
