<?php
$showAlert = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbcon.php';
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $phone = $_REQUEST["phone"];
    $password = $_REQUEST["password"];
    $cpass = $_REQUEST["cpass"];
    // $exists = false;
    
    //see if user already exits
    // $existsql = "select * from users where name = '$name'";
    //  $eresult = mysqli_query($conn,$existsql);
    // $numrow = mysqli_num_rows($eresult);

    // if($numrow > 0){
    //     $showError = 'USERNAME ALREADY EXITS!!';
    // }
    // else{
        
        if(($password == $cpass)){
            
            $sql = "INSERT INTO `users` (`name`, `email`, `phone`, `password`, `cpass`,) VALUES ('$name', '$email', '$phone', '$password', '$cpass');";
            $result = mysqli_query($conn,$sql);
            // echo $phone;
            
            if($result){
                echo $cpass;
                header ('location:main.html');
                // $showAlert = true;
            }
        }
        else{
            $showError = "Password does not match!!";
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
        <label for="name" class="form-label">USERNAME</label>
        <input type="text" class="form-control" id="name" name="name">
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
        <label for="cpass" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="cpass" name="cpass">
    </div>
    
        <button type="submit" class="btn btn-primary">SIGNUP</button>
    
 </form>

</div>

</body>
</html>
