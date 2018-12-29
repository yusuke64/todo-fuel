<header class="header">
    <h1 class="site-title">Fuel-ToDo</h1>
    <ul>
        <?php if(empty($name)){ ?>
        <li><?php echo $signupLink; ?></li>
        <li><?php echo $loginLink; ?></li>
        <?php }else{ ?>
        <li><?php echo $todoLink; ?></li>
        <li><?php echo $logoutLink; ?></li>
        <?php } ?>
    </ul>
</header>
