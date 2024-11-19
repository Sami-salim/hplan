<?php

include "db_conn.php";

if (isset($_POST['submit'])){

    $uname = "";
	  $pass = "";
	  $name ="";
    $u_type= "";
    $email= "";
    $phone="";

    if($_SERVER["REQUEST_METHOD"]=='GET'){
        if(!isset($_GET['id'])){
          header("Location: control.php");
          exit();
      
    }
        $id=$_GET['id'];
        $sql= "SELECT * from users WHERE id=$id";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        while(!$row){
            header("Location: control.php");
             exit();
        }
        $uname=$row["user_name"];
        $pass=$row["password"];
        $name=$row["name"];
        $u_type=$row["usertype"];
        $email=$row["email"];
        $phone=$row["phone"];

    }
    else{
    
    $uname = $_POST["user_name"];
	  $pass = $_POST["password"];
  	$name = $_POST["name"];
    $u_type= $_POST["usertype"];
    $Email= $_POST["email"];
    $phone= $_POST["phone"];
    $sql = "UPDATE users set user_name='$uname', password= '$pass',name='$name',usertype='$u_type',Email='$Email',phone='$phone'";
    $result = $conn->query($sql);
    }
  
  }




?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create new Member</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
       <a class="navbar-brand" href="control.php">C_OPERATION</a>
          <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="control.php">Home</a>
            </li>
              <li class="nav-item">
                         <a class="nav-link" href="create.php"><span style="font-size:larger;">Add</a>
                     </li>
                   </ul>
                 </div>
              </div>
             </nav>

  <div class="col-lg-6 m-auto">

  <form methed="post">

    <br> <br> <div class="card">

    <div class="card-header bg-primary">
        <h1 class="text-white text-center"> Create New Member </h1>
</div><br>

     <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"><br>
         
          <label>User Name:</label>
          <input type="text" name="uname" ><br>
          <label>Password:</label>
     	  <input type="password" name="password" ><br>
                 
          <label>Name:</label>
          <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"><br>
                     
          <label>usertype:</label>  
     	  <input type='text', name='usertype' ><br>

           <label>email:</label>
     	  <input type="Email" name="email"value="<?php echo $id; ?>" class="form-control"><br>

                 <label>phone:</label>
     	  <input type="phone" name="phone" value="<?php echo $id; ?>" class="form-control"><br>
                 

           <button class ="btn btn-success" type="submit" name="submit">submit</button><br>
           <a class ="btn btn-info" type="submit" name="cancel" href="control.php"> Cancel</a><br>

  
</div>
</form>
</div>
</body>
</html>
  
