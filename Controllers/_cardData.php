<?php
session_start();
include "../Model/connection.php";
// if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    if(isset($_POST['page']) && $_POST['page'] == 'GetAddToCartData'){
        $query="SELECT * from cart_detail where deleted_at is null";
        $res=mysqli_query($con,$query);
        if(mysqli_num_rows($res) > 0){
            while($row=mysqli_fetch_assoc($res)){
             $created_at = $row['created_at'];
             $qty = $row['qty'];
             $pId = $row['product_id'];
             $Id = $row['id'];
             $todayDate = date("Y-m-d H:i:s");
             $newDate = date("Y-m-d H:i:s" , strtotime("+30 days ",$created_at));
             if($todayDate > $newDate ){
                $uQuery="UPDATE product set qty = qty + $qty where id = '$pId'";
                $ures=mysqli_query($con,$uQuery);
                $uQuery="UPDATE cart_detail set deleted_at = '$todayDate' where id = '$Id'";
                $ures=mysqli_query($con,$uQuery);
             }   
            }
        }
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ;
        $output='';
        $totalSum =0;
        $ipAddress = $_SESSION['token'];
        $query="SELECT c.*,p.image1 as img, p.name as p_name from card_detail as c join product as p on c.product_id = p.id where (c.user_id = '$user_id' or c.ip_address = '$ipAddress') and c.deleted_at is null";
        $res=mysqli_query($con,$query);
        $rowCount = mysqli_num_rows($res);
        if($rowCount >0){
            while($row=mysqli_fetch_assoc($res)){
                $totalSum +=$row['total_amount'];
                $output .='<tr rowspan="2">
                <td style="display:none">'.$row['id'].'</td>
                           
                            <td class="w-40">
                                <img src="../Assets/Images/Products/' . $row['img'] . '"
                                    class="img-fluid img-thumbnail" alt="Sheep">
                            </td>
                            <td colspan="5">
                                <div class="row">
                                    <p class="mb-0 " style="text-align:left">'.$row['p_name'].'</p>
                                    <p class="mb-0 text-secondary " style="text-align:left">Rs: <span
                                            class="text-secondary perAmount">'.$row['per_amount'].'</span></p>
                                    <p class=" totalAmount" style="display:none">'.$row['total_amount'].'</p>
                                    <br>

                                    <div class="input-group row">
                                        <button type="button" class="decrementBtnCart col-lg-2 col-sm-2" onclick="updateAddToCart(this,'.$row['id'].')" >-</button>
                                        <input type="text" style="border:none;text-align:center"
                                            class="qty qty2 col-lg-5 col-sm-5" value="'.$row['qty'].'">
                                        <button type="button" class="incrementBtnCart col-lg-2 col-sm-2" onclick="updateAddToCart(this,'.$row['id'].')" >+</button>
                                    </div>

                                </div>

                            </td>
                            <td>
                                <button onclick="deleteCartItem(this,'.$row['id'].')" style="font-size:large" class="btn btn-sm text-danger ">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>';
            }
            echo $totalSum.'!'.$output.'!'.$rowCount;
        }else{
            echo 0 .'!'. 0 .'!'. 0;
        }
    }

    if(isset($_POST['page']) && $_POST['page'] == 'updateAddToCartValue' && $_POST['page'] != 'deleteCartItem'){
        $id = $_POST['id'];
        $perAmount = $_POST['perAmount'];
        $totalAmount = $_POST['totalAmount'];
        $qty = $_POST['qty'];
        $query="UPDATE card_detail set per_amount = '$perAmount' , total_amount = '$totalAmount', qty='$qty' where id = '$id' ";
        $res=mysqli_query($con,$query);
        echo 1;
    }
    if(isset($_POST['page']) && $_POST['page'] == 'deleteCartItem' && $_POST['page'] != 'updateAddToCartValue' ){
        $id = $_POST['id'];
        $query="UPDATE card_detail SET deleted_at = NOW() where id = '$id' ";
        $res=mysqli_query($con,$query);
        echo 1;
    }

// }else{
//     echo 0 .'!'. 0 .'!'. 0;
// }
?>