<?php
    $showTodoLink = html_tag('a', array(
        'href' => Uri::create('todo'),
    ), 'showTodo');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo Application - Delete</title>
</head>
<body>
    <?php echo Form::open(array('action' => "todo/delete/{$todoId}", 'method' => 'post')); ?>
    <?php echo Form::submit('post', '削除'); ?>
    <?php echo Form::close(); ?>
</body>
</html>