<?php
    $showTodoLink = html_tag('a', array(
        'href' => Uri::create('todo'),
    ), 'showTodo');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo Application - Update</title>
</head>
<body>
    <?php echo $showTodoLink; ?>
    <?php echo Form::open(array('action' => "todo/update/{$todoId}", 'method' => 'post')); ?>
    <div>
        <label>note</label>
        <?php echo Form::input('note', 'default_value'); ?>
    </div>
    <?php echo Form::submit('post'); ?>
    <?php echo Form::close(); ?>
</body>
</html>