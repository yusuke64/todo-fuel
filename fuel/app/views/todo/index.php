<div class="main">
<?php $msg = Session::get_flash('slide-msg'); ?>
<?php if(!empty($msg)){ ?>
<p id="js-slide" class="slide-msg"><?php echo $msg ?></p>
<?php } ?>
<div class="todo">
    <p id="add-empty" class="slide-msg slide-msg-add">todoを記入してください！</p>
    <div class="add">
        <?php echo Form::open(array('action' => 'todo/add', 'method' => 'post')); ?>
        <?php echo Form::input('note','', array('type' => 'text', 'autocomplete' => 'off', 'placeholder' => 'ここにtodoを記入', 'class' => 'write')); ?>
        <?php echo Form::submit('post', '追加', array('type' => 'submit', 'class' => 'btn-add', 'id' => 'add')); ?>
        <?php echo Form::close(); ?>
    </div>
    <table class="list">
        <tbody>
            <?php foreach($todos as $todo): ?>
            <?php $todoId = $todo->id; ?>
            <tr class="item">
            <td class="container">
                <?php echo Form::open(array('action' => "todo/delete/{$todoId}", 'method' => 'post')); ?>
                <?php echo Form::submit('post', '削除', array('class' => 'btn-todo btn-delete')); ?>
                <?php echo Form::close(); ?>
            </td>
            <td class="container char"><?php echo Security::htmlentities($todo->note); ?></td>
            <td class="container">
                <?php echo Form::open(array('action' => "todo/done/{$todoId}", 'method' => 'post')); ?>
                <?php echo Form::submit('post', '完了', array('class' => 'btn-todo btn-finish')); ?>
                <?php echo Form::close(); ?>
            </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>