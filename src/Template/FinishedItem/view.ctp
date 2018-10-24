<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FinishedItem $finishedItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Finished Item'), ['action' => 'edit', $finishedItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Finished Item'), ['action' => 'delete', $finishedItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $finishedItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Finished Item'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Finished Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="finishedItem view large-9 medium-8 columns content">
    <h3><?= h($finishedItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $finishedItem->has('item') ? $this->Html->link($finishedItem->item->name, ['controller' => 'Items', 'action' => 'view', $finishedItem->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $finishedItem->has('user') ? $this->Html->link($finishedItem->user->id, ['controller' => 'Users', 'action' => 'view', $finishedItem->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($finishedItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Finished') ?></th>
            <td><?= $finishedItem->finished ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
