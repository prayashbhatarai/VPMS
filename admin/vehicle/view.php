<?php 
session_start();
$title="Vehicle";
include("../layout/checkuser.php");
include("../layout/top.php");

if(isset($_GET['id']))
{
        $id=$_GET['id'];
        $v = new Vehicle();
        $result = $v->getById($id);
        if($result != false)
        {
            ?>
            <div class="card bg-dark">
                <div class="card-header bg-dark text-light border-bottom-5 border-dark">
                    <span><i class="fa-solid fa-car"></i></span> Details
                </div>
                <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card bg-dark border-2 border-black">
                            <div class="card-header bg-dark text-light border-bottom-5 border-dark">
                                Vehicle
                            </div>
                            <div class="card-body bg-light">
                                <p>Name : <?php echo $result->v_name ?><p>
                                <p>Number : <?php echo $result->v_number ?><p>
                                <p>Model : <?php echo $result->v_model ?><p>
                                <p>Status : 
                                <?php
                                    if($result->v_status == "P")
                                    {
                                        ?>
                                        <span class="badge rounded-pill bg-secondary">Parked</span>
                                        <?php
                                    }
                                    elseif($result->v_status == "U")
                                    {
                                        ?>
                                        <span class="badge rounded-pill bg-success">Unparked</span>
                                        <?php
                                    }
                                    elseif($result->v_status == "A")
                                    {
                                        ?>
                                        <span class="badge rounded-pill bg-info">Added</span>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card bg-dark border-2 border-black">
                            <div class="card-header bg-dark text-light border-bottom-5 border-dark">
                                Owner
                            </div>
                            <div class="card-body bg-light">
                                <?php
                                $o = new Owner();
                                $owner = $o->getById($result->o_id);
                                ?>
                                <p>Name : <?php echo $owner->o_name ?><p>
                                <p>Age : <?php echo $owner->o_age ?><p>
                                <p>Gender : <?php echo $owner->o_gender ?><p>
                                <p>Address : <?php echo $owner->o_address ?><p>
                                <p>Phone : <?php echo $owner->o_phone ?><p>
                                <p>Email : <?php echo $owner->o_email ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                <table class="table table-sm table-hover dataTable" style="table-layout: auto;width: 100%">
                    <thead class="table-success border-3 border-dark">
                        <tr>
                            <th class="col" colspan="1">S.N.</th>
                            <th class="col" colspan="1">Slot</th>
                            <th class="col" colspan="2">Checkin</th>
                            <th class="col" colspan="2">Checkout</th>
                            <th class="col">Status</th>
                        </tr>
                        <tr class="table-dark">
                            <th class="col"></th>
                            <th class="col"></th>
                            <th class="col">Date</th>
                            <th class="col">Time</th>
                            <th class="col">Date</th>
                            <th class="col">Time</th>
                            <th class="col"></th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        <?php
                            $count = 1;
                            $pl = new Parklog();
                            $parklogdetails = $pl->getVehicleAllLogById($result->v_id);
                            if($parklogdetails != false)
                            {
                                foreach($parklogdetails as $item)
                                {
                                    ?>
                                    <tr class="align-middle">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $item->s_id; ?></td>
                                        <td><?php echo $item->p_checkin_date; ?></td>
                                        <td><?php echo $item->p_checkin_time; ?></td>
                                        <td><?php echo $item->p_checkout_date; ?></td>
                                        <td><?php echo $item->p_checkout_time; ?></td>
                                        <td>
                                        <?php
                                            if($item->p_status=="D")
                                            {
                                                ?>
                                                <span class="badge rounded-pill bg-success">Done</span>
                                                <?php
                                            } 
                                            elseif($item->p_status=="P")
                                            {
                                                ?>
                                                <span class="badge rounded-pill bg-secondary">Parked</span>
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
                </div>
            </div>
            <?php
        }
}
?>

<?php include("../layout/down.php"); ?>