<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventImage Entity
 *
 * @property int $id
 * @property string $path
 * @property int $category_id
 * @property int $img_usr
 * @property int $del_flg
 *
 * @property \App\Model\Entity\Category $category
 */
class EventImage extends Entity
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
        'path' => true,
        'category_id' => true,
        'img_usr' => true,
        'del_flg' => true,
        'category' => true
    ];
}
