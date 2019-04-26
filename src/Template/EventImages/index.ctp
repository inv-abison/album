<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventImage[]|\Cake\Collection\CollectionInterface $eventImages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Event Image'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventImages index large-9 medium-8 columns content">
    <h3><?= __('Event Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('img_usr') ?></th>
                <th scope="col"><?= $this->Paginator->sort('del_flg') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventImages as $eventImage): ?>
            <tr>
                <td><?= $this->Number->format($eventImage->id) ?></td>
                <td><?= h($eventImage->path) ?></td>
                <td><?= $this->Number->format($eventImage->category_id) ?></td>
                <td><?= $this->Number->format($eventImage->img_usr) ?></td>
                <td><?= $this->Number->format($eventImage->del_flg) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventImage->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
