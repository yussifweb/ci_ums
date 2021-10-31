<h2></h2>
<!-- <?php dd($profile); ?> -->
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>First Name</td>
                <td><?php echo fullname($profile->fname, $profile->mname, $profile->lname, $profile->xname); ?></td>
            </tr>
            <!-- <tr>
                <td>Middle name</td>
                <td><?php echo $profile->mname; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $profile->lname; ?></td>
            </tr>
            <tr>
                <td>Suffix Name</td>
                <td><?php echo $profile->xname; ?></td>
            </tr> -->
            <tr>
                <td>Username</td>
                <td><?php echo $profile->username; ?></td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td><?php echo $profile->person_info->dob; ?></td>
            </tr>
            <tr>
                <td>Place Of Birth</td>
                <td><?php echo $profile->person_info->pob; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $profile->person_info->gender; ?></td>
            </tr>
            <tr>
                <td>Civil Status</td>
                <td><?php echo $profile->person_info->status; ?></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><?php echo $profile->person_info->contact; ?></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><?php echo $profile->person_info->email; ?></td>
            </tr>
        </tbody>
    </table>

    <a href="<?php echo site_url('guest/edit_person_info'); ?>" class="btn btn-primary"><span data-feather="edit"></span>Edit</a>
</div>
</main>