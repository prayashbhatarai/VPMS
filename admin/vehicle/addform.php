<?php 
session_start();
$title="Vehicle";
include("../layout/checkuser.php");
include("../layout/top.php");
?>

<div class="card bg-dark">
  <div class="card-header bg-dark text-light border-bottom-5 border-dark">
    <span><i class="fa-solid fa-car"></i></span> Add Vehicle
  </div>
  <div class="card-body bg-light">
  <form method="POST" action="add.php">
  <legend>Vehicle:</legend>
    <fieldset class="form-control border-4 border-black">
      <div class="row">
        <div class="col">
          <label>Vehicle Catagory</label>
          <select class="form-control" name="vc_id">
            <option value="">--NO-CATAGORY-SELECTED--</option>
            <?php
              $vc = new VehicleCatagory();
              $result = $vc->getAll();
              if($result != 0)
              {
                foreach($result as $item)
                {
                  ?>
                    <option value="<?php echo $item->vc_id; ?>">
                      <?php echo $item->vc_title; ?>
                    </option>
                  <?php
                }
              }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col">
        <label>Owner</label>
          <select class="form-control" name="o_id">
            <option value="">--NO-OWNER-SELECTED--</option>
            <?php
              $o = new Owner();
              $result = $o->getAll();
              if($result != 0)
              {
                foreach($result as $item)
                {
                  ?>
                    <option value="<?php echo $item->o_id; ?>">
                      <?php echo $item->o_name; ?>
                    </option>
                  <?php
                }
              }
            ?>
          </select>
        </div>
        <div class="col">
          <label>Vehicle Name</label>
          <input type="text" class="form-control" name="name">
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label>Vehicle Number</label>
          <input type="text" class="form-control" name="number">
        </div>
        <div class="col-6">
          <label>Vehicle Model</label>
          <input type="text" class="form-control" name="model">
        </div>
      </div>
    </fieldset>
    <hr>
      <div class="d-flex justify-content-end">
       <button type="submit" name="add" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i> Add</button>
      </div>
      </form>
  </div>
</div>

<?php include("../layout/down.php"); ?>