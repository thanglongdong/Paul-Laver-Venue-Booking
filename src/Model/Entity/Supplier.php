<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property string $image
 * @property string $preferred
 * @property float $pph
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Booking[] $bookings
 */
class Supplier extends Entity
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
        'phone' => true,
        'email' => true,
        'description' => true,
        'image' => true,
        'preferred' => true,
        'pph' => true,
        'user_id' => true,
        'user' => true,
        'bookings' => true,
    ];
}
