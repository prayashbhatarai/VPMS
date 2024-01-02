<?php 
session_start();
$title="Parked Vehicle";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<!--------------------------------------------[Table Section Start]--------------------------------------------------->
<div class="card bg-dark">
    <div class="card-header bg-dark text-light border-bottom-5 border-dark">
        <span><i class="fa-solid fa-table"></i></span> Parked Vehicle
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
                        $result = $v->getParkedVehicle();
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
                                        <a href="unpark.php?id=<?php echo $item->v_id; ?>" class="btn btn-dark btn-sm">
                                        <i id="outvehicle-icon" class="fa-solid fa-truck-arrow-right"></i> Unpark
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