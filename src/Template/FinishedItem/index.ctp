<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FinishedItem[]|\Cake\Collection\CollectionInterface $finishedItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Finished Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="finishedItem index large-9 medium-8 columns content">
    <h3><?= __('Finished Item') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('finished') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($finishedItem as $finishedItem): ?>
            <tr>
                <td><?= $this->Number->format($finishedItem->id) ?></td>
                <td><?= $finishedItem->has('item') ? $this->Html->link($finishedItem->item->name, ['controller' => 'Items', 'action' => 'view', $finishedItem->item->id]) : '' ?></td>
                <td><?= $finishedItem->has('user') ? $this->Html->link($finishedItem->user->id, ['controller' => 'Users', 'action' => 'view', $finishedItem->user->id]) : '' ?></td>
                <td><?= h($finishedItem->finished) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $finishedItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $finishedItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $finishedItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $finishedItem->id)]) ?>
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
