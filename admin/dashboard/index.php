<?php 
session_start();
include("../layout/checkuser.php");
$title = "Dashboard";
include("../layout/top.php"); 
?>

<!-------------------------------------------------[Card Start]-------------------------------------------------->
<div class="row">
    <div class="col-md-3 mb-4 m-auto">
        <div class="card border-5 border-dark h-100 info-box">
            <div class="card-body text-success">
                <div class="d-flex">
                    <h1>
                    <?php
                    $vc = new VehicleCatagory();
                    $vctotal = $vc->getTotalNumber();
                    echo $vctotal;
                    ?>
                    </h1>
                    <h6 class="ms-auto text-light"><i class="fa-solid fa-car-bus h2"></i></h6>
                </div>
                <h6 class="text-light">Vehicle Catagories</h6>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 m-auto">
        <div class="card border-5 border-dark h-100 info-box">
            <div class="card-body text-danger">
                <div class="d-flex">
                    <h1>
                    <?php
                    $v = new Vehicle();
                    $vtotal = $v->getTotalNumber();
                    echo $vtotal;
                    ?>
                    </h1>
                    <h6 class="ms-auto text-light"><i class="fa-solid fa-car h2"></i></h6>
                </div>
                <h6 class="text-light">Vehicles</h6>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 m-auto">
        <div class="card border-5 border-dark h-100 info-box">
            <div class="card-body text-info">
                <div class="d-flex">
                    <h1>
                    <?php
                    $s = new Slot();
                    $stotal = $s->getTotalNumber();
                    echo $stotal;
                    ?>
                    </h1>
                    <h6 class="ms-auto text-light"><i class="fa-solid fa-distribute-spacing-horizontal h2"></i></h6>
                </div>
                <h6 class="text-light">Slots</h6>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4 m-auto">
        <div class="card border-5 border-dark h-100 info-box">
            <div class="card-body text-warning">
                <div class="d-flex">
                    <h1>
                    <?php
                    $o = new Owner();
                    $ototal = $o->getTotalNumber();
                    echo $ototal;
                    ?>
                    </h1>
                    <h6 class="ms-auto text-light"><i class="fa-solid fa-user-tie h2"></i></h6>
                </div>
                <h6 class="text-light">Owners</h6>
            </div>
        </div>
    </div>
</div>
<!--------------------------------------------------[Card End]--------------------------------------------------->


<div class="row">
        <div class="col-md-6 mb-3">
            <div class="card bg-dark">
                <div class="card-header bg-dark text-light border-bottom-5 border-light">
                    <span><i class="fa-solid fa-table"></i></span> Vechile 
                </div>
                <div class="card-body bg-dark">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" style="width: 100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>Total Vehicle</th>
                                    <th>
                                        <?php
                                        echo $v->getTotalNumber();
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="table-dark text-light">
                                <tr>
                                    <td><span class="badge rounded-pill bg-secondary">Parked</span></td>
                                    <td>
                                    <?php
                                        echo $v->getTotalParked();
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="badge rounded-pill bg-success">Unparked</span></td>
                                    <td>
                                    <?php
                                        echo $v->getTotalUnparked();
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card bg-dark">
                <div class="card-header bg-dark text-light border-bottom-5 border-light">
                    <span><i class="fa-solid fa-table"></i></span> Slot
                </div>
                <div class="card-body bg-dark">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" style="width: 100%">
                            <thead class="table-dark">
                                <tr>
                                <th>Total Slot</th>
                                <th>
                                    <?php
                                    echo $s->getTotalNumber();
                                    ?>
                                </th>
                                </tr>
                            </thead>
                            <tbody class="table-dark text-light">
                                <tr class="table-tr">
                                <td><span class="badge rounded-pill bg-secondary">Parked</span></td>
                                <td>
                                <?php
                                    echo $s->getTotalParked();
                                ?>
                                </td>
                                </tr>
                                <tr class="table-tr">
                                <td><span class="badge rounded-pill bg-success">Available</span></td>
                                <td>
                                <?php
                                    echo $s->getTotalAvailable();
                                ?>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--------------------------------------------[Chart Section Start]--------------------------------------------------->
<!-- <div class="row">
    <div class="col-md-5 mb-3 h-100">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-light border-bottom-5 border-light">
                <span><i class="fa-solid fa-chart-pie"></i></span> Vehicle Catagory
            </div>
            <div class="card-body bg-dark">
                <div id="chart1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-7 mb-3">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-light border-bottom-5 border-light">
                <span><i class="fa-solid fa-chart-column"></i></span> Vehicle Catagory
            </div>
            <div class="card-body bg-dark">
                <div id="barchart"></div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card bg-dark">
                <div class="card-header bg-dark text-light border-bottom-5 border-light">
                    <span><i class="fa-solid fa-table"></i></span> Recent Vechile
                </div>
                <div class="card-body bg-dark">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" style="width: 100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-dark text-light">
                                <tr class="table-tr">
                                    <td>1</td>
                                    <td>Prashant Bhandari</td>
                                    <td>Birtamode</td>
                                    <td><span class="badge rounded-pill bg-success">Active</span></td>
                                </tr>
                                <?php
                        for($i=0;$i<6;$i++)
                        {
                            ?>
                                <tr class="table-tr">
                                    <td>2</td>
                                    <td>Prayash Bhattrai</td>
                                    <td>Budhabarey</td>
                                    <td><span class="badge rounded-pill bg-black">Unactive</span></td>
                                </tr>
                                <?php
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card bg-dark">
                <div class="card-header bg-dark text-light border-bottom-5 border-light">
                    <span><i class="fa-solid fa-table"></i></span> Frequent Vehicle
                </div>
                <div class="card-body bg-dark">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover" style="width: 100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-dark text-light">
                                <tr class="table-tr">
                                    <td>1</td>
                                    <td>Prashant Bhandari</td>
                                    <td>Birtamode</td>
                                    <td><span class="badge rounded-pill bg-success">Active</span></td>
                                </tr>
                                <?php
                        for($i=0;$i<7;$i++)
                        {
                            ?>
                                <tr class="table-tr">
                                    <td>2</td>
                                    <td>Prayash Bhattrai</td>
                                    <td>Budhabarey</td>
                                    <td><span class="badge rounded-pill bg-black">Unactive</span></td>
                                </tr>
                                <?php
                        }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!---------------------------------------------[Chart Section End]---------------------------------------------------->

    <?php include("../layout/down.php") ?>