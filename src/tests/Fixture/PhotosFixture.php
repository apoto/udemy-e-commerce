<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PhotosFixture
 */
class PhotosFixture extends TestFixture
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
                'file_dir' => 'Lorem ipsum dolor sit amet',
                'file_name' => 'Lorem ipsum dolor sit amet',
                'alt' => 'Lorem ipsum dolor sit amet',
                'product_id' => 1,
                'created' => '2023-12-23 22:45:56',
                'modified' => '2023-12-23 22:45:56',
                'deleted' => '2023-12-23 22:45:56',
            ],
        ];
        parent::init();
    }
}
