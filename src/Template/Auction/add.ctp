<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Items $item
 */
?>
<h2>スキルを出品する</h2>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Items') ?></legend>
        <?php
            echo $this->Form->hidden('user_id', ['value' => $authuser['id']]);
			echo '<p><strong>Username: ' .$authuser['username']. '</strong></p>';
			echo $this->Form->control('name', ['label' => '名前']);
			echo $this->Form->control('image', ['label' => '画像']);
			echo $this->Form->control('category', ['label' => 'カテゴリー']);
			echo $this->Form->control('description', ['label' => '説明']);
			echo $this->Form->control('release', ['label' => 'リリース日']);
			echo $this->Form->control('comment', ['label' => 'コメント']);
			echo $this->Form->control('match_date', [ 'type' => 'datetime','label' => '説明']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>