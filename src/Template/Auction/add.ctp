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
            echo $this->Form->hidden( 'release', ['value' => 2019 ]);
			echo $this->Form->hidden('comment', ['value' => 'コメント']);
            // echo $this->Form->control('match_date', ['type' => 'datetime', 'value' => '何日前か']);            // echo $this->Form->hidden('match_date',
            //                          [
            //                            'label'      => '日付',
            //                            'type'       => 'date',
            //                            'dateFormat' => 'YMD',
            //                            'monthNames' => false,
            //                            'minYear'    => date('Y') - 3,
            //                            'value'      => date('Y-m-d')
            //                          ]
            //                        );
			echo $this->Form->hidden('match_date', ['type' => 'date', 'value' => $time->format('Y-m-d H:i:s')]);

        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>