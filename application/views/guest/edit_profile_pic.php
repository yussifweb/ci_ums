<h2></h2>
<!-- <?php dd($profile); ?> -->

<!-- <?php echo validation_errors(); ?> -->
<div class="row pt-3">
    <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart('guest/edit_profile_pic', array('onsubmit' => 'return confirm(\'Are You sure you want to update?\')')); ?>

        <div class="form-group">
            <label for="">Upload Profile Picture</label>
            <input type="file" class="form-control" name="pic" size="20">
            <small class="text-danger text-sm"><?php echo form_error('pic'); ?></small>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <input type="submit" name="submit" class="btn btn-primary" value="Update">
        <a href="<?php echo site_url('guest/person_info'); ?>" class="btn btn-danger">Cancel</a>

        </form>
    </div>
</div>

</main>