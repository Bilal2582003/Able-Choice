<?php
include '../../Model/connection.php';
session_start();
if (isset($_POST['Action']) && isset($_SESSION['role'])) {

  if ($_POST['Action'] == 'add') {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $payment_mode = $_POST['payment_mode'];
    $head_code = $_POST['head_code'];

    $session_data = $_SESSION['usersData'];
    $user_name = $session_data['name'];
    $user_id = $session_data['id'];
    // $property = $_POST['property'];

    $query = "INSERT INTO `bank`(`name`,`branch`,`payment_mode`,`ACC_HEAD_CODE`) VALUES ('$name','$branch','$payment_mode','$head_code')";

    $res = mysqli_query($con, $query);
    $last_id = $con->insert_id;

    $query1 = "SELECT * from chart_detail where ACC_TYPE= 10000 and ACC_DETAIL_TYPE = 10002 and CHART_HEAD_CODE = '$head_code' order by Chart_ACC_CODE desc limit 1";
    $res1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($res1) > 0) {
      $row1 = mysqli_fetch_assoc($res1);
      $chart_acc_code = $row1['CHART_ACC_CODE'] + 1;
    } else {
      $chart_acc_code = 1;
    }
    $insert = "INSERT into chart_detail (CHART_HEAD_CODE, CHART_ACC_CODE, CHART_ACC_DESC, SYS_DATE, USER_ID, ACC_TYPE, ACC_DETAIL_TYPE, is_active, is_block)

                VALUES('$head_code', '$chart_acc_code', '$name', NOW(), '$user_id', '10000', '10002',  '1','0' )";

    $insertRes = mysqli_query($con, $insert);

    $query3 = "UPDATE bank set CHART_ACC_CODE = '$chart_acc_code' where id = $last_id ";
    $res3 = mysqli_query($con, $query3);


    echo 1;
  }

  if ($_POST['Action'] == 'showTable') {
    $output ='';
    $query = "SELECT * from product_category where deleted_at IS NULL";
    $res = mysqli_query($con, $query);
   
    while ($row = mysqli_fetch_assoc($res)) {
      $dateString = $row['created_at'];
      // Remove the time portion and convert to Unix timestamp
      $unixTimestamp = strtotime(substr($dateString, 0, 10));

      // Format the Unix timestamp as desired
      $formattedDate = date("d F, Y", $unixTimestamp);
      $output .= '
            <tr>
            <td class="border">' . $row['id'] . ' </td>
            <td class="border">' . $row['name'] . ' </td>
            <td class="border">' . $formattedDate . ' </td>
            <td class="border">
              <a style="display:inline-block;width:fit-content;padding:10px;cursor:pointer; margin:auto;background-color:#3347e9;color:white; line-height:1; border-radius:4px" class=" dropdown-item" onclick="openModal(`showOrderDetail`,' . $row['id'] . ')">Edit</a>
                  
              <a style="display:inline-block;width:fit-content;padding:10px;cursor:pointer; margin:auto;background-color:#e93352;color:white; line-height:1; border-radius:4px"  class=" dropdown-item"  onclick="deleteBank(' . $row['id'] . ')">Delete</a>
            </td>
          </tr>
            ';
    }

    echo $output;
  }


  if ($_POST['Action'] == 'fetchModal') {
    $id = $_POST['id'];
    $output = '';

    $query = "SELECT bank.* from bank where bank.id='$id' and bank.deleted_at IS NULL";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {


      $option = '<option value="">SELECT</option>';
      $query1 = "SELECT * from chart_head where acc_type = '10000' and acc_detail_type = '10002' and deleted_at IS NULL";
      $res1 = mysqli_query($con, $query1);
      if (mysqli_num_rows($res1) > 0) {
        while ($row1 = mysqli_fetch_assoc($res1)) {
          if ($row1['HEAD_CODE'] == $row['ACC_HEAD_CODE']) {
            $selected = 'selected';
          } else {
            $selected = '';
          }
          $option .= '<option ' . $selected . ' value="' . $row1['HEAD_CODE'] . '">' . $row1['HEAD_DESC'] . '</option>';
        }
      }

      $optionMode = '<option value="">SELECT</option>';
      $query2 = "SELECT * from payment_mode where deleted_at IS NULL";
      $res2 = mysqli_query($con, $query2);
      if (mysqli_num_rows($res2) > 0) {
        while ($row2 = mysqli_fetch_assoc($res2)) {
          if ($row2['id'] == $row['payment_mode']) {
            $selected = 'selected';
          } else {
            $selected = '';
          }
          $optionMode .= '<option ' . $selected . ' value="' . $row2['id'] . '">' . $row2['name'] . '</option>';
        }
      }

      $output .= '
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="houseName" class="col-form-label">Name :</label>
                <input type="text" name="editName" class="form-control" id="editname" value="' . $row['name'] . '">
                <input type="hidden" name="" class="form-control" id="editId" value="' . $row['id'] . '">
              </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="houseName" class="col-form-label">Branch :</label>
                <input type="text" name="editBranch" class="form-control" id="editBranch" value="' . $row['branch'] . '">
              </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
            <labe class="col-form-label"l>Head Code :</label>
            <select class="form-control" id="editHeadCode">
            ' . $option . '
            </select>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
            <labe class="col-form-label"l>Payment Mode :</label>
            <select class="form-control" id="editPaymentMode">
            ' . $optionMode . '
            </select>
            </div>
            </div>
            </div>
          ';
    };

    echo $output;
  }

  if ($_POST['Action'] == 'updateBank') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $head_code = $_POST['head_code'];
    $payment_mode = $_POST['payment_mode'];

    $query = "UPDATE `bank` SET `name`='$name', `branch`='$branch',payment_mode = '$payment_mode', ACC_HEAD_CODE = '$head_code' WHERE id='$id'";
    $res = mysqli_query($con, $query);
    echo 1;
  }
}
if (isset($_GET['id'])) {
  // include 'connection.php';
  $id = $_GET['id'];
  $date = date("Y-m-d H:i:s");
  $query = "UPDATE `bank` SET deleted_at ='$date' WHERE id='$id'";
  $res = mysqli_query($con, $query);
  header("location:../Views/bank.php");
}
