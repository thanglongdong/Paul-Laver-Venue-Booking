<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookingsTalent Entity
 *
 * @property int $id
 * @property int|null $booking_id
 * @property int|null $talent_id
 * @property \Cake\I18n\FrozenTime|null $perform_stime
 * @property \Cake\I18n\FrozenTime|null $perform_etime
 *
 * @property \App\Model\Entity\Booking $booking
 * @property \App\Model\Entity\Talent $talent
 */
class BookingsTalent extends Entity
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
        'talent_id' => true,
        'perform_stime' => true,
        'perform_etime' => true,
        'booking' => true,
        'talent' => true,
    ];
}
