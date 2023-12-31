<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CharacteristicValuesProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CharacteristicValuesProductsTable Test Case
 */
class CharacteristicValuesProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CharacteristicValuesProductsTable
     */
    protected $CharacteristicValuesProducts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CharacteristicValuesProducts',
        'app.CharacteristicValues',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CharacteristicValuesProducts') ? [] : ['className' => CharacteristicValuesProductsTable::class];
        $this->CharacteristicValuesProducts = $this->getTableLocator()->get('CharacteristicValuesProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CharacteristicValuesProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicValuesProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicValuesProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
