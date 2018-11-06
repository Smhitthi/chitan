<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
	<fieldset>
	<div class="section bg-info">
        <div class="container">
            <div class="text-center">
                <div class="text-light">
                    <label>Copia</label>
                </div>
                <div class="text-light">
                    <label>ログイン</label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                    <div class="card card-register bg-light">
                        <form class="register-form">
                            <div class="input-group form-group-no-border">
								<label>ユーザー名</label>
                                <span class="input-group-addon">
                                    <i class="nc-icon nc-email-85"></i>
                                </span>

								<!--?= $this->Form->input('username') ?-->
                                <input type="text" name="username">
                            </div>

                            <div class="input-group form-group-no-border">
								<label>パスワード</label>
                                <span class="input-group-addon">
                                    <i class="nc-icon nc-key-25"></i>
                                </span>
								<!--?= $this->Form->input('password') ?-->
                                <input text="text" name="password">
                            </div>

                            <?= $this->Form->button(__('login')); ?>
                        </form>
                        <div class="forgot">
                                <a href="#" class="btn btn-link btn-info">パスワードをお忘れの方はこちら</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</fieldset>
<?= $this->Form->end() ?>
</div>