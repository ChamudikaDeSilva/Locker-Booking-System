<?php
  include 'navbar.php';
  require 'model/db.php';

  if (isset($_SESSION['s_id'])) {
    header("Location: index.php");
  }

  $msg = $msgClass = '';

  if (filter_has_var(INPUT_POST, 'submit')) {
    $id = mysqli_real_escape_string($conn, $_POST['userid']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($id) && !empty($email)){
      $sql = "SELECT * FROM `student` WHERE `student_id`='$id'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      $row = mysqli_fetch_assoc($result);

      if ($resultCheck < 1) {
        $msg = "Invalid email";
        $msgClass = "red";
      } else {
        $emailCheck = filter_var($_POST['email'], $row['student_email']);

        if($emailCheck == false) {
          $msg = "Invalid email";
          $msgClass = "red";
        } elseif ($emailCheck == true) {
          $_SESSION['s_id'] = $row['student_id'];
          $_SESSION['s_username'] = $row['student_username'];
          $_SESSION['s_name'] = $row['student_name'];
          $_SESSION['s_password'] = $row['student_password'];
          $_SESSION['s_phone'] = $row['student_phone'];

          header("location: verify.php");
        }
      }
    } else {
      $msg = "Please Enter Your Email";
      $msgClass = "red";
    }

    mysqli_close($conn);
  }

?>

<!-- Reset password form -->
<div class="container">
  <div class="box">
    <div class="row">
      <div class="col s12 m12">
        <?php if($msg != ''): ?>
          <div id="msgBox" class="card-panel <?php echo $msgClass; ?>">
            <span class="white-text"><?php echo $msg; ?></span>
          </div>
        <?php endif ?>
        <div class="card">
          <div class="card-image">
            <img id="userimg" src="img/user.png" class="circle responsive-img">
          </div>
          <div class="card-content">
            <span class="card-title center-align">Reset Password</span>
            <div class="row">
              <form class="col s12" method="POST" action="#" novalidate>
                <!-- <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" id="userid" name="userid">
                    <label for="userid">User id</label>
                  </div>
                </div> -->
                <div class="row">
                  <div class="input-field">
                      <i class="material-icons prefix"></i>
                    <input type="password" id="password" name="password">
                    <label for="userid">Your Email</label>
                  </div>
                </div>
                <div class="row">
                  <p class="center-align">
                    <button type="submit" class="waves-effect waves-light btn blue" name="submit">Submit</button>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
  include 'footer.php';
?>
