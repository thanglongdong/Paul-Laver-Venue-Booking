<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookingsTalentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookingsTalentsTable Test Case
 */
class BookingsTalentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookingsTalentsTable
     */
    protected $BookingsTalents;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BookingsTalents',
        'app.Bookings',
        'app.Talents',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BookingsTalents') ? [] : ['className' => BookingsTalentsTable::class];
        $this->BookingsTalents = $this->getTableLocator()->get('BookingsTalents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BookingsTalents);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
