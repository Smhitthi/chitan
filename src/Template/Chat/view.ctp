<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Chat $chat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Chat'), ['action' => 'edit', $chat->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Chat'), ['action' => 'delete', $chat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Chat'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="chat view large-9 medium-8 columns content">
    <h3><?= h($chat->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $chat->has('user') ? $this->Html->link($chat->user->id, ['controller' => 'Users', 'action' => 'view', $chat->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $chat->has('item') ? $this->Html->link($chat->item->name, ['controller' => 'Items', 'action' => 'view', $chat->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($chat->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($chat->id) ?></td>
        </tr>
    </table>
</div>
