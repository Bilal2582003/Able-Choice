<?php
/**
 * customer_dashboard.php
 * Dashboard for logged-in customers (Able Choice)
 *
 * Requirements covered:
 * - Shows customer profile info
 * - Shows addresses (with primary if any)
 * - Order stats (total, active, completed, cancelled)
 * - Recent orders list with totals
 * - View order detail (AJAX)
 * - Cancel active order (AJAX, item-level safe)
 * - Cart summary count
 *
 * Assumes Bootstrap & jQuery are already included globally in your layout.
 */

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php');
    exit;
}

$USER_ID = (int) $_SESSION['user_id'];

include __DIR__ . '/../Model/connection.php'; // provides $con (mysqli)

function esc($s)
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

// 1) Fetch user
$user = null;
$uq = mysqli_query($con, "SELECT id, name, email, phone, parent_name, created_at FROM user WHERE id={$USER_ID} AND deleted_at IS NULL LIMIT 1");
if ($uq && mysqli_num_rows($uq) === 1) {
    $user = mysqli_fetch_assoc($uq);
}

// 2) Fetch addresses (list)
$addresses = [];
$aq = mysqli_query($con, "SELECT id, address, city, state, postal_code, country, created_at FROM address WHERE user_id={$USER_ID} AND deleted_at IS NULL ORDER BY id DESC");
if ($aq) {
    while ($row = mysqli_fetch_assoc($aq)) {
        $addresses[] = $row;
    }
}

// 3) Cart count (items for this user)
$cart_count = 0;
$ccq = mysqli_query($con, "SELECT COALESCE(SUM(qty),0) AS cnt FROM card_detail WHERE user_id={$USER_ID} AND (deleted_at IS NULL)");
if ($ccq) {
    $cart_count = (int) mysqli_fetch_assoc($ccq)['cnt'];
}

// 4) Order stats (based on order_items flags)
$stats = [
    'total_orders' => 0,
    'active_orders' => 0,
    'completed_orders' => 0,
    'cancelled_orders' => 0,
];

// Total orders
$tq = mysqli_query($con, "SELECT COUNT(*) AS c FROM orders WHERE user_id={$USER_ID}");
if ($tq) {
    $stats['total_orders'] = (int) mysqli_fetch_assoc($tq)['c'];
}

// Active / Completed / Cancelled derived from order_items
// Rule: cancelled if any item is_cancelled=1; completed if all items is_completed=1 and none cancelled; else active
$oq = mysqli_query($con, "
            SELECT o.id,
                SUM(CASE WHEN oi.is_cancelled=1 THEN 1 ELSE 0 END) AS cancelled_items,
                SUM(CASE WHEN oi.is_completed=1 THEN 1 ELSE 0 END) AS completed_items,
                COUNT(*) AS total_items
            FROM orders o
            JOIN order_items oi ON oi.order_id = o.id
            WHERE o.user_id={$USER_ID}
            GROUP BY o.id
        ");
if ($oq) {
    while ($r = mysqli_fetch_assoc($oq)) {
        if ((int) $r['cancelled_items'] > 0) {
            $stats['cancelled_orders']++;
        } elseif ((int) $r['completed_items'] === (int) $r['total_items']) {
            $stats['completed_orders']++;
        } else {
            $stats['active_orders']++;
        }
    }
}

// 5) Recent orders (last 10)
$orders = [];
$roq = mysqli_query($con, "
            SELECT o.id, o.order_date, o.payment_method, o.total_amount, o.shipping_cost, o.net_amount,
                SUM(oi.qty) AS total_qty,
                SUM(oi.total_amount) AS items_total,
                SUM(CASE WHEN oi.is_cancelled=1 THEN 1 ELSE 0 END) AS cancelled_items,
                SUM(CASE WHEN oi.is_completed=1 THEN 1 ELSE 0 END) AS completed_items,
                COUNT(oi.id) AS items_count
            FROM orders o
            LEFT JOIN order_items oi ON oi.order_id=o.id
            WHERE o.user_id={$USER_ID}
            GROUP BY o.id
            ORDER BY o.order_date DESC, o.id DESC
            LIMIT 10
        ");
if ($roq) {
    while ($row = mysqli_fetch_assoc($roq)) {
        // derive status
        $status = 'Active';
        if ((int) $row['cancelled_items'] > 0)
            $status = 'Cancelled';
        elseif ((int) $row['completed_items'] === (int) $row['items_count'] && (int) $row['items_count'] > 0)
            $status = 'Completed';
        $row['status'] = $status;
        $orders[] = $row;
    }
}
?>



<?php
$page = "Customer Dashboard";
// session_start();
// echo $_SESSION['token']; 
include "Master/header.php";
include '../Model/connection.php';

?>
<!-- <style>
    /* General Reset */
    body {
        font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    /* Card */
    .card {
        border: none;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
    }

    .card h5 {
        font-weight: 600;
        margin-bottom: 8px;
    }

    .card h3 {
        font-weight: 700;
    }

    /* Grid Layouts */
    .grid {
        display: grid;
        gap: 20px;
    }

    .grid-4 {
        grid-template-columns: repeat(4, 1fr);
    }

    .grid-2 {
        grid-template-columns: repeat(2, 1fr);
    }

    /* Badges */
    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge.active {
        background: #e3f2fd;
        color: #0b74b6;
    }

    .badge.completed {
        background: #e8f5e9;
        color: #2e7d32;
    }

    .badge.cancelled {
        background: #ffebee;
        color: #c62828;
    }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    th {
        background-color: #f1f3f4;
        font-weight: 600;
        text-align: center;
    }

    td,
    th {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    tr:nth-child(even) {
        background-color: #fafafa;
    }

    /* Topbar */
    .topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    /* Tabs */
    .tabs {
        display: flex;
        gap: 10px;
        margin: 20px 0;
    }

    .tab {
        padding: 8px 16px;
        border-radius: 10px;
        border: 1px solid #ddd;
        background: #fff;
        cursor: pointer;
        transition: all .2s;
    }

    .tab:hover {
        background: #f5f5f5;
    }

    .tab.active {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }

    /* Muted Text */
    .muted {
        color: #6c757d;
        font-size: 13px;
    }

    /* Search Input */
    #orderSearch {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 8px 12px;
        outline: none;
    }

    #orderSearch:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 4px rgba(13, 110, 253, .2);
    }

    /* Modal */
    #orderDetailModal {
        position: fixed;
        inset: 0;
        display: none;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, .5);
        z-index: 1050;
    }

    #orderDetailModal>div {
        background: #fff;
        border-radius: 12px;
        width: 95%;
        max-width: 900px;
        padding: 24px;
        position: relative;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .2);
    }

    #odmClose {
        position: absolute;
        top: 12px;
        right: 12px;
        background: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    #odmClose:hover {
        color: #c62828;
    }
</style> -->
<style>
    .card { border:1px solid #eee; border-radius:12px; padding:16px; margin-bottom:16px; box-shadow: 0 2px 10px rgba(0,0,0,.03);} 
    .card h5 { margin:0 0 8px; }
    .grid { display:grid; gap:16px; }
    .grid-4 { grid-template-columns: repeat(4, minmax(0,1fr)); }
    .grid-2 { grid-template-columns: repeat(2, minmax(0,1fr)); }
    .badge { display:inline-block; padding:4px 10px; border-radius:20px; font-size:12px; }
    .badge.active { background:#e8f5ff; color:#0b74b6; }
    .badge.completed { background:#e8ffe9; color:#2a8a3a; }
    .badge.cancelled { background:#ffeaea; color:#b61827; }
    table { width:100%; border-collapse: collapse; }
    th, td { padding:10px 12px; border-bottom:1px solid #eee; text-align:left; }
    .table-actions button { margin-right:8px; }
    .muted { color:#666; font-size: 12px; }
    .topbar { display:flex; align-items:center; justify-content:space-between; margin-bottom: 16px; }
    .tabs { display:flex; gap:8px; margin-bottom:16px; }
    .tab { padding:8px 12px; border-radius:10px; border:1px solid #ddd; cursor:pointer; }
    .tab.active { background:#111; color:#fff; border-color:#111; }
    .hidden { display:none; }
     table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
    }

    th {
        background-color: #f1f3f4;
        font-weight: 600;
        text-align: center;
    }

    td,
    th {
        padding: 12px;
        border-bottom: 1px solid #eee;
    }

    tr:nth-child(even) {
        background-color: #fafafa;
    }
     #odmClose {
        position: absolute;
        top: 12px;
        right: 12px;
        background: transparent;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    #odmClose:hover {
        color: #c62828;
    }
  </style>
<main id="main">

    <!-- set breadcrumb -->
    <?php include "Master/breadcrumb.php"; ?>

    <div class="container m-2">
        <div class="topbar">
            <div>
                <h2>Welcome, <?php echo esc($user['name'] ?? 'Customer'); ?> 👋</h2>
                <div class="muted">Member since:
                    <?php echo esc(date('M d, Y', strtotime($user['created_at'] ?? 'now'))); ?>
                </div>
            </div>
            <!-- <div>
                <a href="../Controllers/Logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
            </div> -->
        </div>

        <!-- Stats -->
        <div class="grid grid-4">
            <div class="card">
                <h5>Total Orders</h5>
                <div style="font-size:28px;font-weight:700;"><?php echo (int) $stats['total_orders']; ?></div>
            </div>
            <div class="card">
                <h5>Active</h5>
                <div style="font-size:28px;font-weight:700;"><?php echo (int) $stats['active_orders']; ?></div>
            </div>
            <div class="card">
                <h5>Completed</h5>
                <div style="font-size:28px;font-weight:700;"><?php echo (int) $stats['completed_orders']; ?></div>
            </div>
            <div class="card">
                <h5>Cart Items</h5>
                <div style="font-size:28px;font-weight:700;"><?php echo (int) $cart_count; ?></div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active" data-tab="#tab-orders">Orders</div>
            <div class="tab" data-tab="#tab-profile">Profile</div>
            <div class="tab" data-tab="#tab-address">Addresses</div>
            <div class="tab" data-tab="#tab-cart">Cart</div>
        </div>

        <!-- Orders Tab -->
        <div id="tab-orders" class="card">
            <div class="topbar">
                <h3>Your Orders</h3>
                <div>
                    <input type="text" id="orderSearch" placeholder="Search by ID or payment method"
                        style="padding:8px 10px;width:260px;">
                </div>
            </div>
            <div class="table-responsive">
                <table id="ordersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($orders)): ?>
                            <tr>
                                <td colspan="7" class="muted">No orders yet.</td>
                            </tr>
                        <?php else:
                            foreach ($orders as $o): ?>
                                <tr data-row-order-id="<?php echo (int) $o['id']; ?>">
                                    <td>#<?php echo (int) $o['id']; ?></td>
                                    <td><?php echo esc(date('Y-m-d H:i', strtotime($o['order_date']))); ?></td>
                                    <td><?php echo (int) $o['total_qty']; ?> items</td>
                                    <td><?php echo esc($o['payment_method']); ?></td>
                                    <td>PKR <?php echo number_format((float) $o['net_amount'], 2); ?></td>
                                    <td>
                                        <?php if ($o['status'] === 'Cancelled'): ?>
                                            <span class="badge cancelled">Cancelled</span>
                                        <?php elseif ($o['status'] === 'Completed'): ?>
                                            <span class="badge completed">Completed</span>
                                        <?php else: ?>
                                            <span class="badge active">Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="table-actions">
                                        <button class="btn btn-sm btn-primary js-view-order"
                                            data-order-id="<?php echo (int) $o['id']; ?>">View</button>
                                        <?php if ($o['status'] === 'Active'): ?>
                                            <button class="btn btn-sm btn-outline-danger js-cancel-order"
                                                data-order-id="<?php echo (int) $o['id']; ?>">Cancel</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Profile Tab -->
        <div id="tab-profile" class="card hidden">
            <h3>Profile</h3>
            <div class="grid grid-2">
                <div class="card">
                    <h5>Basic Info</h5>
                    <div class="muted">Name</div>
                    <div><?php echo esc($user['name'] ?? ''); ?></div>
                    <div class="muted" style="margin-top:8px;">Email</div>
                    <div><?php echo esc($user['email'] ?? ''); ?></div>
                    <div class="muted" style="margin-top:8px;">Phone</div>
                    <div><?php echo esc($user['phone'] ?? ''); ?></div>
                    <div class="muted" style="margin-top:8px;">Parent Name</div>
                    <div><?php echo esc($user['parent_name'] ?? ''); ?></div>
                </div>
                <div class="card">
                    <h5>Security</h5>
                    <div class="muted">If you want, add a "Change Password" form here.</div>
                </div>
            </div>
        </div>

        <!-- Address Tab -->
        <div id="tab-address" class="card hidden">
            <div class="topbar">
                <h3>Addresses</h3>
                <!-- <button id="addAddressBtn" class="btn btn-sm btn-primary">Add Address</button> -->
            </div>
            <div class="grid grid-2">
                <?php if (empty($addresses)): ?>
                    <div class="muted">No addresses saved yet.</div>
                <?php else:
                    foreach ($addresses as $a): ?>
                        <div class="card">
                            <h5><?php echo esc($a['city']); ?>, <?php echo esc($a['state']); ?></h5>
                            <div><?php echo esc($a['address']); ?></div>
                            <div class="muted"><?php echo esc($a['country']); ?> • <?php echo esc($a['postal_code']); ?></div>
                        </div>
                    <?php endforeach; endif; ?>
            </div>
        </div>

        <!-- Cart Tab (summary only) -->
        <div id="tab-cart" class="card hidden">
            <h3>Cart</h3>
            <div>Items in your cart: <strong><?php echo (int) $cart_count; ?></strong></div>
            <div class="muted">Go to your cart page to update quantities or checkout.</div>
        </div>
    </div>

    <!-- Order Detail Modal -->
    <div id="orderDetailModal"
        style="position:fixed; inset:0; display:none; align-items:center; justify-content:center; background:rgba(0,0,0,.5); z-index: 1;">
        <div style="background:#fff; border-radius:12px; width:95%; max-width:900px; padding:16px; position:relative;">
            <button id="odmClose" style="position:absolute; top:10px; right:10px;">✕</button>
            <h3>Order Details</h3>
            <div id="orderDetailBody" class="muted">Loading…</div>
        </div>
    </div>
</main>
<?php
include "Master/footer.php";
?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Tabs
    $(document).on('click', '.tab', function () {
        $('.tab').removeClass('active');
        $(this).addClass('active');
        const target = $(this).data('tab');
        ['#tab-orders', '#tab-profile', '#tab-address', '#tab-cart'].forEach(id => $(id).addClass('hidden'));
        $(target).removeClass('hidden');
    });

    // Search in orders table
    $('#orderSearch').on('keyup', function () {
        const q = $(this).val().toLowerCase();
        $('#ordersTable tbody tr').each(function () {
            const rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.indexOf(q) !== -1);
        });
    });

    // View order detail
    $(document).on('click', '.js-view-order', function () {
        const orderId = $(this).data('order-id');
        $('#orderDetailBody').html('Loading…');
        $('#orderDetailModal').css('display', 'flex');
        $.post('../Controllers/_order_detail.php', { order_id: orderId }, function (html) {
            $('#orderDetailBody').html(html);
        }).fail(function () {
            $('#orderDetailBody').html('<div style="color:#b61827;">Failed to load order details.</div>');
        });
    });
    $('#odmClose').on('click', function () { $('#orderDetailModal').hide(); });

    // Cancel order (confirms, then calls endpoint)
    $(document).on('click', '.js-cancel-order', function () {
        const orderId = $(this).data('order-id');
        if (!confirm('Are you sure you want to cancel this order?')) return;
        $.post('../Controllers/_cancel_order.php', { order_id: orderId }, function (resp) {
            try { var r = JSON.parse(resp); } catch (e) { r = { ok: false, msg: 'Unexpected response' }; }
            alert(r.msg);
            if (r.ok) { location.reload(); }
        }).fail(function () { alert('Request failed.'); });
    });
});
</script>