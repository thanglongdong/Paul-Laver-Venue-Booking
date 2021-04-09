<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookingsSupplier Entity
 *
 * @property int $id
 * @property int|null $booking_id
 * @property int|null $supplier_id
 * @property string|null $role
 *
 * @property \App\Model\Entity\Booking $booking
 * @property \App\Model\Entity\Supplier $supplier
 */
class BookingsSupplier extends Entity
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
        'booking_id' => true,
        'supplier_id' => true,
        'role' => true,
        'booking' => true,
        'supplier' => true,
    ];
}
