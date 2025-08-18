<?php
// _cancel_order.php — cancels an active order (item-level flags)
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) { echo json_encode(['ok'=>false,'msg'=>'Login required']); exit; }
$USER_ID = (int) $_SESSION['user_id'];

include __DIR__ . '/../Model/connection.php';

$order_id = isset($_POST['order_id']) ? (int)$_POST['order_id'] : 0;
if ($order_id <= 0) { echo json_encode(['ok'=>false,'msg'=>'Invalid order']); exit; }

// Ensure order belongs to this user and is not already cancelled/completed entirely
$oq = mysqli_query($con, "SELECT id FROM orders WHERE id={$order_id} AND user_id={$USER_ID} LIMIT 1");
if (!$oq || mysqli_num_rows($oq) === 0) { echo json_encode(['ok'=>false,'msg'=>'Order not found']); exit; }

// Mark all active items as cancelled (keep already completed items as is)
$upd = mysqli_query($con, "UPDATE order_items SET is_cancelled=1, is_active=0 WHERE order_id={$order_id} AND (is_completed IS NULL OR is_completed=0) AND (is_cancelled IS NULL OR is_cancelled=0)");
if ($upd) {
    echo json_encode(['ok'=>true,'msg'=>'Order has been cancelled.']);
} else {
    echo json_encode(['ok'=>false,'msg'=>'Failed to cancel.']);
}
