<h2>スキルを出品する</h2>
<div class="form">
<?php 
	echo $this->Form->create($item, [
    'type' => 'post',
    'url' => ['controller' => 'Auction', 'action' => 'add'],
  ]);

	echo $this->Form->hidden('user_id', ['value' => $authuser['id']]);
	echo '<p><strong>Username: ' .$authuser['username']. '</strong></p>';
	echo $this->Form->control('name', ['label' => '名前']);
	echo $this->Form->control('category', ['label' => 'カテゴリー']);
	echo $this->Form->control('image', ['label' => '画像']);
	echo $this->Form->control('description', ['label' => '説明']);
	echo $this->Form->control('release', ['label' => '何日前か']);
	echo $this->Form->control('comment', ['label' => 'コメント']);
	echo $this->Form->control('match_date', ['datetime' => 'マッチ日']);

	echo $this->Form->button(__('Submit'));
	echo $this->Form->end();
?>
</div>