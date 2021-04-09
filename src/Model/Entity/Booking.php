<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $date
 * @property \Cake\I18n\FrozenTime|null $start_time
 * @property \Cake\I18n\FrozenTime|null $end_time
 * @property string|null $event_type
 * @property int|null $no_of_people
 * @property int $venue_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Venue $venue
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Supplier[] $suppliers
 * @property \App\Model\Entity\Talent[] $talents
 */
class Booking extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'start_time' => true,
        'end_time' => true,
        'event_type' => true,
        'no_of_people' => true,
        'venue_id' => true,
        'customer_id' => true,
        'venue' => true,
        'customer' => true,
        'suppliers' => true,
        'talents' => true,
    ];
}
