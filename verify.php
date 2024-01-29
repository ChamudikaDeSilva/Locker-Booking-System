<?php
  include 'navbar.php';
  require 'model/db.php';

  if (isset($_SESSION['s_id'])) {
    header("Location: index.php");
  }

  // $msg = $msgClass = '';

  // if (filter_has_var(INPUT_POST, 'submit')) {
  //   $id = mysqli_real_escape_string($conn, $_POST['userid']);
  //   $password = mysqli_real_escape_string($conn, $_POST['password']);

  //   if (!empty($id) && !empty($password)){
  //     $sql = "SELECT * FROM `student` WHERE `student_id`='$id'";
  //     $result = mysqli_query($conn, $sql);
  //     $resultCheck = mysqli_num_rows($result);
  //     $row = mysqli_fetch_assoc($result);

  //     if ($resultCheck < 1) {
  //       $msg = "Invalid user Id or password";
  //       $msgClass = "red";
  //     } else {
  //       $pwdCheck = password_verify($_POST['password'], $row['student_pwd']);

  //       if($pwdCheck == false) {
  //         $msg = "Invalid password";
  //         $msgClass = "red";
  //       } elseif ($pwdCheck == true) {
  //         $_SESSION['s_id'] = $row['student_id'];
  //         $_SESSION['s_username'] = $row['student_username'];
  //         $_SESSION['s_name'] = $row['student_name'];
  //         $_SESSION['s_email'] = $row['student_email'];
  //         $_SESSION['s_phone'] = $row['student_phone'];

  //         header("location: index.php");
  //       }
  //     }
  //   } else {
  //     $msg = "Please fill in all fields";
  //     $msgClass = "red";
  //   }

  //   mysqli_close($conn);
  // }

?>

<!-- Reset password form -->
<div class="container">
  <div class="box">
    <div class="row">
      <div class="col s12 m12">
          <!-- <div id="msgBox" class="card-panel">
            <span class="white-text"></span>
          </div> -->
        <div class="card">
          <div class="card-image">
            <img id="userimg" src="img/user.png" class="circle responsive-img">
          </div>
          <div class="card-content">
            <span class="card-title center-align">Verify Email</span>
            <div class="row">
              <form class="col s12" method="POST" action="#" novalidate>
                <div class="row">
                  <!-- <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" id="userid" name="userid">
                    <label for="userid">User id</label>
                  </div>
                </div> -->
                <div class="row">
                  <div class="input-field">
                      <i class="material-icons prefix"></i>
                    <input type="password" id="password" name="password">
                    <label for="userid">Enter Pin No</label>
                  </div>
                </div>
                <div class="row">
                  <p class="center-align">
                    <button type="submit" class="waves-effect waves-light btn blue" name="submit">Verify</button>
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
