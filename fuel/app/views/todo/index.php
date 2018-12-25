<!DOCTYPE html>
<html>
<head>
    <title>Todo</title>
    <?php echo Asset::css('app.css'); ?>
</head>
<body>
<div class="todo">
    <div class="add">
    <?php echo Form::open(array('action' => 'todo/add', 'method' => 'post')); ?>
    <?php echo Form::input('note','', array('placeholder' => 'ここにtodoを記入', 'class' => 'write')); ?>
    <?php echo Form::submit('post', '追加', array('class' => 'btn-add')); ?>
    <?php echo Form::close(); ?>
    </div>
    <table class="list">
    <tbody>
        <?php foreach($todos as $todo): ?>
        <?php $todoId = $todo->id; ?>
             <tr class="item">
                <td class="container">
                <?php echo Form::open(array('action' => "todo/delete/{$todoId}", 'method' => 'post')); ?>
                <?php echo Form::submit('post', '完了', array('class' => 'btn btn-finish')); ?>
                <?php echo Form::close(); ?>
                </td>
                <td class="container char"><?php echo $todo->note; ?></td>
                <td class="container">
                <?php echo Form::open(array('action' => "todo/delete/{$todoId}", 'method' => 'post')); ?>
                <?php echo Form::submit('post', '削除', array('class' => 'btn btn-delete')); ?>
                <?php echo Form::close(); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>