<main role="main" class="inner row cover text-center">
    <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart('account/login'); ?>
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">

                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username">
                    <small class="text-danger text-sm"><?php echo form_error('username'); ?></small>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
                    <small class="text-danger text-sm"><?php echo form_error('password'); ?></small>
                </div>

                <div class="card-footer">
                    <input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Login">
                </div>
            </div>
            </form>

            <p class="text-white mt-3">Don't have an account yet? <a class="btn btn-secondary btn-sm" href="<?php echo site_url(); ?>account/registration">Register</a></p>

        </div>
</main>