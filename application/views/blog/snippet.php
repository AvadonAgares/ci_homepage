<article class="snippet">
<div class="title-wrapper">
    <span class="title">
        <?php echo '<a href="'.URL.'index.php/blog/post/'.$post_id.'">'.$title.'</a>';?>
    </span>
</div><div class="tag-wrapper">
    <ul class="tags">
        <?php foreach($tag_list as $tag) {
            echo '<li><a title="'.$tag.'">'.((strlen($tag) < 14) ? $tag : substr($tag, 0, 14).'>').'</a></li>';
        } ?>
    </ul>
</div><div class="body-wrapper">
    <div class="body">
        <?php echo ((strlen($body) < 1200) ? $body : substr($body, 0, 1200).'... <br/><a>Read Full</a>');?>
    </div>
</div>
</article>