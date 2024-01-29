<?php
  session_start();
  include 'navbar.php';
  require 'model/db.php';
?>
<section class="section">
  <div class="container">
    <h5><i class="fas fa-box blue-text"></i> Locker List</h5>
    <div class="divider"></div><br>

    <div class="row">
      <div class="col s12 m9">
        <div class="row">
          <?php
            $sql = "SELECT * FROM `locker`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)):
          ?>
          <div class='col s6 m3'>
            <div class='card'>
              <div class='card-image'>
                <img src='img/locker1.png' class='responsive-img' alt='locker'>
              </div>
              <div class='card-action'>
                <input type="hidden" name="id" value="<?php echo $row['locker_id']; ?>">
                <div><?php echo $row['locker_id']; ?></div>
                <div>RM 1/day</div>
                <div class="<?php switch ($row['locker_status']) {
                  case 'Available':
                    echo 'green-text';
                    break;
                  case 'Booked':
                    echo 'blue-text';
                    break;
                  case 'Damage':
                    echo 'red-text';
                    break;
                  default:
                    echo 'black-text';
                    break;
                } ?>"><?php echo $row['locker_status'] ?></div><br>
                <?php if ($row['locker_status'] == 'Available'): ?>
                  <div class="center">
                    <a href="booking.php?id=<?php echo $row['locker_id']; ?>" class="btn blue">Book</a>
                  </div>
                <?php else: ?>
                  <div class="center">
                    <a href='' class='btn disabled'>Book</a>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>
          <?php endwhile ?>
        </div>
      </div>

      <div class="col s12 m3">
        <div class="row">
          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-box"></i> Lockers
            </li>
            <?php
              $sql = "SELECT COUNT(locker_id) as total from `locker`";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Total: <span class='secondary-content'>".$row['total']."</span></li>";

              $sql = "SELECT COUNT(locker_status) as available from `locker` WHERE locker_status='Available'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Available: <span class='secondary-content green-text'>".$row['available']."</span></li>";

              $sql = "SELECT COUNT(locker_status) as booked from `locker` WHERE locker_status='Booked'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Booked: <span class='secondary-content'>".$row['booked']."</span></li>";

              $sql = "SELECT COUNT(locker_status) as damage from `locker` WHERE locker_status='Damage'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_array($result);
              echo "<li class='collection-item'>Damage: <span class='secondary-content red-text'>".$row['damage']."</span></li>";
            ?>
          </ul>
        </div>
        <div class="row">
          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-info-circle"></i> Notification
            </li>
            <li>
              <p style="padding:0 1em;">Please <a href="register.php">register</a> first before you make any booking, once booked print the receipt and bring the receipt for payment at counter receptionist.<br>
              <span style="color:red">Please make sure to place your booking before two days.</span></p>
            </li>
          </ul>
        </div>
        <div class="row">
          <ul class="collection with-header z-depth-1">
            <li class="collection-header blue white-text">
              <i class="fas fa-map-marker"></i> Contact us
            </li>
            <!-- <li>
              <img class="responsive-img" src="img/contact_us.jpeg" alt="contact">
            </li> -->
            <li>
              <p style="padding:0 1em;">
                Universiti of Vavniya,<br>
                Pampaimadu, Vavniya,<br>
                Sri Lanka.<br><br>
                <i class="fas fa-phone"></i>&nbsp;&nbsp;+94 24 222 2264<br>
                <i class="fas fa-fax"></i>&nbsp;&nbsp;+94 24 222 2265<br>
                <i class="fas fa-envelope"></i>&nbsp;&nbsp;<a href="#">info@vav.ac.lk</a>
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
  include 'footer.php';
?>
