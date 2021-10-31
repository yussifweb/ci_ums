<h2></h2>
<!-- <?php dd($profile); ?> -->

<!-- <?php echo validation_errors(); ?> -->
<div class="row pt-3">
    <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart('guest/edit_person_info', array('onsubmit' => 'return confirm(\'Are You sure you want to update?\')')); ?>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo set_value('fname', $profile->fname); ?>" placeholder="First Name">
                <small class="text-danger text-sm"><?php echo form_error('fname'); ?></small>
            </div>
            <div class="form-group col-md-6">
                <label for="">Middle name</label>
                <input type="text" class="form-control" name="mname" value="<?php echo set_value('mname', $profile->mname); ?>" placeholder="Middle Name(Optional)">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname', $profile->lname); ?>" placeholder="Last Name">
                <small class="text-danger text-sm"><?php echo form_error('lname'); ?></small>
            </div>
            <div class="form-group col-md-6">
                <label for="">Suffix Name</label>
                <input type="text" class="form-control" name="xname" value="<?php echo set_value('xname', $profile->xname); ?>" placeholder="Suffix Name(Optional)">
            </div>
        </div>

        <div class="form-group">
            <label for="">Date of Birth</label>
            <input type="text" class="form-control" name="dob" value="<?php echo set_value('dob', $profile->person_info->dob); ?>" placeholder="Date of Birth">
            <small class="text-danger text-sm"><?php echo form_error('dob'); ?></small>
        </div>
        <div class="form-group">
            <label for="">Place of Birth</label>
            <input type="text" class="form-control" name="pob" value="<?php echo set_value('pob', $profile->person_info->pob); ?>" placeholder="Place of Birth">
            <small class="text-danger text-sm"><?php echo form_error('pob'); ?></small>
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <input type="text" class="form-control" name="gender" value="<?php echo set_value('gender', $profile->person_info->gender); ?>" placeholder="Gender">
            <small class="text-danger text-sm"><?php echo form_error('gender'); ?></small>
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <input type="text" class="form-control" name="status" value="<?php echo set_value('status', $profile->person_info->status); ?>" placeholder="Status">
            <small class="text-danger text-sm"><?php echo form_error('status'); ?></small>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo set_value('email', $profile->person_info->email); ?>" placeholder="Email">
            <small class="text-danger text-sm"><?php echo form_error('email'); ?></small>
        </div>
        <div class="form-group">
            <label for="">Contact</label>
            <input type="text" class="form-control" name="contact" value="<?php echo set_value('contact', $profile->person_info->contact); ?>" placeholder="Contact">
            <small class="text-danger text-sm"><?php echo form_error('contact'); ?></small>
        </div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <input type="submit" name="submit" class="btn btn-primary" value="Update">
        <a href="<?php echo site_url('guest/person_info'); ?>" class="btn btn-danger">Cancel</a>

        </form>
    </div>
</div>

</main>