<?php
include '../../Model/connection.php';
session_start();
if (isset($_POST['Action']) && isset($_SESSION['role'])) {

  if ($_POST['Action'] == 'add') {
    $name = $_POST['name'];

    $query = "INSERT INTO `Product_category`(`name`) VALUES ('$name')";

    $res = mysqli_query($con, $query);
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
              <a style="display:inline-block;width:fit-content;padding:10px;cursor:pointer; margin:auto;background-color:#3347e9;color:white; line-height:1; border-radius:4px" class=" dropdown-item" onclick="openModal(`showOrderDetail`,' . $row['id'] . '), getCategoryData('.$row['id'].') ">Edit</a>
                  
              <a style="display:inline-block;width:fit-content;padding:10px;cursor:pointer; margin:auto;background-color:#e93352;color:white; line-height:1; border-radius:4px"  class=" dropdown-item"  onclick="deleteBtn(' . $row['id'] . ')">Delete</a>
            </td>
          </tr>
            ';
    }

    echo $output;
  }


  if ($_POST['Action'] == 'fetchModal') {
    $id = $_POST['id'];
    $output = '';

    $query = "SELECT product_category.* from product_category where product_category.id='$id' and product_category.deleted_at IS NULL";
    $res = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($res)) {

      $output .= '
            <div class="row">
                    <div class="col-3" style="text-align:right;"><label style="vertical-align:sub">Name</label></div>
                    <div class="col-9">
                    <input type="hidden" value="'.$row['id'].'" id="editId">
                    <input class="form-control" style="width: 80%; padding:5px border-radius:13px;" value="'.$row['name'].'" type="text" id="editName" ></div>
                </div>
          ';
    };

    echo $output;
  }

  if ($_POST['Action'] == 'Update') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $query = "UPDATE `product_category` SET `name`='$name' WHERE id='$id'";
    $res = mysqli_query($con, $query);
    echo 1;
  }
}
if (isset($_GET['id'])) {
  // include 'connection.php';
  $id = $_GET['id'];
  $date = date("Y-m-d H:i:s");
  $query = "UPDATE `product_category` SET deleted_at ='$date' WHERE id='$id'";
  $res = mysqli_query($con, $query);
  header("location:../../Views/Admin/ProductCategory.php");
}
