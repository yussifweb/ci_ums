<div class="row pt-3">
    <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart('', array('onsubmit' => 'return confirm(\'Are You sure you want to update?\')')); ?>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname', $user->fname); ?>" placeholder="First Name">
                <small class="text-danger text-sm"><?php echo form_error('fname'); ?></small>
            </div>
            <div class="form-group col-md-6">
                <label for="">Middle name</label>
                <input type="text" class="form-control" name="mname" value="<?php echo set_value('mname', $user->mname); ?>" placeholder="Middle Name(Optional)">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname', $user->lname); ?>" placeholder="Last Name">
                <small class="text-danger text-sm"><?php echo form_error('lname'); ?></small>
            </div>
            <div class="form-group col-md-6">
                <label for="">Suffix Name</label>
                <input type="text" class="form-control" name="xname" value="<?php echo set_value('xname', $user->xname); ?>" placeholder="Suffix Name(Optional)">
            </div>
        </div>

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo set_value('username', $user->username); ?>" placeholder="Username">
            <small class="text-danger text-sm"><?php echo form_error('username'); ?></small>
        </div>

        <div class="form-group">
            <select name="role" id="role" class="form-control">
                <option value="">Select a Role</option>
                <option <?php echo ($user->role == USER_ROLE_ADMIN) ? 'selected' : ''; ?> value="<?php echo USER_ROLE_ADMIN; ?>">Administrator</option>
                <option <?php echo ($user->role == USER_ROLE_MANAGER) ? 'selected' : ''; ?> value="<?php echo USER_ROLE_MANAGER; ?>">Manager</option>
                <option <?php echo ($user->role == USER_ROLE_VISITOR) ? 'selected' : ''; ?> value="<?php echo USER_ROLE_VISITOR; ?>">Visitor</option>
            </select>
            <small class="text-danger text-sm"><?php echo form_error('role'); ?></small>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>">
        
        <input type="submit" name="update" class="btn btn-primary" value="Update">
        <a href="<?php echo site_url('admin/users_list'); ?>" class="btn btn-danger">Cancel</a>

        </form>
    </div>
</div>

</main>