<?php 
session_start();
$title="Slot";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<!--------------------------------------------[Table Section Start]--------------------------------------------------->
<div class="card bg-dark">
    <div class="card-header bg-dark text-light border-bottom-5 border-dark">
        <span><i class="fa-solid fa-table"></i></span> Slot
    </div>
    <form method="POST" action="deletemultiple.php">
    <div class="card-body bg-light">
        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fa-solid fa-circle-plus"></i> Add</a>
        <button type="submit" name="delete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i> Delete Multiple</button>
        <hr>
        <?php //include("../layout/alert.php"); ?>
        <div class="table-responsive">
            <table class="table table-sm table-hover dataTable" style="table-layout: auto;width: 100%">
                <thead class="table-success border-3 border-dark">
                    <tr>
                        <th class="col"><i class="fa-solid fa-circle-check"></i></th>
                        <th class="col">S.N.</th>
                        <th class="col">Title</th>
                        <th class="col">Status</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php
                        $count = 1;
                        $s = new Slot();
                        $result = $s->getAll();
                        if($result != 0)
                        {
                            foreach($result as $item)
                            {
                                ?>
                                 <tr class="align-middle">
                                    <td>
                                    <?php
                                    $pl = new Parklog();
                                    $plresult = $pl->hasSlot($item->s_id);
                                    if($plresult == true)
                                    {
                                        ?>
                                        <input class="form-check-input" type="checkbox" name="ids[]" value="<?php echo $item->s_id;?>" disabled>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <input class="form-check-input" type="checkbox" name="ids[]" value="<?php echo $item->s_id;?>">
                                        <?php                      
                                    }
                                    ?> 
                                    </td>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $item->s_title; ?></td>
                                    <td>
                                    <?php
                                    if($item->s_status == "P")
                                    {
                                        ?>
                                        <span class="badge rounded-pill bg-secondary">Parked</span>
                                        <?php
                                    }
                                    elseif($item->s_status == "A")
                                    {
                                        ?>
                                        <span class="badge rounded-pill bg-success">Available</span>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <span class="badge rounded-pill bg-danger">Error</span>
                                        <?php
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editModal" onclick="fillEdit(<?php echo $item->s_id; ?>,'<?php echo $item->s_title; ?>')">
                                            <span class="badge"><i class="fa-solid fa-pen-to-square"></i> Edit</span>
                                        </button>
                                        <?php
                                        if($plresult != true)
                                        {
                                            ?>
                                            <a href="delete.php?id=<?php echo $item->s_id; ?>" class="btn btn-danger btn-sm" disabled>
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

<!-----------------------------------------------[Add Modal Start]----------------------------------------------->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
        <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="add.php">
            <div class="modal-body">
            <div class="form-group">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    <label for="title">Title</label>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add" class="btn btn-outline-primary">Add</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!------------------------------------------------[Add Modal End]------------------------------------------------>
<!-----------------------------------------------[Edit Modal Start]----------------------------------------------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
        <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="edit.php">
            <div class="modal-body">
            <div class="form-group">
                <input type="hidden" name="id" id="editid" value="">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="edittitle" name="title" placeholder="Title">
                    <label for="title">Title</label>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-outline-success">Edit</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!------------------------------------------------[Edit Modal End]------------------------------------------------>
<script>
    //This function fills the edit form
    function fillEdit(id,title)
    {
        document.getElementById("editid").value = id;
        document.getElementById("edittitle").value = title;
    }
</script>