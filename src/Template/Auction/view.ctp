<link rel="stylesheet" type="text/css" href="../../webroot/css/auction.css">

<h2 class="text-center" style=""><?= h($items->name) ?></h2>
<hr style="position: relative;
	height: 3px;
	border-width: 0;
	background-image: -webkit-linear-gradient(left,
	transparent 0%,#5bc0de 50%,transparent 100%);
	background-image:         linear-gradient(90deg,
	transparent 0%,#5bc0de 50%,transparent 100%);">

<table class="col-12 mx-auto">
	<tr>
		<td rowspan="4" style="width: 400px;"><?= h($items->image) ?></td>
		<th class="text-center" style="width: 150px;">出品者</th>
		<td><?= $items->user ? $items->user->username : '' ?></td>
	</tr>
	<tr>
		<th class="text-center">カテゴリ</th>
		<td><?= h($items->category) ?></td>
	</tr>
	<tr>
		<th class="text-center">スキルの説明</th>
		<td><?= h($items->description) ?></td>
	</tr>
	<tr>
		<th class="text-center">求めるスキル</th>
		<td><?= h($items->comment) ?></td>
	</tr>
</table>



<!--table class="vertical-table">
	<tr>
		<th scope="row">出品者</th>
		<td>< ?= $items->user ? $items->user->username : '' ?></td>
	</tr>
	<tr>
		<th scope="row">スキル名</th>
		<td>< ?= h($items->name) ?></td>
	</tr>
	<tr>
		<th scope="row">スキルの説明</th>
		<td>< ?= h($items->description) ?></td>
	</tr>
	<tr>
		<th scope="row">画像</th>
		<td>< ?= h($items->image) ?></td>
	</tr>
</table-->

<!-- facebook -->
<div class="fb-like pull-right" data-href="http://copia.work/chitan/auction/view" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>


<h3>コメント</h3>
<h6>メッセージを送信する</h6>

	<?= $this->Form->create($msg) ?>
	<?= $this->Form->hidden('item_id', ['value' => $items->id]); ?>
	<?= $this->Form->hidden('user_id', ['value' => $authuser['id']]); ?>
	<?= $this->Form->texterea('message', ['rows'=>2], ['class' => 'commentButton']); ?>
	<br />
	<?= $this->Form->button('Submit',['class' => 'btn btn-info pull-right btn-round']); ?>
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