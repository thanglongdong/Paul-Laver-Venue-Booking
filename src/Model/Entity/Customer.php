<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property string $address
 * @property string $email
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Booking[] $bookings
 */
class Customer extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'mobile' => true,
        'address' => true,
        'email' => true,
        'user_id' => true,
        'user' => true,
        'bookings' => true,
    ];
}
