<h2></h2>
<!-- <?php dd($profile); ?> -->

<!-- <?php echo validation_errors(); ?> -->
<div class="row pt-3">
    <div class="col-md-8 offset-md-2">
        <?php echo form_open_multipart('guest/edit_skill_info', array('onsubmit' => 'return confirm(\'Are You sure you want to update?\')')); ?>

        <div class="form-group">
            <label for="">Programming Languages</label>
            <textarea class="form-control" name="p_langs"><?php echo set_value('p_langs', $skills->p_langs); ?></textarea>
            <small class="text-danger text-sm"><?php echo form_error('p_langs'); ?></small>
        </div>
        <div class="form-group">
            <label for="">Backend Frameworks</label>
            <textarea class="form-control" name="b_fmwks"><?php echo set_value('b_fmwks', $skills->b_fmwks); ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Frontend Frameworks</label>
            <textarea class="form-control" name="f_fmwks"><?php echo set_value('f_fmwks', $skills->f_fmwks); ?></textarea>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

        <input type="submit" name="submit" class="btn btn-primary" value="Update">
        <a href="<?php echo site_url('guest/skills'); ?>" class="btn btn-danger">Cancel</a>

        </form>
    </div>
</div>

</main>