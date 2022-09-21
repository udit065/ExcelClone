<?php
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbcon.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists = false;

    //see if user already exits
    $existsql = "select * from users where username = '$username'";
     $eresult = mysqli_query($conn,$existsql);
    $numrow = mysqli_num_rows($eresult);

    if($numrow > 0){
        $showError = 'USERNAME ALREADY EXITS!!';
    }
    else{

        if(($password == $cpassword)){

            $sql = "INSERT INTO `users` (`username`, `email`, `phone`,`password`, `cpassword`) VALUES ('$username', '$email', '$phone','$password', '$cpassword');";
            $result = mysqli_query($conn,$sql);

            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Password does not match!!";
        }
    }
}
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIGNUP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<?php include 'links.php'; ?>
<?php include 'index.php'; ?>
<?php
    if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Account Is Created And You Can LOGIN Now.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
?>
<?php
    if($showError){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>'.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
?>

<div class="container">
    <h1 class="text-center my-4">SIGNUP</h1>

 <form action="signup.php" method="POST" id="sform">
    <div class="mb-3 col-md-5">
        <label for="username" class="form-label">USERNAME</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3 col-md-5">
        <label for="email" class="form-label">EMAIL</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3 col-md-5">
        <label for="phone" class="form-label">PHONE NO.</label>
        <input type="tel" class="form-control" id="phone" name="phone">
    </div>
    <div class="mb-3 col-md-5">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password" name="password">
    </div>
    <div class="mb-3 col-md-5">
        <label for="CPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="CPassword" name="cpassword">
    </div>
    
        <button type="submit" class="btn btn-primary">SIGNUP</button>
    
 </form>

</div>

</body>
</html>