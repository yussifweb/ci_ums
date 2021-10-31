<h2></h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>Programming Languages</td>
                <td><?php echo $skills->p_langs; ?></td>
            </tr>
            <tr>
                <td>Frontend Frameworks</td>
                <td><?php echo $skills->f_fmwks; ?></td>
            </tr>
            <tr>
                <td>Backend Frameworks</td>
                <td><?php echo $skills->b_fmwks; ?></td>
            </tr>
        </tbody>
    </table>

    <a href="<?php echo site_url('guest/edit_skill_info'); ?>" class="btn btn-primary"><span data-feather="edit"></span>Edit</a>

</div>
</main>