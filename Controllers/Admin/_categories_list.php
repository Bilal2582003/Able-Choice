<?php
include "../../Model/connection.php";

$q = mysqli_query($con,"SELECT * FROM product_category WHERE deleted_at IS NULL ORDER BY id DESC");
?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; while($row=mysqli_fetch_assoc($q)){ ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
