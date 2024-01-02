<?php 
session_start();
$title="Owner";
include("../layout/checkuser.php");
include("../layout/top.php");
if(isset($_GET['id']))
{
        $id=$_GET['id'];
        $o = new Owner();
        $result = $o->getById($id);
        if($result != false)
        {
            ?>
            <div class="card bg-dark">
                <div class="card-header bg-dark text-light border-bottom-5 border-dark">
                    <span><i class="fa-solid fa-car"></i></span> Edit Owner
                </div>
                <div class="card-body bg-light">
                    <form method="POST" action="edit.php">
                    <legend class>Owner:</legend>
                    <fieldset class="form-control border-4 border-black">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $result->o_id; ?>">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $result->o_name; ?>">
                    <label>Age</label>
                    <input type="text" class="form-control" name="age" value="<?php echo $result->o_age; ?>">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                        <?php
                        if($result->o_gender=="Male")
                        {
                            ?>
                            <option value="Male" selected>Male</options>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value="Male">Male</options>
                            <?php
                        }
                        if($result->o_gender=="Female")
                        {
                            ?>
                            <option value="Female" selected>Female</options>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value="Female">Female</options>
                            <?php
                        }
                        if($result->o_gender=="Others")
                        {
                            ?>
                            <option value="Others" selected>Others</options>
                            <?php
                        }
                        else
                        {
                            ?>
                            <option value="Others">Others</options>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $result->o_address; ?>">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo $result->o_phone; ?>">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $result->o_email; ?>">
                    </fieldset>
                    <hr>
                    <div class="d-flex justify-content-end">
                    <button type="submit" name="edit" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Edit</button>
                    </div>
                    </form>
                </div>
                </div>
            <?php
        }
}
?>

<?php include("../layout/down.php"); ?>