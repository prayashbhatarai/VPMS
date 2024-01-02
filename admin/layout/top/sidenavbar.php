<!-----------------------------------------[Side Navigation Bar Start]------------------------------------------>
<!--Offcanvas-->
<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 my-4">
                        Home
                    </div>
                </li>
                <li>
                    <a href="../dashboard" class="nav-link px-3 <?php echo ($title == "Dashboard") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>">
                        <span class="me-2">
                            <i class="fa-solid fa-desktop"></i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link <?php echo ($title == "Owner") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>" data-bs-toggle="collapse" href="#owner">
                        <span class="me-2">
                            <i class="fa-solid fa-user-tie"></i>
                        </span>
                        <span>Owner</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="owner">
                        <ul class="navbar-nav ps-3 bg-black">
                            <li>
                                <a href="../owner/addform.php" class="nav-link px-3">
                                    <span class="me-2"><i class="fa-solid fa-circle-plus"></i></span>
                                    <span>Add Owner</span>
                                </a>
                                <a href="../owner/index.php" class="nav-link px-3">
                                    <span class="me-2"><i class="fa-solid fa-sliders"></i></span>
                                    <span>Manage Owner</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 my-4">
                        Vehicle
                    </div>
                </li>
                <li>
                    <a href="../vehiclecatagory" class="nav-link px-3 sidebar-link <?php echo ($title == "Vehicle Catagory") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>">
                        <span class="me-2">
                            <i class="fa-solid fa-car-bus"></i>
                        </span>
                        <span>Vehicle Catagory</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link px-3 sidebar-link <?php echo ($title == "Vehicle") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>" data-bs-toggle="collapse" href="#vechile">
                        <span class="me-2">
                            <i class="fa-solid fa-car"></i>
                        </span>
                        <span>Vehicle</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="vechile">
                        <ul class="navbar-nav ps-3 bg-black">
                            <li>
                                <a href="../vehicle/addform.php" class="nav-link px-3">
                                    <span class="me-2"><i class="fa-solid fa-circle-plus"></i></span>
                                    <span>Add Vehicle</span>
                                </a>
                                <a href="../vehicle" class="nav-link px-3">
                                    <span class="me-2"><i class="fa-solid fa-sliders"></i></span>
                                    <span>Manage Vehicle</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 my-4">
                        Parking
                    </div>
                </li>
                <li>
                    <a href="../vehicle/parkedvehicle.php" class="nav-link px-3 <?php echo ($title == "Parked Vehicle") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>">
                        <span class="me-2"><i class="fa-solid fa-truck-arrow-right"></i></span>
                        <span>Parked Vehicle</span>
                    </a>
                </li>
                <li>
                    <a href="../vehicle/unparkedvehicle.php" class="nav-link px-3 <?php echo ($title == "Unparked Vehicle") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>">
                        <span class="me-2"><i id="outvehicle-icon" class="fa-solid fa-truck-arrow-right"></i></span>
                        <span>Unparked Vehicle</span>
                    </a>
                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3 my-4">
                        Others
                    </div>
                </li>
                <li>
                    <a href="../slot" class="nav-link px-3 <?php echo ($title == "Slot") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>">
                        <span class="me-2"><i class="fa-solid fa-distribute-spacing-horizontal"></i></span>
                        <span>Slot</span>
                    </a>
                </li>
                <li>
                    <a href="../report" class="nav-link px-3 <?php echo ($title == "Report") ? 'btn-outline-warning text-black active' : 'btn-outline-secondary' ?>">
                        <span class="me-2"><i class="fa-solid fa-file"></i></span>
                        <span>Report</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!--Offcanvas-->
<!------------------------------------------[Side Navigation Bar End]-------------------------------------------->