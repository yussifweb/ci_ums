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
            <tr>
                <th>1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <!-- <a class="btn btn-sm btn-info" href="#">Edit</a> -->
                    <a class="btn btn-sm btn-success" href="#" onclick="return confirm('Are you sure you want to activate this user')">Activate</a>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th>3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
    <!-- <a href="<?php echo site_url('guest/edit_person_info'); ?>" class="btn btn-primary"><span data-feather="edit"></span>Edit</a> -->
</div>
</main>