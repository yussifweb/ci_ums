<main role="main" class="inner cover text-center">

    <!-- <?php echo validation_errors(); ?> -->
    <?php echo form_open_multipart('account/registration'); ?>
    <div class="card">
        <div class="card-header">
            <h3>Profile Registration</h3>
        </div>
        <div class="card-body">

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

        </div>
        <div class="card-footer">
            <input type="submit" name="submit" class="btn btn-primary" value="Put Me On">
            <a href="<?php echo site_url('/'); ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
    </form>

    <p class="text-white mt-3">Already have an account? <a class="btn btn-secondary btn-sm" href="<?php echo site_url(); ?>account/login">Login</a></p>

</main>