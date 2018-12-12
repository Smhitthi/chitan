<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->name . '/' . $this->request->action ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('auction.css') ?>
    <?= $this->Html->css('/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/bootstrap/css/demo.css') ?>
    <?= $this->Html->css('/bootstrap/css/nucleo-icons.css') ?>
    <?= $this->Html->css('/bootstrap/css/paper-kit.css') ?>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
 
        <!--ナビゲーションバーを水平方向に配置-->
        <div class="container">

            <!--ブランド名・ロゴを入れる-->
            <a class="navbar-brand" href="#">Copia</a>  

            <!--レスポンシブの際のハンバーガーメニューのボタン-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!--ナビバー内のメニュー-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- ハンバーガーメニューのボタンを動かすためには、
           　　　上記id="navbarSupportedContent"部分と<button>内に記述のある
           　　　data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
           　　　部分を一緒にする必要があります。-->
            
                <!--ナビバー内の検索フォーム-->
                    
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control ml-sm-5 mr-sm-2 my-auto" type="text" placeholder="スキル名orジャンルを入力" aria-label="検索">
                    <button class="btn btn-success btn-round" type="submit">検索</button>
                </form>

                <ul class="navbar-nav ml-auto">      
                    <li class="nav-item active">                        
                        <a class="nav-link" href="#"><i class="fas fa-home" aria-hidden="true"></i>&nbsp;TOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-comments" aria-hidden="true"></i>&nbsp;チャット</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-thumbs-up" aria-hidden="true"></i>&nbsp;NICE</a>
                    </li>
                    <li class="nav-item active">
                        <?=$this->Html->link('出品する',['action'=>'add',],['class'=>'btn btn-warning btn-round']); ?>
                    </li>
                    <li class="nav-item">
                        <?=$this->Html->link('ユーザー名: ' .$authuser['username'], ['action'=>'index',], ['class'=>'nav-link']); ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <div class="actions index medium-9 columns content">
            <?= $this->fetch('content') ?>
        </div>
        <nav class="large-2 medium-3 columns sidebar" id="actions-sidebar">
            <ul class="side-nav">
                <li class="heading"><?= __('メニュー') ?></li>
                <li><?= $this->Html->link(__('あなたの落札情報'), ['action' => 'home']) ?></li>
                <li><?= $this->Html->link(__('あなたの出品情報'), ['action' => 'home2']) ?></li>
                <li><?= $this->Html->link(__('商品を出品する'), ['action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('商品リストを見る'), ['action' => 'index']) ?></li>
            </ul>
        </nav>
    </div>
    <footer class="footer bg-primary text-white">
        <div class="container text-center">
            <div class="mx-auto my-auto">
                <br />
                <h1>Copia</h1>
                <nav class="footer-nav">
                    <ul>
                        <li><a href="#">利用規約</a></li>
                        <li><a href="#">プライバシーポリシー</a></li>
                        <li><a href="#">ご利用ガイド</a></li>
                        <li><a href="#">サイトマップ</a></li>
                        <li><a href="#">お知らせ</a></li>
                        <li><a href="#">お問い合わせ</a></li>
                    </ul>
                </nav>
                <p>©2018 Copia.All Rights Reserved</p>
                <br />
            </div>
        </div>
    </footer>
</body>
</html>