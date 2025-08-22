<?php
session_start();
include('session.php');
include "../../Model/connection.php";
$page = "Admin Dashboard";
include "Master/header.php";
?>
<main id="main">

    <!-- set breadcrumb -->
    <?php include "Master/breadcrumb.php"; ?>
    <section class="my-5">
        <?php

        function esc($s)
        {
            return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
        }

        // Quick Stats
        $totalUsers = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) c FROM user WHERE deleted_at IS NULL"))['c'] ?? 0;
        $totalProducts = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) c FROM product WHERE deleted_at IS NULL"))['c'] ?? 0;
        $totalCategories = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) c FROM product_category WHERE deleted_at IS NULL"))['c'] ?? 0;
        $totalOrders = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) c FROM orders"))['c'] ?? 0;


        ?>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/> -->
        <style>
            body {
                background: #f5f6fa;
                font-family: 'Segoe UI', Tahoma, sans-serif;
            }

            .wrapper {
                display: flex;
                min-height: 100vh;
            }

            .sidebar {
                width: 250px;
                background: #111827;
                color: #fff;
                padding: 20px;
            }

            .sidebar h2 {
                font-size: 20px;
                margin-bottom: 20px;
            }

            .sidebar a {
                display: block;
                padding: 10px 14px;
                color: #cbd5e1;
                border-radius: 8px;
                text-decoration: none;
                margin-bottom: 6px;
            }

            .sidebar a.active,
            .sidebar a:hover {
                background: #2563eb;
                color: #fff;
            }

            .content {
                flex: 1;
                padding: 20px;
            }

            .topbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .card {
                border: none;
                border-radius: 12px;
                padding: 20px;
                background: #fff;
                box-shadow: 0 4px 10px rgba(0, 0, 0, .05);
            }

            .grid {
                display: grid;
                gap: 20px;
            }

            .grid-4 {
                grid-template-columns: repeat(4, 1fr);
            }

            .hidden {
                display: none;
            }
        </style>

        <div class="wrapper">
            <!-- Sidebar -->
            <div class="sidebar">
                <h2><i class="fa fa-cogs"></i> Admin Panel</h2>
                <a href="#" class="menu-link active" data-page="#page-dashboard"><i class="fa fa-chart-line"></i>
                    Dashboard</a>
                <a href="#" class="menu-link" data-page="#page-products"><i class="fa fa-box"></i> Products</a>
                <a href="#" class="menu-link" data-page="#page-categories"><i class="fa fa-tags"></i> Categories</a>
                <a href="#" class="menu-link" data-page="#page-users"><i class="fa fa-users"></i> Users</a>
                <a href="#" class="menu-link" data-page="#page-orders"><i class="fa fa-shopping-cart"></i> Orders</a>
                <a href="Logout.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="topbar">
                    <h2><?= esc($page) ?></h2>
                    <div>Welcome Admin</div>
                </div>

                <!-- Dashboard -->
                <div id="page-dashboard">
                    <div class="grid grid-4">
                        <div class="card">
                            <h5>Users</h5>
                            <h3><?= $totalUsers ?></h3>
                        </div>
                        <div class="card">
                            <h5>Products</h5>
                            <h3><?= $totalProducts ?></h3>
                        </div>
                        <div class="card">
                            <h5>Categories</h5>
                            <h3><?= $totalCategories ?></h3>
                        </div>
                        <div class="card">
                            <h5>Orders</h5>
                            <h3><?= $totalOrders ?></h3>
                        </div>
                    </div>
                    <div class="card" style="margin-top:20px;">
                        <canvas id="salesChart" height="120"></canvas>
                    </div>
                </div>

                <!-- Products -->
                <div id="page-products" class="hidden card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <input type="text" class="form-control w-25" id="productSearch" placeholder="Search product...">
                        <button class="btn btn-primary btn-sm" onclick="openProductForm()">+ Add Product</button>
                    </div>
                    <div id="productsTable">Loading products…</div>
                </div>


                <!-- Categories -->
                <div id="page-categories" class="hidden card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Manage Categories</h3>
                        <!-- <button class="btn btn-primary btn-sm" id="addCategoryBtn"><i class="fa fa-plus"></i> Add Category</button> -->
                    </div>
                    <div id="categoriesTable">Loading categories…</div>
                </div>

                <!-- Users -->
                <div id="page-users" class="hidden card">
                    <h3>Manage Users</h3>
                    <div id="usersTable">Loading users…</div>
                </div>

                <!-- Orders -->
                <div id="page-orders" class="hidden card">
                    <h3>Manage Orders</h3>
                    <div id="ordersTable">Loading orders…</div>
                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="modalBox" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3" id="modalContent">
            </div>
        </div>
    </div>
    <?php
    include "Master/footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function openProductForm(id = 0) {
            $("#modalContent").html("Loading...");
            $("#modalBox").modal("show");
            $.get("../../Controllers/Admin/_product_form.php?id=" + id, function (html) {
                $("#modalContent").html(html);
            });
        }
        function editProduct(id) {
            openProductForm(id);
        }
        function deleteProduct(id) {
            if (confirm("Delete this product?")) {
                $.post("../../Controllers/Admin/_product_delete.php", { id: id }, function (res) {
                    alert(res);
                    loadSection("../../Controllers/Admin/_products_list.php", "#productsTable");
                });
            }
        }
        $(function () {
            // Sidebar Navigation
            $('.menu-link').on('click', function (e) {
                e.preventDefault();
                $('.menu-link').removeClass('active'); $(this).addClass('active');
                ['#page-dashboard', '#page-products', '#page-categories', '#page-users', '#page-orders'].forEach(id => $(id).addClass('hidden'));
                $($(this).data('page')).removeClass('hidden');
            });

            // Load Data via AJAX
            // function loadSection(url, target){
            //     $.get(url,function(html){ $(target).html(html); })
            //      .fail(()=>$(target).html('<div class="text-danger">Failed to load.</div>'));
            // }
            window.loadSection = function (url, target) {
                $.get(url, function (html) { $(target).html(html); })
                    .fail(() => $(target).html('<div class="text-danger">Failed to load.</div>'));
            }
            loadSection('../../Controllers/Admin/_products_list.php', '#productsTable');
            loadSection('../../Controllers/Admin/_categories_list.php', '#categoriesTable');
            loadSection('../../Controllers/Admin/_users_list.php', '#usersTable');
            loadSection('../../Controllers/Admin/_orders_list.php', '#ordersTable');

            // Chart.js Demo
            const ctx = document.getElementById('salesChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'Sales',
                            data: [500, 800, 600, 1200, 900, 1500],
                            borderColor: '#2563eb',
                            backgroundColor: 'rgba(37,99,235,0.2)',
                            tension: 0.3,
                            fill: true
                        }]
                    }
                });
            }
        });
    </script>