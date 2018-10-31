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
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- navbar サンプル1 -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
 
        <!--ナビゲーションバーを水平方向に配置-->
        <div class="container">

        <!--ブランド名・ロゴを入れる-->
        <a class="navbar-brand" href="#">Copia</a>  
    
            <!--レスポンシブの際のハンバーガーメニューのボタン-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <input class="form-control ml-sm-5 mr-sm-2" type="text" placeholder="Search" aria-label="検索">
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
                        <a href="#" target="_blank" class="btn btn-warning btn-round">出品する</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer-->
</body>
</html>
