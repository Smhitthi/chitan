<h2>ミニオークション！</h2>
<h3>※出品されている商品</h3>
<table cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th class="main" scope="col"><?= $this->Paginator->sort('name') ?></th>
		<th scope="col"><?= $this->Paginator->sort('finished') ?></th>
		<th scope="col"><?= $this->Paginator->sort('endtime') ?></th>
		<th scope="col" class="actions"><?= __('Actions') ?></th>
	</tr>
</thead>
<tbody>
	<?php foreach ($auction as $bidtime): ?>
	<tr>
		<td><?= h($bidtime->name) ?></td>
		<td><?= h($bidtime->finished ? 'Finished':'') ?></td>
		<td><?= h($bidtime->endtime) ?></td>
		<td class="actions">
			<?= $this->Html->link->(__('View'), ['action' => 'view',$bidtime->id]) ?>
		</td>
	</tr>
	<?php endforeach; ?>
</tbody>
</table>
<div class="paginator">
	<ul>
		<?= $this->Paginator->first('<<' . __('first')) ?>
		<?= $this->Paginator->prev('<' . __('previous')) ?>
		<?= $this->Paginator->numbers() ?>
		<?= $this->Paginator->next(__('next') . '>') ?>
		<?= $this->Paginator->last(__('last') . '>>') ?>
	</ul>
</div>