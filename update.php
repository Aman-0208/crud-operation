<?php include("dbconnect.php"); 
    $id =$_GET['id'];
    
    $query ="select * from form where id='$id' ";
    $data=mysqli_query($conn,$query);

  
    $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php CRUD Operation</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            Update details
        </div>

        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" required>
            </div>
            <div class="input_field">
                <label>Password</label>
                <input type="password" value="<?php echo $result['password']; ?>" class="input" name="password" required>
            </div>
            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" value="<?php echo $result['cpassword']; ?>" class="input" name="conpassword" required>
            </div>
            <div class="input_field">
                <label>Gender</label>
                <div class="custom_select"> 
                
                <select name="gender" required>
                    <option value="">Select</option>

                    <option value="Male"
                        <?php
                           if($result['gender'] == 'Male')
                           {
                             echo "selected";
                           }
                        ?>
                    >
                        
                    
                    Male</option>

                    <option value="Female"
                    <?php
                           if($result['gender'] == 'Female')
                           {
                             echo "selected";
                           }
                        ?>
                    >Female</option>

                    <option value="others">Others</option>
                </select>
                </div>
            </div>
            <div class="input_field">
                <label>Email Address</label>
                <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" required>
            </div>
            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" required>
            </div>
            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required><?php echo $result['address']; ?></textarea>
            </div>
            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and condition</p>
                
            </div>
            <div class="input_field">
                <input type="submit" value="Update" class="btn" name="update">
            </div>
        </div>
        </form>

    </div>
    
</body>

</html>

<?php
     if ($_POST['update'])
     {
        $fname   =$_POST['fname'];
        $lname   =$_POST['lname'];
        $pwd     =$_POST['password'];
        $cpwd    =$_POST['conpassword'];
        $gender  =$_POST['gender'];
        $email   =$_POST['email'];
        $phone   =$_POST['phone'];
        $address =$_POST['address'];


  
        
        $query ="UPDATE form set fname='$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',address='$address' WHERE id='$id' ";
        $data=mysqli_query($conn,$query);
        if($data)
        {
            echo "<script>alert('Record Updated')</script>";
            ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>

            <?php
        }
        else
        {
            echo "Failed to Update";
        }
        



    }
   
?>