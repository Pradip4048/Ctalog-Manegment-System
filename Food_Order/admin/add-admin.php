<?php include('partials/menu.php'); ?>
<div class="main-content">
     <div class="wrapper">
<h1>Add Admin</h1>
<br><br>

<?php
    if(isset($_SESSION['add']))
    {
     echo $_SESSION['add']; // disply the massgeg
     unset($_SESSION['add']); // removing the message
    }
?>
                  <form action="" method="POST">
                       <table class="tbl-30">
                        <tr>
                        <td>Full Name: </td>
                        <td>
                             <input type="text" name="full_name" placeholder="Enter your name">
                        </td>
                        </tr>
<tr>
<td>Username: </td>
<td>
<input type="text" name="username" placeholder="Your Username">
</td>
</tr>
<tr>
<td>Password: </td>
<td>
<input type="Password" name="password" placeholder="Your pasniwsnws">
</td>
</tr>
<tr>
    <td calspan="2">
<input type="submit" name="submit" value="Add Admin" class="btn-secoundry">
    </td>
</tr>
</table>
</form>
</div>
</div>
<div>
<?php include('partials/footer.php'); ?></div>
<?php
if(isset($_POST['submit']))
{
    // 1 get data from form
    $full_name = $_POST['full_name']; 
    $username = $_POST['username']; 
     $password = md5($_POST['password']);  // password encription md5

    // sql qyary to save data in database
    

     $sql="INSERT INTO the_admin SET 
     full_name='$full_name',
     username='$username',
     password='$password'
     ";
     
     
     // 3 excute qaery and save data  in database
     

      //$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); //Database Connection 
      //$db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error()); //SElecting Database

     $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    

      //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message 
      if ($res==TRUE)
      {
      //Data Inserted
      //echo "Data Inserted";

      // creat session for disply a mesg
      $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div> ";
      //redisrt page to manege admin
      header("loction:".SITEURL.'admin/menage-admin.php');
      }
      else 
      {
      //FAiled to Insert Data
      //echo "Faile to Insert Data";

        // creat session for disply a mesg
        $_SESSION['add'] = " <div class='error'>failed masg</div>";
        //redisrt page to add to admin
        header("loction:".SITEURL.'admin/add-admin.php');
      }

}
?>
