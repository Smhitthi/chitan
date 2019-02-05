<link rel="stylesheet" type="text/css" href="../../webroot/css/auction.css">

<h2 class="text-center"> 「<?=$items->name ?>」の情報</h2>

<table class="vertical-table">
	<tr>
		<th scope="row">出品者</th>
		<td><?= $items->user ? $items->user->username : '' ?></td>
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

<!-- facebook -->
<div class="fb-like" data-href="http://copia.work/chitan/auction/view" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>


<h3>コメント</h3>
<h6>メッセージを送信する</h6>

	<?= $this->Form->create($msg) ?>
	<?= $this->Form->hidden('item_id', ['value' => $items->id]); ?>
	<?= $this->Form->hidden('user_id', ['value' => $authuser['id']]); ?>
	<?= $this->Form->texterea('message', ['rows'=>2], ['class' => 'commentButton']); ?>
	<br />
	<?= $this->Form->button('Submit'); ?>
	<?= $this->Form->end(); ?>
	<br />


<table cellpadding="0" cellspacing="0">
	<thead>	
		<tr>
			<th scope="col">送信者</th>
			<th class="main" scope="col">メッセージ</th>
			<th scope="col">送信時間</th>
		</tr>
	</thead>
	<tbody>
	<?php if (!empty($msg)): ?>
		<?php foreach ($msg as $msgs): ?>
		<tr>
			<td><?= h($msgs->user->username) ?></td>
			<td><?= h($msgs->message) ?></td>
			<td><?= h($msgs->created) ?></td>
		</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="3">※メッセージがありません</td>
	<?php endif; ?>
	</tbody>

	<!-- facebookいいねボタン(とりあえず) -->
	<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	</body>

</table>