<div class="panel panel-default">
    <div class="panel-heading">
        Add a new article
    </div>
    <div class="panel-body">

        <?php echo form_open(); ?>
        
        <?php echo form_label('Post Title', 'title'); ?>
        <?php echo form_input('title'); ?>
        
        <?php echo form_label('Post Body', 'body'); ?>
        <?php echo form_textarea('body'); ?>
        
        <?php echo form_submit('add-submit','Add Post');  ?>
        <?php echo form_close(); ?>
    </div>
</div>