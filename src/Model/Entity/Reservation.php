<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $spot_id
 * @property int $stall_id
 * @property \Cake\I18n\FrozenDate $reservation_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Spot $spot
 * @property \App\Model\Entity\Stall $stall
 */
class Reservation extends Entity
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
        'spot_id' => true,
        'stall_id' => true,
        'reservation_date' => true,
        'created' => true,
        'modified' => true,
        'spot' => true,
        'stall' => true
    ];
}
