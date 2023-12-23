<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CharacteristicsValuesProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CharacteristicsValuesProductsTable Test Case
 */
class CharacteristicsValuesProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CharacteristicsValuesProductsTable
     */
    protected $CharacteristicsValuesProducts;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CharacteristicsValuesProducts',
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
        $config = $this->getTableLocator()->exists('CharacteristicsValuesProducts') ? [] : ['className' => CharacteristicsValuesProductsTable::class];
        $this->CharacteristicsValuesProducts = $this->getTableLocator()->get('CharacteristicsValuesProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CharacteristicsValuesProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicsValuesProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicsValuesProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
