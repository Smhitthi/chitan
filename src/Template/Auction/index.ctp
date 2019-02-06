<h3>※出品されているスキル</h3>
<table cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th scope="col"><?= $this->Paginator->sort('画像') ?></th>
		<th class="main" scope="col"><?= $this->Paginator->sort('スキル名') ?></th>
		<th scope="col"><?= $this->Paginator->sort('カテゴリー') ?></th>
		<th scope="col" class="actions"><?= __('詳細') ?></th>
	</tr>
</thead>
<tbody>
	<?php foreach ($auction as $items): ?>
	<tr>
		<td><?= h($items->image) ?></td>
		<td><?= h($items->name) ?></td>
		<td><?= h($items->category) ?></td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view',$items->id]) ?>
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

	
</div>