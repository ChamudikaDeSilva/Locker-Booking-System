<?php
  session_start();
  include 'navbar.php';
  require 'model/db.php';

  if (isset($_SESSION['s_id'])) {
    header("Location: index.php");
  }

  $msg = $msgClass = '';

  if (filter_has_var(INPUT_POST, 'submit')){
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dep = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($id) && !empty($username) && !empty($name) && !empty($dep) && !empty($email) && !empty($phone) && !empty($password)){
      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $msg = "Please use a valid email";
        $msgClass = "red";
      } else {
        $hashedPwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // var_dump($hashedPwd);

        $sql = "INSERT INTO `student` (`student_id`, `student_username`, `student_pwd`, `student_department`, `student_name`, `student_email`, `student_phone`)
        VALUES ('$id', '$username', '$hashedPwd', '$dep', '$name', '$email', '$phone')";

        if (mysqli_query($conn, $sql)){
          $msg = "Register Successfull <a href='login.php' class='black-text'>Login</a>";
          $msgClass = "green";
        } else {
          $msg = "Register error: " . $sql . "<br>" . mysqli_error($conn);
          $msgClass = "red";
        }
      }
    } else {
      $msg = "Please fill in all fields";
      $msgClass = "red";
    }
  }
?>

<!-- Register form -->
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
          <div class="card-content">
            <span class="card-title center-align">User Registration Form</span>
            <div class="row">
              <form class="col s12" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">credit_card</i>
                    <input type="text" id="id" name="id" value="<?php echo isset($_POST['id']) ? $id : ''; ?>">
                    <label for="id">Your User Id</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">face</i>
                    <input type="text" id="name" name="username" value="<?php echo isset($_POST['username']) ? $username : ''; ?>">
                    <label for="name">Your Username</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                    <label for="name">Your Full Name</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">school</i>
                    <select name="department">
                      <option disabled selected>Please Select</option>
                      <option value="FTMK">FOAS</option>
                      <option value="FKE">FOTS</option>
                      <option value="FKEKK">FOBS</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                    <label for="email">Your Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">local_phone</i>
                    <input type="text" id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>">
                    <label for="phone">Your Phone</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" id="password" name="password">
                    <label for="userid">Your password</label>
                  </div>
                </div>
                <div class="row">
                  <p class="center-align">
                    Already register? <a href="login.php">Login</a><br><br>
                    <button type="submit" class="waves-effect waves-light btn blue" name="submit">Register</button>
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
  mysqli_close($conn);
  include 'footer.php';
?>
