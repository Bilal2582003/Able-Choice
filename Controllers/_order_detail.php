<?php
// _order_detail.php — returns HTML for a given order (scoped to logged-in user)
session_start();
if (!isset($_SESSION['user_id'])) { http_response_code(401); exit('Login required'); }
$USER_ID = (int) $_SESSION['user_id'];

include __DIR__ . '/../Model/connection.php';

$order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : 0;
if ($order_id <= 0) { exit('<div>Invalid order.</div>'); }

// Validate order belongs to user
$oq = mysqli_query($con, "SELECT * FROM orders WHERE id={$order_id} AND user_id={$USER_ID} LIMIT 1");
if (!$oq || mysqli_num_rows($oq) === 0) { exit('<div>Order not found.</div>'); }
$order = mysqli_fetch_assoc($oq);

$items = [];
$iq = mysqli_query($con, "
  SELECT oi.*, p.name AS product_name, p.image1
  FROM order_items oi
  JOIN product p ON p.id = oi.product_id
  WHERE oi.order_id={$order_id}
");
if ($iq) { while ($r = mysqli_fetch_assoc($iq)) { $items[] = $r; } }

function statusBadge($r){
  if ((int)$r['is_cancelled']===1) return '<span class="badge cancelled">Cancelled</span>';
  if ((int)$r['is_completed']===1) return '<span class="badge completed">Completed</span>';
  return '<span class="badge active">Active</span>';
}
?>
<div>
  <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px; margin-bottom:12px;">
    <div>
      <div><strong>Order ID:</strong> #<?php echo (int)$order['id']; ?></div>
      <div><strong>Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></div>
      <div><strong>Payment:</strong> <?php echo htmlspecialchars($order['payment_method']); ?></div>
    </div>
    <div>
      <div><strong>Total:</strong> PKR <?php echo number_format((float)$order['net_amount'],2); ?></div>
      <div><strong>Shipping:</strong> PKR <?php echo number_format((float)$order['shipping_cost'],2); ?></div>
      <div><strong>IP:</strong> <?php echo htmlspecialchars($order['ip_address']); ?></div>
    </div>
  </div>

  <div class="table-responsive">
    <table style="width:100%; border-collapse:collapse;">
      <thead>
        <tr>
          <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Product</th>
          <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Qty</th>
          <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Per Amount</th>
          <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Total</th>
          <th style="text-align:left; padding:8px; border-bottom:1px solid #eee;">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($items)): ?>
          <tr><td colspan="5" style="padding:8px;">No items.</td></tr>
        <?php else: foreach ($items as $it): ?>
          <tr>
            <td style="padding:8px;">
              <div style="display:flex; align-items:center; gap:10px;">
                <img src="../Assets/Images/Products/<?php echo htmlspecialchars($it['image1']); ?>" alt="" style="width:48px; height:48px; object-fit:cover; border-radius:8px;">
                <div><?php echo htmlspecialchars($it['product_name']); ?></div>
              </div>
            </td>
            <td style="padding:8px;"><?php echo (int)$it['qty']; ?></td>
            <td style="padding:8px;">PKR <?php echo number_format((float)$it['per_amount'],2); ?></td>
            <td style="padding:8px;">PKR <?php echo number_format((float)$it['total_amount'],2); ?></td>
            <td style="padding:8px;"><?php echo statusBadge($it); ?></td>
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>
