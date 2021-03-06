<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $image
 * @property string $category
 * @property string $description
 * @property string $release
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $match_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Chat[] $chat
 * @property \App\Model\Entity\FinishedItem[] $finished_item
 */
class Item extends Entity
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
        'user_id' => true,
        'name' => true,
        'image' => true,
        'category' => true,
        'description' => true,
        'release' => false,
        'comment' => true,
        'match_date' => true,
        'user' => true,
        'chat' => true,
        'finished_item' => true
    ];
}
