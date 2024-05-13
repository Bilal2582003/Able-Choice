<?php
session_start();
include "../Model/connection.php";
// if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
    if(isset($_POST['page']) && $_POST['page'] == 'GetAddToCartData'){
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ;
        $output='';
        $totalSum =0;
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $query="SELECT c.*,p.image1 as img, p.name as p_name from card_detail as c join product as p on c.product_id = p.id where c.user_id = '$user_id' or c.ip_address = '$ipAddress' ";
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
                                        <button type="button" class="decrementBtnCart col-lg-2 col-sm-2">-</button>
                                        <input type="text" style="border:none;text-align:center"
                                            class="qty qty2 col-lg-5 col-sm-5" value="'.$row['qty'].'">
                                        <button type="button" class="incrementBtnCart col-lg-2 col-sm-2">+</button>
                                    </div>

                                </div>

                            </td>
                            <td>
                                <a href="../Controller/_cardData.php?id='.$row['id'].'" style="font-size:large" class="btn btn-sm text-danger ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>';
            }
            echo $totalSum.'!'.$output.'!'.$rowCount;
        }else{
            echo 0 .'!'. 0 .'!'. 0;
        }
    }else{
        echo 0 .'!'. 0 .'!'. 0;
    }

// }else{
//     echo 0 .'!'. 0 .'!'. 0;
// }
?>