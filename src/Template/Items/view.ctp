<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chat'), ['controller' => 'Chat', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['controller' => 'Chat', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Finished Item'), ['controller' => 'FinishedItem', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Finished Item'), ['controller' => 'FinishedItem', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $item->has('user') ? $this->Html->link($item->user->id, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($item->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($item->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($item->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($item->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Release') ?></th>
            <td><?= h($item->release) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($item->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Match Date') ?></th>
            <td><?= h($item->match_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Chat') ?></h4>
        <?php if (!empty($item->chat)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->chat as $chat): ?>
            <tr>
                <td><?= h($chat->id) ?></td>
                <td><?= h($chat->user_id) ?></td>
                <td><?= h($chat->item_id) ?></td>
                <td><?= h($chat->comment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Chat', 'action' => 'view', $chat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Chat', 'action' => 'edit', $chat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chat', 'action' => 'delete', $chat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chat->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Finished Item') ?></h4>
        <?php if (!empty($item->finished_item)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Finished') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->finished_item as $finishedItem): ?>
            <tr>
                <td><?= h($finishedItem->id) ?></td>
                <td><?= h($finishedItem->item_id) ?></td>
                <td><?= h($finishedItem->user_id) ?></td>
                <td><?= h($finishedItem->finished) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FinishedItem', 'action' => 'view', $finishedItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FinishedItem', 'action' => 'edit', $finishedItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FinishedItem', 'action' => 'delete', $finishedItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $finishedItem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
