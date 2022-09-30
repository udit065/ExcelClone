<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'dbcon.php';   
    
    $name = $_POST["name"]; 
    $email = $_POST["email"]; 
    $phone = $_POST["phone"]; 
    $password = $_POST["password"]; 
    $cpass = $_POST["cpass"];
            
    
    $sql = "Select * from users where name='$name'";
    
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    // This sql query is use to check if
    // the name is already present 
    // or not in our Database
    if($num == 0) {
        if(($password == $cpass) && $exists==false) {
    
            $sql = "INSERT INTO `users` ( `name`, 
                `email`, `phone`, `password`, `cpass`) VALUES ('$name', 
                '$email','$phone','$password','$cpass')";
    
            $result = mysqli_query($conn, $sql);
    
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
   if($num>0) 
   {
      $exists="name not available"; 
   } 
    
}//end if   
    
?>
    
<!doctype html>
    
<html lang="en">
  
<head>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="\MiniProject\style.css">
</head>
    
<body>
<?php include 'links.php'; ?>
<?php include 'index.php'; ?>
<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
    
<div class="container my-4 " id="sform">
    
    <h1 class="text-center">SIGNUP</h1> 
    <form action="signup.php" method="post">
    
        <div class="form-group"> 
            <label for="name">Username</label> 
        <input type="text" class="form-control" id="name"
            name="name" aria-describedby="emailHelp">    
        </div>
    
        <div class="form-group"> 
            <label for="email">Email</label> 
        <input type="text" class="form-control" id="email"
            name="email" aria-describedby="emailHelp">    
        </div>
    
        <div class="form-group"> 
            <label for="phone">Phone</label> 
        <input type="text" class="form-control" id="phone"
            name="phone" aria-describedby="emailHelp">    
        </div>
    
        <div class="form-group"> 
            <label for="password">Password</label> 
            <input type="password" class="form-control"
            id="password" name="password"> 
        </div>
    
        <div class="form-group"> 
            <label for="cpass">Confirm Password</label> 
            <input type="password" class="form-control"
                id="cpass" name="cpass">
    
            <small id="emailHelp" class="form-text text-muted">
            Make sure to type the same password
            </small> 
        </div>      
    
        <button type="submit" class="btn btn-primary">
        SIGNUP
        </button> 
    </form> 
</div>

    </body>
    </html>
