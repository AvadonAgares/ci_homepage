<article class="blog-post">
    <?php if ($_SESSION['user'] == 'Admin') { ?>
    <div class="admin">
        <?php 
            echo '<a title="'.URL.'index.php/blog/edit/'.$post_id.'" class="pull-right">(edit)</a>';
        ?>
    </div>
    <?php } ?>
    <div class="title-wrapper">
        <h2 class="title">
            <?php echo $title;?>
        </h2>
    </div>
    <div class="tag-wrapper">
        <ul class="tags">
        <?php foreach($tag_list as $tag) {
            echo '<li><a title="'.$tag.'">'.$tag.'</a></li>';
        } ?>
    </ul>
    </div>
    <div class="body-wrapper">
        <div class="body">
            <?php echo $body;?>
        </div>
    </div>
</article>