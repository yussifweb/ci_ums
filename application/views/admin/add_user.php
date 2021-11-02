<h2></h2>
<!-- <?php dd($profile); ?> -->

<!-- <?php echo validation_errors(); ?> -->
<div class="row pt-3">
    <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart('admin/add_user', array('onsubmit' => 'return confirm(\'Are You sure you want add user?\')')); ?>

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name">
                <small class="text-danger text-sm"><?php echo form_error('fname'); ?></small>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="mname" value="<?php echo set_value('mname'); ?>" placeholder="Middle Name(Optional)">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name">
                <small class="text-danger text-sm"><?php echo form_error('lname'); ?></small>
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" name="xname" value="<?php echo set_value('xname'); ?>" placeholder="Suffix Name(Optional)">
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
            <small class="text-danger text-sm"><?php echo form_error('username'); ?></small>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
            <small class="text-danger text-sm"><?php echo form_error('password'); ?></small>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password2" value="<?php echo set_value('password2'); ?>" placeholder="Confirm Password">
            <small class="text-danger text-sm"><?php echo form_error('password2'); ?></small>
        </div>
        
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <input type="submit" name="submit" class="btn btn-primary" value="Save">
        <a href="<?php echo site_url('admin/users_list'); ?>" class="btn btn-danger">Cancel</a>

        </form>
    </div>
</div>

</main>