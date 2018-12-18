<h2>スキルを出品する</h2>
<?= $this->Form->create($item) ?>
<fieldset>
	<legend>※商品情報を入力</legend>
	<?php
		echo $this->Form->hidden('user_id', ['value' => $authuser['id']]);
		echo '<p><strong>Username: ' .$authuser['username']. '</strong></p>';
		echo $this->Form->control('name');
		echo $this->Form->control('category');
		echo $this->Form->control('image');
		echo $this->Form->control('description');
	?>

</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
