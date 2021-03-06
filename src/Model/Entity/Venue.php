<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venue Entity
 *
 * @property int $id
 * @property string $name
 * @property string $street_address
 * @property string $suburb
 * @property string $state
 * @property string $postcode
 * @property int $capacity
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property string $image
 * @property float $pph
 *
 * @property \App\Model\Entity\Booking[] $bookings
 */
class Venue extends Entity
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
        'name' => true,
        'street_address' => true,
        'suburb' => true,
        'state' => true,
        'postcode' => true,
        'capacity' => true,
        'phone' => true,
        'email' => true,
        'description' => true,
        'image' => true,
        'pph' => true,
        'bookings' => true,
    ];
}
