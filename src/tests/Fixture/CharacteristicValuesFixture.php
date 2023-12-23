<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CharacteristicValuesFixture
 */
class CharacteristicValuesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'characteristic_id' => 1,
                'created' => '2023-12-23 22:45:55',
                'modified' => '2023-12-23 22:45:55',
                'deleted' => '2023-12-23 22:45:55',
            ],
        ];
        parent::init();
    }
}
