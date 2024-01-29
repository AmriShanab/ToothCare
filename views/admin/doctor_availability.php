<?php
require_once('../layouts/header.php');
require_once __DIR__ . '/../../models/doctor_availability.php';

$userModel = new DoctorAvailable();
$availability = $userModel -> getAll();
?>

<div class="container">
    <h1 class="mx-3 my-5">Doctors Availability</h1>
    <section class="content m-3">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="">Day</th>
                                <th class="">session_from</th>
                                <th class="">session_to</th>
                                <th class="">doctor_id</th>
                                <th class="">Status</th>
                                <!-- <th style="width: 200px">Options</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($availability as $key => $c) {
                            ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td> <?= $c['day'] ?? ""; ?> </td>
                                    <td> <?= $c['session_from'] ?? ""; ?> </td>
                                    <td> <?= $c['session_to'] ?? ""; ?> </td>
                                    <td> <?= $c['doctor_id'] ?? ""; ?> </td>
                                    

                                    <td> </td>
                                    <td>
                                        <div class="">
                                            <?php if ($c['is_active'] == 1) { ?>
                                                <span class="badge bg-success">Enable</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Disable</span>
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button class="btn btn-sm btn-info m-2 edit-user" data-id="<?= $c['id']; ?>">Edit</button>
                                            <button class="btn btn-sm btn-danger m-2 delete-user" data-id="<?= $c['id']; ?>">Delete</button>

                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>

</div>


<?php
require_once('../layouts/footer.php');
?>