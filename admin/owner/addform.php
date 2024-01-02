<?php 
session_start();
$title="Owner";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<!--------------------------------------------[Table Section Start]--------------------------------------------------->
<div class="card bg-dark">
  <div class="card-header bg-dark text-light border-bottom-5 border-dark">
    <span><i class="fa-solid fa-car"></i></span> Add Owner
  </div>
  <div class="card-body bg-light">
    <form method="POST" action="add.php">
    <legend class>Owner:</legend>
    <fieldset class="form-control border-4 border-black">
      <label>Name</label>
      <input type="text" class="form-control" name="name">
      <label>Age</label>
      <input type="text" class="form-control" name="age">
      <label>Gender</label>
      <select class="form-control" name="gender">
        <option value="Male" default>Male</options>
        <option value="Female">Female</options>
        <option value="Others">Others</options>
      </select>
      <label>Address</label>
      <input type="text" class="form-control" name="address">
      <label>Phone</label>
      <input type="text" class="form-control" name="phone">
      <label>Email</label>
      <input type="email" class="form-control" name="email">
    </fieldset>
      <hr>
      <div class="d-flex justify-content-end">
       <button type="submit" name="add" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Add</button>
      </div>
    </form>
  </div>
</div>
<!---------------------------------------------[Table Section End]---------------------------------------------------->

<?php include("../layout/down.php"); ?>