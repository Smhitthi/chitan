<h3 class="text-center">出品スキル一覧</h3>
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
			<?= $this->Html->link(__('詳細ページへ'), ['action' => 'view',$items->id]) ?>
		</td>
	</tr>
	<?php endforeach; ?>
	
</tbody>
</table>

<!--div class="paginator">
	<ul class="pagination">
		< ?= $this->Paginator->first('|<< ' . __('最初')) ?>
		< ?= $this->Paginator->prev('< ' . __('戻る')) ?>
		< ?= $this->Paginator->numbers() ?>
		< ?= $this->Paginator->next(__('次へ') . ' >') ?>
		< ?= $this->Paginator->last(__('最後') . ' >>|') ?>
	</ul>
</div-->

<nav class="text-center">
  <ul class="pagination">
  	<li class="page-item"><?= $this->Paginator->first('|<< ' . __('最初')) ?></li>
	<li class="page-item"><?= $this->Paginator->prev('< ' . __('戻る')) ?></li>
	<li class="page-item"><?= $this->Paginator->numbers() ?></li>
	<li class="page-item"><?= $this->Paginator->next(__('次へ') . ' >') ?></li>
	<li class="page-item"><?= $this->Paginator->last(__('最後') . ' >>|') ?></li>
  </ul>
</nav>
