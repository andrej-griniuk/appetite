<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Stall Entity
 *
 * @property int $id
 * @property int $food_type_id
 * @property string $name
 * @property string $description
 * @property float $rating
 * @property string $logo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\FoodType $food_type
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Stall extends Entity
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
        'food_type_id' => true,
        'name' => true,
        'description' => true,
        'rating' => true,
        'created' => true,
        'modified' => true,
        'food_type' => true,
        'reservations' => true,
        'logo' => true,
    ];
}
