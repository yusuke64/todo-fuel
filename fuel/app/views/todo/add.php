<?php
    $showTodoLink = html_tag('a', array(
        'href' => Uri::create('todo'),
    ), 'showTodo');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo Application - Add</title>
</head>
<body>
    <?php echo Form::open(array('action' => 'todo/add', 'method' => 'post')); ?>
    <div>
        <label>note</label>
        <?php echo Form::input('note','', array('placeholder' => 'ここにtodoを記入')); ?>
    </div>
    <?php echo Form::submit('post'); ?>
    <?php echo Form::close(); ?>
</body>
</html>