<?php
if(isset($_SESSION["notfication"]))
{
  foreach($_SESSION["notfication"] as $notification)
  {
    switch($notification["status"])
    {
      case("success"):
        {
          ?>
          <script>
            toastr.success('<?php echo$notification["text"];?>');
          </script>
          <?php
          break;
        }
      case("info"):
          {
            ?>
            <script>
              toastr.info('<?php echo$notification["text"];?>');
            </script>
            <?php
            break;
        }
      case("warning"):
          {
            ?>
            <script>
              toastr.warning('<?php echo$notification["text"];?>');
            </script>
            <?php
            break;
        }
      case("error"):
          {
            ?>
            <script>
              toastr.error('<?php echo$notification["text"];?>');
            </script>
            <?php
            break;
        }
    }
  }
  unset($_SESSION["notfication"]);
}
?>