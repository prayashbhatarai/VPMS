<?php 
session_start();
$title="Report";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<!--------------------------------------------[Table Section Start]--------------------------------------------------->
<div class="card bg-dark">
    <div class="card-header bg-dark text-light border-bottom-5 border-dark">
        <span><i class="fa-solid fa-file"></i></span> Report
    </div>
    <form method="GET" action="index.php">
    <div class="card-body bg-light">
        <form method="POST" action="index.php">
            <div class="d-flex justify-content-center">
                From&nbsp;&nbsp;<input type="date" name="FromDate">&nbsp;&nbsp;To&nbsp;&nbsp;<input type="date" name="ToDate">&nbsp;&nbsp;<button class="btn btn-info" name="sort" type="submit">Search</button>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-hover dataTable" style="table-layout: auto;width: 100%">
                <thead class="table-success border-3 border-dark">
                    <tr>
                        <th class="col" colspan="1">S.N.</th>
                        <th class="col" colspan="1">Vehicle</th>
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
                    if(isset($_GET["sort"]))
                    {
                    if($_GET["FromDate"] != null && $_GET["ToDate"] != null)
                    {
                        $fromdate = $_GET["FromDate"];
                        $todate = $_GET["ToDate"];
                        ?>
                        <div class="d-flex justify-content-center">
                        Result : From&nbsp;&nbsp;<?php echo $fromdate; ?>&nbsp;&nbsp;To&nbsp;&nbsp;<?php echo $todate; ?>
                        </div>
                        <?php
                        $count = 1;
                        $pl = new Parklog();
                        $result = $pl->getBetweenTwoDate($fromdate, $todate);
                        if($result != false)
                        {
                            foreach($result as $item)
                            {
                                ?>
                                <tr class="align-middle">
                                    <td><?php echo $count; ?></td>
                                    <td><a class="btn btn-secondary" href="../vehicle/view.php?id=<?php echo $item->v_id; ?>">View</a></td>
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