<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "SELECT * FROM personal_info WHERE username = '{$username}'";
    $query2 = "SELECT * FROM system_info WHERE username = '{$username}'";
    $select_user_profile_query = mysqli_query($connection, $query);
    $select_user_profile_query2 = mysqli_query($connection, $query2);

    while($row = mysqli_fetch_array($select_user_profile_query)){
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $canonical_name= $row["canonical_name"];
        $phone_number = $row["phone_number"];
        $address = $row["address"];
        $NID = $row["NID"];
        $access = $row["access"];
        $birth_date = $row["birth_date"];
    }
    while($row = mysqli_fetch_array($select_user_profile_query2)){
        $password = $row["password"];
        $security_phone_number = $row["phone_number"];
    }

}

if (isset($_POST['edit_user'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $canonical_name = $_POST['canonical_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $security_phone_number = $_POST['security_phone_number'];
    $NID = $_POST['NID'];
    $access = $_POST['access'];
    $birth_date = $_POST['birth_date'];
    $password = $_POST['password'];
    //$post_date = date('d-m-y');

    $query = "UPDATE personal_info SET first_name ='{$first_name}', last_name ='{$last_name}',
          canonical_name ='{$canonical_name}', address ='{$address}', phone_number ='{$phone_number}',
          NID ='{$NID}', access = '{$access}', birth_date = '{$birth_date}' WHERE username='{$username}'";

    $query2 = "UPDATE system_info SET phone_number = '{$security_phone_number}', 
          password = '{$password}' WHERE username = '{$username}'";

    $update_user = mysqli_query($connection, $query);
    $update_user2 = mysqli_query($connection, $query2);

    header("Location: index.php");
}

?>

        <div class="container-fluid" style="margin-left: -15px">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header" style="margin-top: 0">Personal Information</h3>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="author">First Name</label>
                            <input type="text" value="<?php echo $first_name; ?>" class="form-control" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="post_status">Last Name</label>
                            <input type="text" value="<?php echo $last_name; ?>" class="form-control" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="author">Canonical Name</label>
                            <input type="text" value="<?php echo $canonical_name; ?>" class="form-control" name="canonical_name">
                        </div>
                        <div class="form-group">
                            <label for="author">Phone Number</label>
                            <input type="text" value="<?php echo $phone_number; ?>" class="form-control" name="phone_number">
                        </div>
                        <div class="form-group">
                            <label for="author">Address</label>
                            <input type="text" value="<?php echo $address ; ?>" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label for="author">NID</label>
                            <input type="text" value="<?php echo $NID ; ?>" class="form-control" name="NID">
                        </div>
                        <div class="form-group">
                            <label for="author">Access</label>
                            <select name="access" id="">
                                <?php
                                if ($access == 'public'){
                                    echo "<option value='public'>Public</option>";
                                    echo "<option value='private'>Private</option>";
                                }
                                else{
                                    echo "<option value='private'>Private</option>";
                                    echo "<option value='public'>Public</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_content">Birth Date</label>
                            <input type="date" value="<?php echo $birth_date; ?>" class="form-control" name="birth_date">
                        </div>
                        <h3 class="page-header">System Information</h3>

                        <div class="form-group">
                            <label for="post_content">Security Phone Number</label>
                            <input type="text" value="<?php echo $security_phone_number ;?>" class="form-control" name="security_phone_number">
                        </div>
                        <div class="form-group">
                            <label for="author">Password</label>
                            <input type="password" value="<?php echo $password ; ?>" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>