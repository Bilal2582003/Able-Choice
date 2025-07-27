<?php
session_start();
include('session.php');
$page = "Profile";
include "Master/header.php";
include "../Model/connection.php";
?>

<main id="main">

<!-- set breadcrumb -->
<?php include "Master/breadcrumb.php"; ?>
    <section class="my-5">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                // Fetch user data and address information from the database
                                $name = '';
                                $email = '';
                                $parent_name = '';
                                $phone = '';
                                $password = '';
                                $address_address = '';
                                $city = '';
                                $state = '';
                                $postal_code = '';
                                $country = '';
                                $created_at = '';
                                $lastupdatedate = '';
                                $user_id = $_SESSION['user_id'];
                                $query = "SELECT user.*, address.address as address_address, address.city as city, address.state as state, 
                                          address.postal_code as postal_code, address.country as country 
                                          FROM user 
                                          JOIN address ON user.id = address.user_id 
                                          WHERE user.id = '$user_id' AND user.deleted_at IS NULL";
                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) {
                                    $row = mysqli_fetch_assoc($res);
                                    $name = $row['name'];
                                    $email = $row['email'];
                                    $parent_name = $row['parent_name'];
                                    $phone = $row['phone'];
                                    $password = $row['password'];
                                    $address_address = $row['address_address'];
                                    $city = $row['city'];
                                    $state = $row['state'];
                                    $postal_code = $row['postal_code'];
                                    $country = $row['country'];
                                    $created_at = $row['created_at'];
                                    $lastupdatedate = $row['updated_at'];
                                }

                                // Handle form submission for profile update
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $password = $_POST['password']; // Ideally, do not store plain passwords
                                    $city = $_POST['city'];
                                    $state = $_POST['state'];
                                    $country = $_POST['country'];
                                    $created_at = $_POST['created_at'];
                                    $lastupdatedate = $_POST['lastupdate'];

                                    // Update user and address information in the database
                                    $updateUserQuery = "UPDATE user 
                                                        SET name = '$name', email = '$email', phone = '$phone', password = '$password', updated_at = NOW()
                                                        WHERE id = '$user_id'";

                                    $updateAddressQuery = "UPDATE address 
                                                           SET city = '$city', state = '$state', country = '$country', postal_code = '$postal_code'
                                                           WHERE user_id = '$user_id'";

                                    if (mysqli_query($con, $updateUserQuery) && mysqli_query($con, $updateAddressQuery)) {
                                        // Profile updated successfully message
                                    } else {
                                        // Error updating profile message
                                    }
                                }
                                ?>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- Profile icon -->
                                    <i class="bi bi-check-circle rounded-circle p-1 bg-warning" style="width:35px;height:35px; background-color: #06C167 !important;"></i>
                                    <div class="mt-3">
                                        <h4><?php echo $name ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $phone ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $city.', '. $country ?></p>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush text-center mt-4">
                                    <a href="#" style="background-color:#06C167 !important" class="list-group-item list-group-item-action border-0 active"
                                        onclick="showProfileDetails()">
                                        Profile Information
                                    </a>

                                    <a href="logout.php" class="list-group-item list-group-item-action border-0">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div id="profileDetails" class="card" style="display: none;">
                            <div class="card-body">
                                <div class="profile-info">
                                    <h5>Profile Information</h5>
                                    <form action="Profile.php" method="post">
                                    <p><strong>Name:</strong> <input class="form-control" type="text" value="<?php echo $name ?>" name="name" /> </p>
                                    <p><strong>Email Address:</strong> <input class="form-control" type="text" value="<?php echo $email ?>" name="email" /></p>
                                    <p><strong>Contact:</strong> <input class="form-control" type="text" value="<?php echo $phone ?>" name="phone" /></p>
                                    <p><strong>Date of Birth:</strong> <input class="form-control" type="text" value="<?php echo $password ?>" name="password" /></p>
                                    <p><strong>City:</strong> <input class="form-control" type="text" value="<?php echo $city ?>" name="city" /></p>
                                    <p><strong>State:</strong> <input class="form-control" type="text" value="<?php echo $state ?>" name="state" /></p>
                                    <p><strong>Country:</strong> <input class="form-control" type="text" value="<?php echo $country ?>" name="country" /></p>
                                    <p><strong>Created:</strong> <input class="form-control" type="text" value="<?php echo $created_at ?>" name="created_at" /></p>
                                    <p><strong>Last Updated:</strong> <input class="form-control" type="text" value="<?php echo $lastupdatedate ?>" name="lastupdate" /></p>
                                    <button type="submit" class="btn btn-success">
                                        Update
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "Master/footer.php";
?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

        function showProfileDetails() {
            hideAllSections();
            document.getElementById('profileDetails').style.display = 'block';
            setActiveLink(0);
        }

        function hideAllSections() {
            document.getElementById('profileDetails').style.display = 'none';
        }

        function setActiveLink(index) {
            document.querySelector('.list-group-item.active').classList.remove('active');
            document.querySelectorAll('.list-group-item')[index].classList.add('active');
        }

        showProfileDetails();
    })
    </script>

</main>
