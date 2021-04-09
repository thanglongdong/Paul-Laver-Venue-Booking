<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookingsSuppliersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookingsSuppliersTable Test Case
 */
class BookingsSuppliersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookingsSuppliersTable
     */
    protected $BookingsSuppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BookingsSuppliers',
        'app.Bookings',
        'app.Suppliers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BookingsSuppliers') ? [] : ['className' => BookingsSuppliersTable::class];
        $this->BookingsSuppliers = $this->getTableLocator()->get('BookingsSuppliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BookingsSuppliers);

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
