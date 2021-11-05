<h2></h2>
<!-- <?php dd($profile); ?> -->
<div class="table-responsive">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($users) && !empty($users)) {
                foreach ($users as $key => $row) {
                    $id = $row->user_id;
            ?>
                    <tr>
                        <th><?php echo fullname($row->fname, $row->mname, $row->lname, $row->xname); ?></th>
                        <td><?php echo $row->username; ?></td>
                        <td><?php echo ucfirst($row->role); ?></td>
                        <td>
                            <a class="btn btn-sm btn-success" href="<?php echo site_url('admin/activate_user/' . $id); ?>" onclick="return confirm('Are you sure you want to activate this user')">Activate</a>
                        </td>
                    </tr>

                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4" class="text-center">No record found</td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
    <!-- <a href="<?php echo site_url('guest/edit_person_info'); ?>" class="btn btn-primary"><span data-feather="edit"></span>Edit</a> -->
</div>
</main>