<div class="panel panel-default add-post-panel">
    <div class="panel-heading">
        Add a new article
    </div>
    <div class="panel-body">

        <?php echo form_open(); ?>
        
        <div class="form-item title">
            <?php echo form_label('Post Title', 'title'); ?>
            <?php echo form_input(array('name'=>'title', 'class'=>'form-control')); ?>
        </div>
        
        <div class="form-item tags">
            <?php echo form_label('Post Tags', 'tags'); ?>
            <?php echo form_input(array(  
                    'name'=>'tags', 
                    'class'=>'form-control', 
                    'placeholder'=>'Separate tags with commas')
                ); ?>
        </div>
        
        <div class="form-item body">
            <?php echo form_label('Post Body', 'body'); ?>
            <?php echo form_textarea(array(  
                    'name'=>'body', 
                    'class'=>'form-control')
                ); ?>
        </div>
        
        <div class="form-item submit">
            <?php echo form_submit('add-submit','Add Post');  ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>