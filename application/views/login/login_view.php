<div class="panel panel-default login-panel">
    <div class="panel-heading">
        Log In
    </div>
    <div class="panel-body">

        <?php echo form_open(); ?>
        
        <div class="form-item title">
            <?php echo form_label('Username', 'username'); ?>
            <?php echo form_input(
                    array(  'name'=>'username', 
                            'class'=>'form-control')
                  ); ?>
        </div>
        <div class="form-item title">
            <?php echo form_label('Password', 'password'); ?>
            <?php echo form_input(
                    array(  'name'=>'password', 
                            'class'=>'form-control', 
                            'type'=>'password')
                  ); ?>
        </div>
        
        <div class="form-item submit">
            <?php echo form_submit('login-submit','Log In or Register');  ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>