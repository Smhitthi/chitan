<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Items $item
 */
?>
<div class="container">
<h2 class="text-center">スキルを出品する</h2>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <?php
            echo $this->Form->hidden('user_id', ['value' => $authuser['id']]);
			echo '<p><strong>Username: ' .$authuser['username']. '</strong></p>';
			echo $this->Form->control('name', ['label' => 'スキル名']);
			echo $this->Form->select("category",
                                 [ "教養", "ブログ", "デザイン", "プログラミング", "イラスト", "文章", "音楽", "その他" ],
                                 [ "empty" => "カテゴリー" ]);
			echo $this->Form->control('description', ['label' => 'スキルの説明']);
            echo $this->Form->control('comment', ['label' => '求めるスキル']);
            echo $this->Form->file("image" , ['label' => '画像']);
			echo $this->Form->hidden('release', ['value' => '1111']);
			echo $this->Form->hidden('match_date', ['type' => 'date', 'value' => $time->format('Y-m-d H:i:s')]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <br />
</div>
</div>