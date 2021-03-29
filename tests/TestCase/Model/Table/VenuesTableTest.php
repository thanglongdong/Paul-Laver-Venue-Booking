<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VenuesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VenuesTable Test Case
 */
class VenuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VenuesTable
     */
    protected $Venues;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Venues',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Venues') ? [] : ['className' => VenuesTable::class];
        $this->Venues = $this->getTableLocator()->get('Venues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Venues);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
