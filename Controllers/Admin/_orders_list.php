<?php
include "../../Model/connection.php";

$q = mysqli_query($con,"SELECT * FROM orders ORDER BY id DESC");
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Customer</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Total</th>
            <th>Net Amount</th>
            <th>Payment</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; while($row=mysqli_fetch_assoc($q)){ ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone1']) ?></td>
            <td><?= number_format($row['total_amount'],2) ?></td>
            <td><?= number_format($row['net_amount'],2) ?></td>
            <td><?= htmlspecialchars($row['payment_method']) ?></td>
            <td><?= $row['order_date'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
