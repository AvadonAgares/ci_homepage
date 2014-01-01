<html>
<head>
    <title><?php echo $title; ?> - Page Bonifaci</title>
    <link rel="stylesheet" href="<?php echo(CSS.'bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'global.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo(CSS.'/messages.css'); ?>">
</head>
<body>
<header>
    <div class="messages-container">
        <input type=checkbox />
        <div class="messages">
            <?php foreach($_SESSION['page_system']['messages'] as $message) { ?>
                <div class="message <?php echo $message['source']; ?>">
                    <div class="message-content">
                        <?php echo $message['content']; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <h1>Page Bonifaci</h1>
    <nav>
        <ul class="top-nav">
            <li class="<?php echo ($current == 'blog') ? 'current' : '';?>">
                <a href="<?php echo(URL.'index.php/blog/post/0');?>">Blog</a>
            </li>
            <li class="<?php echo ($current == 'projects') ? 'current' : '';?>">
                <a href="<?php echo(URL.'index.php/projects');?>">Projects</a>
            </li>
            <li class="<?php echo ($current == 'resume') ? 'current' : '';?>">
                <a href="<?php echo(URL.'index.php/resume');?>">Resume</a>
            </li>
        </ul>
    </nav>
</header>