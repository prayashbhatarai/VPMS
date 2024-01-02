<?php
if(isset($_SESSION["notfication"]))
{
  foreach($_SESSION["notfication"] as $message)
  {
  ?>
  <div class="alert alert-dismissible alert-<?php echo $message["status"]; ?>">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <p>
        <?php 
        echo $message["text"];
        ?>
      </p>
    </div>
  <?php
  }
  unset($_SESSION["notfication"]);
}
?>