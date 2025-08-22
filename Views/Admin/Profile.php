<?php
session_start();
include('session.php');
include "../../Model/connection.php";
$page = "Profile";
include "Master/header.php";
?>

    <style>
        .list-group-item.active {
            background: #06C167 !important;
        }

        .bg-warning {
            background: #06C167 !important;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 4% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            /*transform: translateY(-100%);*/
        }

        .close {
            float: right;
            text-align: right;
            font-size: 30px;
        }

        .modal-content h2 {
            text-align: center;
            margin-top: -35px;
        }

        .button_div {
            justify-content: center;
            text-align: center;
        }

        .button_div button {
            margin-right: 10px;
            background: #06C167;
            border: 1px solid #06C167;
            padding: 5px 15px;
            color: #FFFFFF;
            border-radius: 2px;
        }

        #addAddressForm input {
            padding: 5px;
        }

        .nice-select {
            padding: 0px !important;
            height: 38px !important;
            line-height: 38px !important;
        }

        .add_address_button {
            background: #06C167;
            border: 1px solid #06C167;
            padding: 5px 15px;
            color: #FFFFFF;
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .main_flex_div {
                display: flex;
                flex-direction: column;
            }

            .inner_flex_div {
                min-width: 100% !important;
            }

            .modal-content {
                padding: 10px 0px !important;
                min-width: 95% !important;
                height: 700px;
                overflow: scroll;
            }

            .close {
                margin-right: 10px;
            }
        }

        .list-group-item.active {
            background: #ffc107;
        }

        /* end common class */
        .top-status ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0;
            margin: 0;
        }

        .top-status ul li {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            border: 8px solid #ddd;
            box-shadow: 1px 1px 10px 1px #ddd inset;
            margin: 10px 5px;
        }

        .top-status ul li.active {
            border-color: #06C167;
            box-shadow: 1px 1px 20px 1px #ffc107 inset;
        }

        /* end top status */

        ul.timeline {
            list-style-type: none;
            position: relative;
        }

        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline>li {
            margin: 20px 0;
            padding-left: 30px;
        }

        ul.timeline>li:before {
            content: '\2713';
            background: #fff;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 0;
            left: 5px;
            width: 50px;
            height: 50px;
            z-index: 400;
            text-align: center;
            line-height: 50px;
            color: #d4d9df;
            font-size: 24px;
            border: 2px solid var(--ogenix-primary);
        }

        ul.timeline>li.active:before {
            content: '\2713';
            background: #28a745;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 0;
            left: 5px;
            width: 50px;
            height: 50px;
            z-index: 400;
            text-align: center;
            line-height: 50px;
            color: #fff;
            font-size: 30px;
            border: 2px solid var(--ogenix-primary);
        }

        /* end timeline */
    </style>
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
                                $query="SELECT user.*, address.address as address_address, address.city as city,address.state as state, address.postal_code as postal_code,address.country as country from user join address on user.id= address.user_id where user.id = '$user_id' and user.deleted_at is null";
                                $res=mysqli_query($con,$query);
                                if(mysqli_num_rows($res) > 0){
                                    $row=mysqli_fetch_assoc($res);
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
                                
                                    // Update user table
                                    $updateUserQuery = "UPDATE user 
                                                        SET name = '$name', email = '$email', phone = '$phone', password = '$password', updated_at = NOW()
                                                        WHERE id = '$user_id'";
                                
                                    // Update address table
                                    $updateAddressQuery = "UPDATE address 
                                                           SET city = '$city', state = '$state', country = '$country', postal_code = '$postal_code'
                                                           WHERE user_id = '$user_id'";
                                
                                    if (mysqli_query($con, $updateUserQuery) && mysqli_query($con, $updateAddressQuery)) {
                                      
                                    } else {
                                       
                                    }
                                }
                                ?>
                                <div class="d-flex flex-column align-items-center text-center">
                                    <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtbEsykx-0fhTred6UwHDYtMFd2UgTJCG4gaklT1dx4suRO4_n5LJr4Gg28kquSX5fpNo&usqp=CAU"
                                        alt="Admin" class="rounded-circle p-1 bg-warning" width="110"> -->
                                        <i class="bi bi-check-circle rounded-circle p-1 bg-warning" style="width:35px;height:35px"></i>

                                    <div class="mt-3">
                                        <h4><?php echo $name ?></h4>
                                        <p class="text-secondary mb-1"><?php echo $phone ?></p>
                                        <p class="text-muted font-size-sm"><?php echo $city.', '. $country ?></p>
                                    </div>
                                </div>
                                <div class="list-group list-group-flush text-center mt-4">
                                    <a href="#" class="list-group-item list-group-item-action border-0 active"
                                        onclick="showProfileDetails()">
                                        Profile Informaton
                                    </a>

                                    <a href="Logout.php" class="list-group-item list-group-item-action border-0">Logout</a>
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
                                    <!-- <p><strong>Gender:</strong> Female</p> -->
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
    </script>

</main>
