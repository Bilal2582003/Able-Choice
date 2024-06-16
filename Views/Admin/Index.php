<?php

session_start();
include ("session.php");

$page = "Order";
include "Master/header.php";
include '../../Model/connection.php';

?>
<style>
    th {
        background-color: lightgray;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
        margin: 2px;
        padding: 5px;

    }

    td,
    th {
        padding: 10px;
        text-align: center;
    }

    .status {
        width: 100%;
        margin: 5px;
        border-radius: 3px;
        border: 1px solid #ccc;
        padding: 5px;
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
        font-size: 14px;

    }
</style>
<main id="main">

    <!-- set breadcrumb -->
    <?php include "Master/breadcrumb.php"; ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">


                <div class="col-lg-4 col-md-4" id="activeOrder">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <!-- <i class="bi bi-envelope"></i> -->
                        <i class="bi bi-hourglass-split"></i>
                        <h3>Active Order</h3>
                        <p id="activeCounter">
                            3
                        </p>

                    </div>
                </div><!-- End Info Item -->
                <div class="col-lg-4 col-md-4" id="cancelOrder">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-x-circle"></i>
                        <h3>Cancel Order</h3>
                        <p id="cancelCounter">
                            3
                        </p>

                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-4 col-md-4" id="completedOrder">
                    <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                        <i class="bi bi-check-circle"></i>
                        <h3>Completed Order</h3>
                        <p id="completedCounter">
                            3
                        </p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-12 col-md-12">
                    <div class="info-item">
                        <div
                            style="margin:0px auto 0px auto;padding:0px 10px 10px 10px;max-height:500px; overflow-y:auto;width:100%">


                            <table width="100%" style="margin:auto">
                                <thead style="position:sticky;top:0px">

                                    <th>USER</th>
                                    <th>NAME</th>
                                    <th>IMAGE</th>
                                    <th>QTY</th>
                                    <th>UNIT AMOUNT</th>
                                    <th>TOTAL</th>
                                    <th>PHONE</th>

                                    <th>STATUS</th>
                                    <th>ACTION</th>

                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section><!-- End Contact Section -->


</main><!-- End #main -->
<div id="chkStatus" style="display:none">all</div>


<div class="modal" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="update.php" id="edit-form">
                    <input class="form-control" type="hidden" name="id">
                    <!-- Input fields for email, first name, last name, and address -->
                    <!-- ... -->
                    <button type="button" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "Master/footer.php";
?>
<script>
    $(document).ready(function () {
        $("#activeOrder").on("click", function () {
            showData('active');
            $("#chkStatus").html('active');
        })
        $("#cancelOrder").on("click", function () {
            showData('cancel');
            $("#chkStatus").html('cancel')
        })
        $("#completedOrder").on("click", function () {
            showData('completed');
            $("#chkStatus").html('completed')
        })

        function showData(action) {
            $.ajax({
                url: '../../Controllers/Admin/_orders.php', // Replace with your server endpoint
                type: 'POST',
                data: {
                    forTable: 'table',
                    action: action,
                },
                success: function (data) {
                    // console.log(data)
                    if (data != 0) {
                        $("#tbody").html(data)

                    } else {
                        alert("No Record Found!")
                        $("#tbody").html('')
                    }
                }
            })
        }
        showData('all')
        showCounter();


        $(document).on("change", ".status", function () {
            var id = $(this).closest('tr').find('td:first').text().trim(); // Get the ID from the first column of the same row

            // Store a reference to the outer scope 'this'
            var $this = $(this);

            // Send AJAX request to update the status
            $.ajax({
                url: '../../Controllers/Admin/_orders.php',
                method: 'POST',
                data: {
                    id: id,
                    status: $this.val(),
                    action: 'updateStatus'
                },
                success: function (response) {
                    console.log(response); // Log the response from the server
                    // You can perform further actions based on the response, like updating UI
                    showData($("#chkStatus").html())
                    showCounter()

                },
                error: function (xhr, status, error) {
                    console.error(error); // Log any errors
                }
            });
        });


        function showCounter() {
            $.ajax({
                url: '../../Controllers/Admin/_orders.php',
                method: 'POST',
                data: {
                    action: 'counter'
                },
                success: function (response) {
                    var data = response.split('!')
                    document.getElementById("activeCounter").innerHTML = data[0]
                    document.getElementById("cancelCounter").innerHTML = data[1]
                    document.getElementById("completedCounter").innerHTML = data[2]
                }
            })

        }

        
    })
    function showOrderDetail(id){
        $(document).ready(function(){
            $.ajax({
                url: '../../Controllers/Admin/_orders.php',
                method: 'POST',
                data: {
                    action: 'editModal'
                },
                success: function (response) {
                  
                }
            })
        })
    }
</script>