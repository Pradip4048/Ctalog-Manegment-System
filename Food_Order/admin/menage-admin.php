<?php include('partials/menu.php'); ?>
<link rel="stylesheet" href="../css/style.css">
<!--Main Content Section Starts <div class="main-content"-->
<div class="main-content">
<div class="wrapper"> 
    <h1>Manage Admin</h1>
    <br>

    <?php
      if(isset($_SESSION['add']))
      {
      echo $_SESSION['add']; // disply the massgeg
      unset($_SESSION['add']); // removing the message
      }
      
      if(isset($_SESSION['delete']))
      {
          echo $_SESSION['delete']; 
          unset($_SESSION['delete']);
      }
      if(isset($_SESSION['update']))
      {
          echo $_SESSION['update']; 
          unset($_SESSION['update']);
      }
      if(isset($_SESSION['user-not-found']))
      {
          echo $_SESSION['user-not-found']; 
          unset($_SESSION['user-not-found']);
      }
      if(isset($_SESSION['pwd-not-match']))
      {
          echo $_SESSION['pwd-not-match']; 
          unset($_SESSION['pwd-not-match']);
      }
      if(isset($_SESSION['change-pwd']))
      {
          echo $_SESSION['change-pwd']; 
          unset($_SESSION['change-pwd']);
      }
  ?>
    <br>
    <br> 


   // <!--bottom admin-->
              <a href="add-admin.php" class="btn-primary">add admin</a>
              <br>
             <table class="tbl-full">
                <br> <br>
                  <tr>
                  <th>S.r</th>
                  <th>Full name</th>
                 <th>Username</th>
                <th>Actions</th>
                </tr>
                <?php
                   //Query to Get all Admin
                   $sql = "SELECT * FROM the_admin";
                   //Execute the Query
                  $res = mysqli_query($conn, $sql);
                  //CHeck whether the Query is Executed of Not
                  if ($res==TRUE)
                {
                // Count Rows to Check whether we have data in database or not
                $count = mysqli_num_rows($res); // Function to get all the rows in database
                //Check the num of rows

                $sn=1; // creat the variabale and the assinage the value
                if ($count>0)
                {
                    // we have in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        // using whilw lop to get a all tha database 
                        // and while looop will run as long as we have data in database

                        //get indivusual data
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];

                        ?>
                          <tr>
                           <td><?php echo $sn++;?></td>
                           <td><?php echo $full_name;?></td>
                           <td><?php echo $username; ?></td>
                             <td>
                              <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                              <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secoundry"> update Admin</a> 
                               <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> delete Admin</a> 
             
                             </td>

                          </tr>
                        <?php
                    }
                }
                else
                {
                   // we do not have data in database
                }
            }
        ?>
   
   
</table>


</div>
</div>
<!-- Main Content Setion Ends -->
<?php include('partials/footer.php') ?>

