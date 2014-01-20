<div class="panel panel-default login-panel">
    <div class="panel-heading">
        Log In
    </div>
    <div class="panel-body">

        <?php 
            echo form_open();
            $errors = validation_errors(); 
            if (($errors)) {
                echo '<div class="alert alert-danger">';
                echo $errors;
                echo '</div';
            }
        
        ?>
        
        <div class="form-item title">
            <?php echo form_label('Username', 'username'); ?>
            <?php echo form_input(
                    array(  'name'  =>'username', 
                            'value' => set_value('username'),
                            'class' =>'form-control')); ?>
        </div>
        <div class="form-item title">
            <?php echo form_label('Password', 'password_1'); ?>
            <?php echo form_input(
                    array(  'name'  =>'password_1', 
                            'class' =>'form-control', 
                            'type'  =>'password')
                  ); ?>
        </div>
        
        <div class="form-item title">
            <?php echo form_label('Confirm Password', 'password_2'); ?>
            <?php echo form_input(
                    array(  'name'  =>'password_2', 
                            'class' =>'form-control', 
                            'type'  =>'password')
                  ); ?>
        </div>
        
        <div class="form-item submit">
            <?php echo form_submit('register-submit','Register');  ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>