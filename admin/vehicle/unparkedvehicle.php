<?php 
session_start();
$title="Unparked Vehicle";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<!--------------------------------------------[Table Section Start]--------------------------------------------------->
<div class="card bg-dark">
    <div class="card-header bg-dark text-light border-bottom-5 border-dark">
        <span><i class="fa-solid fa-table"></i></span> Unparked Vehicle
    </div>
    <form method="POST" action="deletemultiple.php">
    <div class="card-body bg-light">
        <a class="btn btn-primary btn-sm" href="addform.php"><i class="fa-solid fa-circle-plus"></i> Add</a>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-hover dataTable" style="table-layout: auto;width: 100%">
                <thead class="table-success border-3 border-dark">
                    <tr>
                        <th class="col">S.N.</th>
                        <th class="col">Name</th>
                        <th class="col">Number</th>
                        <th class="col">Model</th>
                        <th class="col-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php
                        $count = 1;
                        $v = new Vehicle();
                        $result = $v->getUnparkedVehicle();
                        if($result != 0)
                        {
                            foreach($result as $item)
                            {
                                ?>
                                 <tr class="align-middle">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $item->v_name; ?></td>
                                    <td><?php echo $item->v_number; ?></td>
                                    <td><?php echo $item->v_model; ?></td>
                                    <td>
                                    <a onclick="fillpark(<?php echo $item->v_id; ?>)" class="btn btn-dark btn-sm" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#parkModal">
                                    <i class="fa-solid fa-truck-arrow-right"></i> Park
                                    </a>
                                    <a href="view.php?id=<?php echo $item->v_id; ?>" type="button" class="btn btn-secondary btn-sm" >
                                    <span class="badge"><i class="fa-solid fa-eye"></i> View</span>
                                    </a>
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

<!-----------------------------------------------[Park Modal Start]----------------------------------------------->
<div class="modal fade" id="parkModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-light">
        <div class="modal-header">
                <h5 class="modal-title">Park</h5>
                <button type="button" class="btn-close btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="park.php">
            <div class="modal-body">
            <div class="form-group">
            <input type="hidden" class="form-control" id="id" name="v_id">
            <select class="form-control" name="s_id">
            <option value="">--NO-SLOT-SELECTED--</option>
            <?php
              $s = new Slot();
              $result = $s->getAll();
              if($result != 0)
              {
                foreach($result as $item)
                {
                    if($item->s_status == "A")
                    {
                        ?>
                        <option value="<?php echo $item->s_id; ?>">
                          <?php echo $item->s_title; ?>
                        </option>
                      <?php
                    }
                }
              }
            ?>
          </select>
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="park" class="btn btn-outline-primary">Park</button>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!------------------------------------------------[Park Modal End]------------------------------------------------>

<script>
    //This function fills the park  form
    function fillpark(id)
    {
        document.getElementById("id").value = id;
    }
</script>