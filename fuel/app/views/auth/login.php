<div class="main">
<?php $msg = Session::get_flash('slide-msg'); ?>
<?php if(!empty($msg)){ ?>
<p id="js-slide" class="slide-msg"><?php echo $msg ?></p>
<?php } ?>
    <section class="form">
        <h1 class="title">ログイン</h1>
            <ul class="error">
                <?php if(!empty($e_msg)){ ?>
                <li class="error-msg"><?php echo $e_msg ?></li>
                <?php } ?>
                <?php if(!empty($error)){ ?>
                <?php foreach($error as $val){ ?>
                <li class="error-msg"><?php echo $val ?></li>
                <?php } }?>
            </ul>
        <div class="form-area">
            <?php echo Form::open(array('action' => 'login/index', 'method' => 'post')); ?>
            <?php echo Form::input('name', '', array('type' => 'text', 'autocomplete' => 'off', 'placeholder' => 'NAME', 'class' => 'user')); ?>
            <?php echo Form::input('pass', '', array('type' => 'password', 'placeholder' => 'パスワード', 'class' => 'user')); ?>
            <?php echo Form::submit('post', 'ログイン', array('class' => 'btn btn-user user')); ?>
            <?php echo Form::close(); ?>
        </div>
    </section>
</div>
