<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CharacteristicsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CharacteristicsTable Test Case
 */
class CharacteristicsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CharacteristicsTable
     */
    protected $Characteristics;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Characteristics',
        'app.CharacteristicValues',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Characteristics') ? [] : ['className' => CharacteristicsTable::class];
        $this->Characteristics = $this->getTableLocator()->get('Characteristics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Characteristics);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CharacteristicsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
