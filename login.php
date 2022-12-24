<?php
$login = false;
$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbcon.php';
    $name = $_POST["name"];
    $password = $_POST["password"];
    
    
        $sql1 = "Select * from users where name= '$name' AND password= '$password'";
        $result1 = mysqli_query($conn,$sql1);
        $num = mysqli_num_rows($result1);

            if($num == 1){
                $login = true;
//                 session_start();
//                 $_SESSION['loggedin'] = true;
//                 $_SESSION['name'] = $name;
                header ('location:main.php');
            }
            else{
                $showError = "Invalid Details!!";
            }
        }

?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<?php include 'links.php'; ?>
<?php include 'index.php'; ?>

<?php
    if($login){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your are Logged in
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
    <h1 class="text-center my-4">LOGIN</h1>

<form action="login.php" method="POST" id="loginform">
    
<div class="mb-3 col-md-5">
        <label for="name" class="form-label">name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3 col-md-5">
        <label for="Password" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password" name="password">
    </div>
    
    
        <button type="submit" class="btn btn-primary">LOGIN</button>
    
</form>
</div>

</body>
</html>
