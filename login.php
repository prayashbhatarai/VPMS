<?php
session_start();
$title = "Log In";
include("layout/top.php");
?>
    
    <!--------------------------------------[Log In Model Start]--------------------------------->
    <div class="modal" id="loginModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content bg-dark text-light">
                <!-- <div class="modal-header justify-content-center">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-car-side"></i>
                        &nbsp;
                        <i class="fa-solid fa-v"></i>
                        <i class="fa-solid fa-p"></i>
                        <i class="fa-solid fa-m"></i>
                        <i class="fa-solid fa-s"></i>
                    </h5>
                </div> -->
                <div class="d-flex justify-content-center mt-3">
                    <h5 class="modal-title">
                        <i class="fa-solid fa-car-side"></i>
                        &nbsp;
                        <i class="fa-solid fa-v"></i>
                        <i class="fa-solid fa-p"></i>
                        <i class="fa-solid fa-m"></i>
                        <i class="fa-solid fa-s"></i>
                    </h5>
                </div>
                <div class="modal-body">

                <?php include("layout/alert.php");?>

                    <!-----------------------------------------[Log In Form Start]------------------------------------------>
                    <form method="POST" action="loginaction.php" onsubmit="return validateLogIn()">
                        <div class="mb-3">
                            <!-- <label class="form-label">Email</label> -->
                            <div class="input-group md-3">
                                <span class="input-group-text border-2 border-black bg-dark text-light"><i class="fa-solid fa-envelope"></i></span>
                                <input id="email" type="text" class="form-control" name="email" placeholder="Username">
                            </div>
                            <div id="emailfeedback" class=""></div>
                        </div>
                        <div class="mb-3">
                            <!-- <label class="form-label">Password</label> -->
                            <div class="input-group md-3">
                                <span class="input-group-text border-2 border-black bg-dark text-light"><i class="fa-solid fa-key"></i></span>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div id="passwordfeedback" class=""></div>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" onclick="showLPassword()" class="form-check-input">
                            <label class="form-check-label">Show Password</label>
                        </div>
                        <input type="submit" class="btn btn-info" name="login" value="Log In">
                    </form>
                    <!-----------------------------------------[Log In Form End]-------------------------------------------->
                </div>
                <!-- <div class="modal-footer">
                    <div class="md-3">
                        <div id="emailHelp" class="form-text">Don't Have Account ?</div>
                    </div>
                    <a class="btn btn-outline-success" href="?url=VPMS/register">Register</a>
                </div> -->
            </div>
        </div>
    </div>
    <!--------------------------------------[Log In Model End]-------------------------------------->
    
<?php include("layout/down.php");?>