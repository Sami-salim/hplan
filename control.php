<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>control</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <div class="container-fluid">
       <a class="navbar-brand" href="control.php">CONTROL OPERATION</a>
          <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="admin_home.php"> Home</a>
            </li>
              <li class="nav-item">
                         <a type="button" class="btn btn-primary nav-link active" href="adminsignup.php"><span style="font-size:larger;">Add New</a>
                     </li>
                   </ul>
                 </div>
              </div>
             </nav>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>USER_NAME</th>
      <th>PASSWORD</th>
      <th>NAME</th>
      <th>USERTYPE</th>
      <th>EMAIL</th>
      <th>PHONE</th>
	  <th>signup_date</th>
      <th>last_login</th>
	  <th>last_logout</th>
      <th>image</th>
	  <th>online_users</th>
	   <th>gender</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
      
<?php function make_date(){
  return strftime("%Y-%m-%d %H:%M:%S", time());
}?>
<?php function read_date($str){
     if($str)
      return date('F j, Y, g:i:s a', strtotime($str));
     else
      return null;
  }?>
  
  <tbody>
<?php
     include "db_conn.php";
     $sql = "select * from users";
     $result = $conn->query($sql);
     if(!$result){
      die("Invalid query");
      }
      while($row=$result->fetch_assoc()){
        
         echo "
      <tr>
        <th>$row[id]</th>
        <td>$row[user_name]</td>
        <td>$row[password]</td>
        <td>$row[name]</td>
        <td>$row[usertype]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
		<td>$row[signup_date]</td>
        <td>$row[last_login]</td>
	    <td>$row[last_logout]</td>
        <td>$row[image]</td>
	    <td>$row[online_users]</td>
		<td>$row[gender]</td>
        <td>
           <a class ='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
           <a class ='btn btn-danger' href='delette.php?id=$row[id]'>Delete</a>
       </td>
      </tr>
      ";
      }
    ?>
</tbody>
</table>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>