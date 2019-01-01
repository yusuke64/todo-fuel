<?php
    $signupLink = html_tag('a', array(
        'class' => 'menu-item-link',
        'href' => Uri::create('signup'),
    ), 'ユーザー登録');

    $loginLink = html_tag('a', array(
        'class' => 'menu-item-link',
        'href' => Uri::create('login'),
    ), 'ログイン');

    $logoutLink = html_tag('a', array(
        'class' => 'menu-item-link',
        'href' => Uri::create('logout'),
    ), 'ログアウト');
    $todoLink = html_tag('a', array(
        'class' => 'menu-item-link',
        'href' => Uri::create('todo'),
    ), 'ToDo');

    $name = Session::get('name');
?>

<header class="header">
    <h1 class="site-title">Fuel-ToDo</h1>
    <ul class="menu">
        <?php if ($name === null){ ?>
        <li class="menu-item"><?php echo $signupLink; ?></li>
        <li class="menu-item"><?php echo $loginLink; ?></li>
        <?php }else{ ?>
        <li class="menu-item"><?php echo $todoLink; ?></li>
        <li class="menu-item"><?php echo $logoutLink; ?></li>
        <?php } ?>
    </ul>
</header>
