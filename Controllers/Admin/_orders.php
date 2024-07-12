<?php
include '../../Model/connection.php';
session_start();
if (isset($_POST['action']) && isset($_SESSION['role'])) {

    if (isset($_POST['forTable'])) {
        $output = '';
        if ($_POST['action'] === 'active') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode,orders.name as name, orders.phone1 as phone1 FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            WHERE order_items.is_active = 1";
        }
        if ($_POST['action'] === 'cancel') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode,orders.name as name, orders.phone1 as phone1 FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            WHERE order_items.is_cancelled = 1";
        }
        if ($_POST['action'] === 'completed') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode,orders.name as name, orders.phone1 as phone1 FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            WHERE order_items.is_completed = 1";
        }
        if ($_POST['action'] === 'all') {

            $sql = "SELECT order_items.*,product.image1 as image, product.name as pName, orders.payment_method as mode, orders.name as name, orders.phone1 as phone1 FROM order_items 
            JOIN orders ON order_items.order_id = orders.id 
            JOIN product ON order_items.product_id = product.id 
            ";
        }
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $option = '';
                if ($row['is_active'] == 1 && $row['is_cancelled'] == 0 && $row['is_completed'] == 0) {
                    if ($row['mode'] == 'banktransfer') {
                        $option = '
                        <option value="active" disabled selected>Active</option>
                        <option value="cancel" disabled>Cancel</option>
                        <option value="completed" disabled>Completed</option>
                        ';
                    } else {
                        $option = '
                        <option value="active" selected>Active</option>
                        <option value="cancel">Cancel</option>
                        <option value="completed">Completed</option>
                        ';
                    }
                }
                if ($row['is_cancelled'] == 1 || $row['is_completed'] == 1 && $row['is_active'] == 0) {
                    $option = '
                <option value="active">Active</option>
                <option value="cancel" selected>Cancel</option>
                <option value="completed">Completed</option>
                ';
                }

                if ($row["mode"] == 'banktransfer') {
                    $mode = 'BANK TRANSFER';
                } else {
                    $mode = 'CASH ON DELIEVERY';

                }

                $output .= '
    <tr>
    <td style="display:none">' . $row["id"] . '</td>
    <td>' . $row["name"] . '</td>
    <td>' . $row["pName"] . '</td>
    <td>  <img width="100%" height="70px" src="../../Assets/Images/Products/' . $row["image"] . '"/></td>
    <td>' . $row["qty"] . '</td>
    <td>' . $row["per_amount"] . '</td>
    <td>' . $row["total_amount"] . '</td>
    <td>' . $row['phone1'] . '</td>
    <td>
    <select class="status">
    ' . $option . '
    </select>
    </td>
    <td>
     
                <button class="btn btn-secondary" type="button"  onclick="openModal(`showOrderDetail`,' . $row['order_id'] . ')">
                  Show Detail
                </button>
             
    </td>

    </tr>
    ';
            }
        }
        echo $output != '' ? $output : 0;

    }

    if ($_POST['action'] == 'updateStatus' && !isset($_POST['forTable'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Update status in the database
        $sql = "UPDATE order_items SET ";

        if ($status == 'active') {
            $sql .= "is_active = 1, is_cancelled = 0, is_completed = 0";
        } elseif ($status == 'completed') {
            $sql .= "is_active = 0, is_cancelled = 0, is_completed = 1";
        } elseif ($status == 'cancel') {
            $sql .= "is_active = 0, is_cancelled = 1, is_completed = 0";
        }

        $sql .= " WHERE id = $id";
        $res = mysqli_query($con, $sql);
        echo 1;
    }

    if ($_POST['action'] == 'counter' && !isset($_POST['forTable'])) {
        // Assuming $con is your database connection
        $activeCount = 0;
        $cancelCount = 0;
        $completedCount = 0;
        // Count active orders
        $query = "SELECT COUNT(*) as active_count FROM order_items join orders on order_items.order_id = orders.id WHERE is_active = 1 AND is_cancelled = 0 AND is_completed = 0";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $activeCount = $row['active_count'];
        }

        // Count cancelled orders
        $query = "SELECT COUNT(*) as cancel_count FROM order_items join orders on order_items.order_id = orders.id WHERE is_cancelled = 1 AND is_completed = 0 AND is_active = 0";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $cancelCount = $row['cancel_count'];
        }

        // Count completed orders
        $query = "SELECT COUNT(*) as completed_count FROM order_items join orders on order_items.order_id = orders.id WHERE is_completed = 1 AND is_cancelled = 0 AND is_active = 0";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $completedCount = $row['completed_count'];
        }
        echo $activeCount . '!' . $cancelCount . '!' . $completedCount;
    }
    // if ($_POST['action'] == 'editModal' && !isset($_POST['forTable'])) {
    //     $id = $_POST['id'];
    //     $query="SELECT * from order_items as oi join orders o on o.id = oi.order_id join product as p on p.id = oi.product_id where oi.id = '$id' ";
    //     $res=mysqli_query($con,$query);
    //     if(mysqli_num_rows($res) > 0){
    //         $row=mysqli_fetch_assoc($res);
    //     }
    // }
    if ($_POST['action'] == 'showOrderModalData' && !isset($_POST['forTable'])) 
    {
          $id = $_POST['id'];
          $output = '';
          $query = "SELECT oi.*,o.name as uname, o.email as email, o.address as address , o.city as city, o.state as state, o.postcode as postcode, o.country as country,  o.phone1 as phone, o.notes as note, o.total_amount as total_amount, o.shipping_cost as ship_cost, o.net_amount as net_amount, p.name as pname, p.amount as amount from order_items as oi join orders o on o.id = oi.order_id join product as p on p.id = oi.product_id where o.id = '$id' ";
          $res = mysqli_query($con, $query);
          if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $output .= '
            <div class="row m-2">
            <input type="hidden" id="modalEditId" value="' . $row['id'] . '">
                    <div class="col-4">
                        <label>Name</label>
                        <input type="text" id="editName" value="' . $row['uname'] . '" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Email</label>
                        <input type="text" id="editEmail" value="' . $row['email'] . '" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Address</label>
                        <input type="text" id="editAddress" value="' . $row['address'] . '" class="form-control">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-4">
                        <label>City</label>
                        <input type="text" id="editCity" value="' . $row['city'] . '" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>State</label>
                        <input type="text" id="editState" value="' . $row['state'] . '" class="form-control">
                    </div>
                     <div class="col-4">
                        <label>Country</label>
                        <input type="text" id="editCountry" value="' . $row['country'] . '" class="form-control">
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-4">
                        <label>Phone</label>
                        <input type="text" id="editPhone" value="' . $row['phone'] . '" class="form-control">
                    </div>
                    <div class="col-4">
                        <label>Total Amount</label>
                        <input type="text" value="' . $row['total_amount'] . '" class="form-control" disabled>
                    </div>
                     <div class="col-4">
                        <label>Ship Cost</label>
                        <input type="text" value="' . $row['ship_cost'] . '" class="form-control" disabled>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-4">
                        <label>Net Amount</label>
                        <input type="text" value="' . $row['net_amount'] . '" class="form-control" disabled>
                    </div>
                    <div class="col-4">
                        <label>Product Name</label>
                        <input type="text" value="' . $row['pname'] . '" class="form-control" disabled>
                    </div>
                     <div class="col-4">
                        <label>Created At</label>
                        <input type="text" value="' . $row['created_at'] . '" class="form-control" disabled>
                    </div>
                </div>
            ';
           }
        echo $output;
    }
    if ($_POST['action'] == 'UpdateOrderData' && !isset($_POST['forTable'])) 
    {
        $id = $_POST['order_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $add = $_POST['add'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];
         // Prepare and execute the update query
$sql = "UPDATE orders SET name = ?, email = ?, phone1 = ?, address = ?, city = ?, state = ?, country = ? WHERE id = ?";
$stmt = $con->prepare($sql);

// Check if preparation succeeded
if ($stmt === false) {
    echo "Prepare failed: (" . $con->errno . ") " . $con->error;
} else {
    // Bind parameters
    $stmt->bind_param("sssssssi", $name, $email, $phone, $add, $city, $state, $country, $id);

    // Execute statement
    if ($stmt->execute()) {
        echo '1';
    } else {
        echo 'Execute failed: (' . $stmt->errno . ') ' . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

    }
} else {
    header("location:../../Views/Admin/Login.php");
}



?>