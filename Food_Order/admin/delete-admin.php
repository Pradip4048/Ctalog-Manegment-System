
<?php
//Include constants.php file here 
include('../config/constants.php');

// 1. get the ID of Admin to be deleted 
 echo $id = $_GET['id'];

//2. Create SQL Query to Delete Admin
 $sql = "DELETE FROM the_admin WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql); 

// Check whether the query executed successfully or not 
if($res==true)
{
    

    //Query Executed Successully and Admin Deleted 
   //echo "Admin Deleted";
    //Create Session Variable to Display Message 
    $_SESSION['delete'] = "<div class='success'>Admin delete succsufully.</div>";
    //Redirect to Manage Admin Page
    header('location:'.SITEURL.'admin/menage-admin.php');
   
}
else
{
//Failed to Delete Admin
echo "Failed to Delete Admin";

$_SESSION['delete'] = " <div class='error'>failed to delate admin. Try agin later</div>";
header('location:'.SITEURL.'admin/menage-admin.php');

 

}

?>
