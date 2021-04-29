<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsTalentsFixture
 */
class BookingsTalentsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'booking_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'talent_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_BOOKINGS_TALENTS_BOOKINGS' => ['type' => 'index', 'columns' => ['booking_id'], 'length' => []],
            'FK_BOOKINGS_TALENTS_TALENTS' => ['type' => 'index', 'columns' => ['talent_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_BOOKINGS_TALENTS_BOOKINGS' => ['type' => 'foreign', 'columns' => ['booking_id'], 'references' => ['bookings', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_BOOKINGS_TALENTS_TALENTS' => ['type' => 'foreign', 'columns' => ['talent_id'], 'references' => ['talents', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_0900_ai_ci'
        ],
    ];
    // phpcs:enable
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
                'booking_id' => 1,
                'talent_id' => 1,
            ],
        ];
        parent::init();
    }
}
