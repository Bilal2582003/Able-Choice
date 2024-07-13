<?php
include '../../Model/connection.php';
session_start();
if (isset($_POST['action'])) {

    if (isset($_POST['forTable'])) {
        $output = '';
        if($_POST['action'] == 'all'){
             $query="SELECT user.*, address.address as address_add, address.city as city, address.country as country from user join address on user.id = address.user_id where user.deleted_at is null";
        }
        $res=mysqli_query($con,$query);
        if(mysqli_num_rows($res) > 0){
            while($row=mysqli_fetch_assoc($res)){
                $output .='
                <tr>
                <td style="display:none"> '.$row['id'].'  </td>
                <td > '.$row['name'].'  </td>
                <td > '.$row['email'].'  </td>
                <td > '.$row['parent_name'].'  </td>
                <td > '.$row['phone'].'  </td>
                <td > '.$row['city'].'  </td>
                <td > '.$row['country'].'  </td>
                <td>
     
                <button class="btn btn-secondary" type="button"  onclick="openModal(`showOrderDetail`,' . $row['id'] . ')">
                  Show Detail
                </button>
             
    </td>
                </tr>
                ';
            }
        }
        echo $output;
    }
    if ($_POST['action'] == 'search' && !isset($_POST['forTable'])) {
        $id = $_POST['search'];
        $output = '';
         $query="SELECT user.*, address.address as address_add, address.city as city, address.country as country from user join address on user.id = address.user_id where user.deleted_at is null and (user.name like '%$id%' or user.email like '%$id%' or user.phone like '%$id%' or user.parent_name like '%$id%' or address.city like '%$id%' or address.country like '%$id%' or address.postal_code like '%$id%')";
        $res = mysqli_query($con, $query);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $option = '';
                $output .= '
                    <tr>
                <td style="display:none"> '.$row['id'].'  </td>
                <td > '.$row['name'].'  </td>
                <td > '.$row['email'].'  </td>
                <td > '.$row['parent_name'].'  </td>
                <td > '.$row['phone'].'  </td>
                <td > '.$row['city'].'  </td>
                <td > '.$row['country'].'  </td>
                <td>
     
                <button class="btn btn-secondary" type="button"  onclick="openModal(`showOrderDetail`,' . $row['id'] . ')">
                  Show Detail
                </button>
             
    </td>
                </tr>
                    ';

            }
        }
        echo $output != '' ? $output : 0;
    }
}
?>