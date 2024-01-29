<?php
require_once('../layouts/header.php');
require_once __DIR__ . '/../../models/User.php';

$userModel = new User();
$users = $userModel->getAll();
?>

<div class="container">
    <h1 class="mx-3 my-5">Treatments</h1>

         <!-- Basic Bootstrap Table -->
         <div class="card">
                
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Treatments Fees</th>
                        <th>Registration fees</th>
                        <th>Status</th>

                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tbody>
                            <?php
                            foreach ($users as $key => $c) {
                            ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td> <?= $c['name'] ?? ""; ?> </td>
                                    <td> <?= $c['description'] ?? ""; ?> </td>
                                    <td class="text-capitalize"> <?= $c['permission'] ?? ""; ?> </td>
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
              <!--/ Basic Bootstrap Table -->

</div>

<?php
require_once('../layouts/footer.php');
?>