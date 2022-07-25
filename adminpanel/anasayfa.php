<?php
include 'header.php';
include 'yanmenu.php';

?>
  <div class="content-wrapper">
      <?php
            echo $_SESSION['user_token'];
      ?>
  </div>
<?php
include 'footer.php';
?>
