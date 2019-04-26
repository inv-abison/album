<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\EventImage $eventImage
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventImage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventImage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Event Images'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="eventImages form large-9 medium-8 columns content">
    <?= $this->Form->create($eventImage) ?>
    <fieldset>
        <legend><?= __('Edit Event Image') ?></legend>
        <?php
            echo $this->Form->control('path');
            echo $this->Form->control('category_id');
            echo $this->Form->control('img_usr');
            echo $this->Form->control('del_flg');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
