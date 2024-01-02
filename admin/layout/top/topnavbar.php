<!------------------------------------------[Top Navigation Bar Start]-------------------------------------------->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler bg-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
            aria-controls="offcanvasExample">
            <span data-bs-target="#sidebar">
                <!-----------i class="fa-solid fa-angles-right"></i----------->
                <i class="fa-solid fa-bars-sort"></i>
            </span>
        </button>
        <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="../dashboard">
            <i class="fa-solid fa-car-side"></i>
            &nbsp;
            <i class="fa-solid fa-v"></i>
            <i class="fa-solid fa-p"></i>
            <i class="fa-solid fa-m"></i>
            <i class="fa-solid fa-s"></i>
        </a>
        <button class="navbar-toggler bg-info" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
            aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-angles-down"></i>
        </button>
        <div class="collapse navbar-collapse" id="topNavBar">
            <!-- <form class="d-flex ms-auto my-4 my-lg-0">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form> --> 
            <ul class="d-flex ms-auto navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!------------------------------------------[Top Navigation Bar End]-------------------------------------------->