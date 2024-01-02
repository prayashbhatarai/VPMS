<?php 
session_start();
$title="Owner";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<!--------------------------------------------[Table Section Start]--------------------------------------------------->
<div class="card bg-dark">
    <div class="card-header bg-dark text-light border-bottom-5 border-dark">
        <span><i class="fa-solid fa-user-tie"></i></span> Owner
    </div>
    <form method="POST" action="deletemultiple.php">
    <div class="card-body bg-light">
        <a class="btn btn-primary btn-sm" href="addform.php"><i class="fa-solid fa-circle-plus"></i> Add</a>
        <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete Multiple</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-hover dataTable" style="table-layout: auto;width: 100%">
                <thead class="table-success border-3 border-dark">
                    <tr>
                        <th class="col"><i class="fa-solid fa-circle-check"></i></th>
                        <th class="col">S.N.</th>
                        <th class="col">Name</th>
                        <th class="col">Age</th>
                        <th class="col">Gender</th>
                        <th class="col">Address</th>
                        <th class="col">Phone</th>
                        <th class="col">Email</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php
                        $count = 1;
                        $o = new Owner();
                        $result = $o->getAll();
                        if($result != 0)
                        {
                            foreach($result as $item)
                            {
                                ?>
                                 <tr class="align-middle">
                                    <td>
                                    <?php
                                    $vc = new Vehicle();
                                    $vcresult = $vc->hasOwner($item->o_id);
                                    if($vcresult == true)
                                    {
                                        ?>
                                        <input class="form-check-input" type="checkbox" name="ids[]" value="<?php echo $item->o_id;?>" disabled>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <input class="form-check-input" type="checkbox" name="ids[]" value="<?php echo $item->o_id;?>">
                                        <?php                      
                                    }
                                    ?>
                                    </td>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $item->o_name; ?></td>
                                    <td><?php echo $item->o_age; ?></td>
                                    <td><?php echo $item->o_gender; ?></td>
                                    <td><?php echo $item->o_address ?></td>
                                    <td><?php echo $item->o_phone; ?></td>
                                    <td><?php echo $item->o_email; ?></td>
                                    <td>
                                        <a href="editform.php?id=<?php echo $item->o_id; ?>" class="btn btn-success btn-sm">
                                            <span class="badge"><i class="fa-solid fa-pen-to-square"></i> Edit</span>
                                        </a>
                                        <?php
                                        if($vcresult != true)
                                        {
                                            ?>
                                            <a href="delete.php?id=<?php echo $item->o_id; ?>" class="btn btn-danger btn-sm" disabled>
                                            <span class="badge"><i class="fa-solid fa-trash-can"></i> Delete</span>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        </form>
    </div>
</div>
<!---------------------------------------------[Table Section End]---------------------------------------------------->

<?php include("../layout/notification.php"); ?>

<?php include("../layout/down.php"); ?>