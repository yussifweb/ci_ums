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
                            <a class="btn btn-sm btn-info" href="<?php echo site_url('admin/edit_user/' . $id); ?>">Edit</a>
                            <?php
                            if ($id != $_SESSION['user_id']) {
                            ?>
                                <a class="btn btn-sm btn-danger" href="<?php echo site_url('admin/deactivate_user/' . $id); ?>" onclick="return confirm('Are you sure you want to deactivate this user')">Deactivate</a>
                            <?php
                            }
                            ?>
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
</div>
</main>