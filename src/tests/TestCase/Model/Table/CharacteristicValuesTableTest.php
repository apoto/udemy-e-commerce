<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CharacteristicValuesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CharacteristicValuesTable Test Case
 */
class CharacteristicValuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CharacteristicValuesTable
     */
    protected $CharacteristicValues;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CharacteristicValues',
        'app.Characteristics',
        'app.CharacteristicsValuesProducts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CharacteristicValues') ? [] : ['className' => CharacteristicValuesTable::class];
        $this->CharacteristicValues = $this->getTableLocator()->get('CharacteristicValues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CharacteristicValues);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicValuesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicValuesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
