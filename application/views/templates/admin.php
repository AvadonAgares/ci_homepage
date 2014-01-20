<nav class="admin-nav">
    <ul>
            <li >
                <a href="<?php echo(URL.'index.php/blog/add');?>">New Post</a>
            </li>
            <li >
                <a href="<?php echo(URL.'index.php/blog/all');?>">All Posts</a>
            </li>
            <?php if (isset($_SESSION['blog']['current_post'])) {?>
            <li >
                <a href="<?php echo(URL.'index.php/blog/edit/'
                    .$_SESSION['blog']['current_post']);?>">
                    Edit Post
                </a>
            </li>
            <?php } ?>
            <li >
                <a href="<?php echo(URL.'index.php/logout');?>">Logout</a>
            </li>
        </ul>
</nav>