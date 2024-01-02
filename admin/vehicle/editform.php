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
    <span><i class="fa-solid fa-car"></i></span> Add Vehicle
  </div>
  <div class="card-body bg-light">
    <form method="POST" action="edit.php">
      <legend>Vehicle:</legend>
      <fieldset class="form-control border-4 border-black">
        <div class="row">
          <div class="col">
          <input type="hidden" class="form-control" name="id" value="<?php echo $result->v_id; ?>">
            <label>Vehicle Catagory</label>
            <select class="form-control" name="vc_id">
              <option value="">--NO-CATAGORY-SELECTED--</option>
              <?php
              $vc = new VehicleCatagory();
              $vcresult = $vc->getAll();
              if($vcresult != 0)
              {
                foreach($vcresult as $item)
                {
                  if($item->vc_id == $result->vc_id)
                  {
                    ?>
                    <option value="<?php echo $item->vc_id; ?>" selected>
                      <?php echo $item->vc_title; ?>
                    </option>
                    <?php
                  }
                  else
                  {
                    ?>
                    <option value="<?php echo $item->vc_id; ?>">
                      <?php echo $item->vc_title; ?>
                    </option>
                    <?php
                  }
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
              $oresult = $o->getAll();
              if($oresult != 0)
              {
                foreach($oresult as $item)
                {
                  if($item->o_id == $result->o_id)
                  {
                    ?>
                    <option value="<?php echo $item->o_id; ?>" selected>
                      <?php echo $item->o_name; ?>
                    </option>
                    <?php
                  }
                  else
                  {
                    ?>
                    <option value="<?php echo $item->o_id; ?>">
                      <?php echo $item->o_name; ?>
                    </option>
                    <?php
                  }
                }
              }
            ?>
            </select>
          </div>
          <div class="col">
            <label>Vehicle Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $result->v_name;?>">
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <label>Vehicle Number</label>
            <input type="text" class="form-control" name="number" value="<?php echo $result->v_number;?>">
          </div>
          <div class="col-6">
            <label>Vehicle Model</label>
            <input type="text" class="form-control" name="model" value="<?php echo $result->v_model;?>">
          </div>
        </div>
      </fieldset>
      <hr>
      <div class="d-flex justify-content-end">
        <button type="submit" name="edit" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-plus"></i>
          Edit</button>
      </div>
    </form>
  </div>
</div>
<?php
}
}
?>

<?php include("../layout/down.php"); ?>