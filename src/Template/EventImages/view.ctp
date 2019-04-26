<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventImage $eventImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Image'), ['action' => 'edit', $eventImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Image'), ['action' => 'delete', $eventImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Image'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventImages view large-9 medium-8 columns content">
    <h3><?= h($eventImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= h($eventImage->path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventImage->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($eventImage->category_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img Usr') ?></th>
            <td><?= $this->Number->format($eventImage->img_usr) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Del Flg') ?></th>
            <td><?= $this->Number->format($eventImage->del_flg) ?></td>
        </tr>
    </table>
</div>
