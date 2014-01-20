<div class="panel panel-default login-panel">
    <div class="panel-heading">
        Log In
    </div>
    <div class="panel-body">

        <div class="alert alert-danger">
        <?php 
            $errors = validation_errors(); 
            if (($errors)) {
                echo '';
                echo $errors;
                echo '';
            }
        ?>
        </div
        
        <?php echo form_open(); ?>
        
        <div class="form-item title">
            <?php echo form_label('Username', 'username'); ?>
            <?php echo form_input(
                    array(  'name'  =>'username', 
                            'value' => set_value('username'),
                            'class' =>'form-control')); ?>
        </div>
        
        <div class="form-item title">
            <?php echo form_label('Email', 'email'); ?>
            <?php echo form_input(
                    array(  'name'  =>'email', 
                            'value' => set_value('email'),
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
            
        </div>
        <?php echo form_close(); ?>
    </div>
</div>