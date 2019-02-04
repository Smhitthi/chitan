<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
	<fieldset>
<!--         <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->button('login')?> -->
	<div class="section bg-primary">
        <div class="container">
            <div class="row">
                    <div class="card card-register bg-light col-md-8 my-auto mx-auto">
                        <form class="register-form">
                            <div class="input-group form-group-no-border">
                                <span class="input-group-addon">
                                    <i class="nc-icon nc-email-85"></i>
                                </span>
                                <!--?= $this->Form->input('username') ?-->
                                <?= $this->Form->input('username',array('style' => 'width:220px'))?>
                                <!-- ,['class'=>'form-control-info']?> -->
                            </div>

                            <div class="input-group form-group-no-border">
                                <span class="input-group-addon">
                                    <i class="nc-icon nc-key-25"></i>
                                </span>
                                <!--?= $this->Form->input('password') ?-->
                                <?= $this->Form->input('password',array('style' => 'width:220px'))?>
                                <!-- ['class'=>'form-control-info'] ?> -->
                            </div>

                            <?= $this->Form->button('login',['class'=>'btn btn-info btn-block btn-round'])?>
                        </form>
                        <div class="forgot">
                                <a href="#" class="btn btn-link btn-info">パスワードをお忘れの方はこちら</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
	</fieldset>
<?= $this->Form->end() ?>
</div>