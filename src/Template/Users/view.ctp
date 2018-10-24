<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chat'), ['controller' => 'Chat', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chat'), ['controller' => 'Chat', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Finished Item'), ['controller' => 'FinishedItem', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Finished Item'), ['controller' => 'FinishedItem', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Chat') ?></h4>
        <?php if (!empty($user->chat)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->chat as $chat): ?>
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
        <?php if (!empty($user->finished_item)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Finished') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->finished_item as $finishedItem): ?>
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
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($user->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Release') ?></th>
                <th scope="col"><?= __('Comment') ?></th>
                <th scope="col"><?= __('Match Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->user_id) ?></td>
                <td><?= h($items->name) ?></td>
                <td><?= h($items->image) ?></td>
                <td><?= h($items->category) ?></td>
                <td><?= h($items->description) ?></td>
                <td><?= h($items->release) ?></td>
                <td><?= h($items->comment) ?></td>
                <td><?= h($items->match_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
