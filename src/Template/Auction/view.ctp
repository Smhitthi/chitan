<h2> 「<?= $items->name ?>」の情報</h2>
<table class="vertical-table">
<tr>
	<th class="small" scope="row">出品者</th>
	<td><?= $items->has('user') ? $items->user->username : '' ?></td>
</tr>
<tr>
	<th scope="row">スキル名</th>
	<td><?= h($items->name) ?></td>
</tr>
<tr>
	<th scope="row">スキルの説明</th>
	<td><?= h($items->description) ?></td>
</tr>
<tr>
	<th scope="row">画像</th>
	<td><?= h($items->image) ?></td>
</tr>
</table>

