<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Chat'), ['controller' => 'Chat', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Chat'), ['controller' => 'Chat', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Finished Item'), ['controller' => 'FinishedItem', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Finished Item'), ['controller' => 'FinishedItem', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('name');
            echo $this->Form->control('image');
            echo $this->Form->control('category');
            echo $this->Form->control('description');
            echo $this->Form->control('release');
            echo $this->Form->control('comment');
            echo $this->Form->control('match_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
