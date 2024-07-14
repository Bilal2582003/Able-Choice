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

    .UBtn {
        border-radius: 7px;
        margin: 10px auto;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 11px;
        transition: .25s ease-in-out !important;
        font-weight: 600;
        min-height: 40px;
        padding: 5px 25px;
        background-color: black;
        color: gold;
        width: 20%;
        font-family: fontAwesome
    }

    .UBtn:hover {
        background-color: white;
        /* box-shadow: 0px 3px 6px gold; */
        border: 1.5px solid gold;
        color: black;
        /* box-shadow: gold 1px 4px 15px 9px; */
    }

    .CBtn {
        border-radius: 7px;
        margin: 10px auto;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 11px;
        transition: .25s ease-in-out !important;
        font-weight: 600;
        min-height: 40px;
        padding: 5px 25px;
        background-color: red;
        color: white;
        width: 20%;
        font-family: fontAwesome
    }

    .CBtn:hover {
        background-color: white;
        /* box-shadow: 0px 3px 6px gold; */
        border: 1.5px solid red;
        color: red;
        /* box-shadow: gold 1px 4px 15px 9px; */
    }
    input{
        margin:3px
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
                        
                    <div class="container mt-4">
                            <div class="row">
                                <div class="offset-1 col-8"
                                    style="display:flex;justify-content:center;align-items:center">
                                    <label for="search" class="search-label m-2 ">Search</label>
                                    <input type="text" id="search" class=" m-2 form-control search-bar"
                                        placeholder="Type your search here..." />
                                </div>
                                <div class="col-2" style="display:flex;align-items:center;">
                                    <button id="searchBtn" class="btn btn-success">Search</button>
                                </div>
                            </div>
                            <br>
                            <hr style="width:85%;margin:auto;color:orange;border:1px solid orange">
                            <br>
                        </div>
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


<div class="modal" id="showOrderDetail" style="min-width:80%">
    <div class="modal-dialog" style="min-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
                <button type="button" onclick="closeModal('showOrderDetail')" style="
    background-color: transparent;
    border: none;
    font-size: x-large;
    color: red;
">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-12" id="modalBody">

                </div>
                <br>
                <hr>
                <button type="button" class="btn UBtn" id="btnUpdateSubmit">Update</button>
                <button type="button" class="btn CBtn float-right"
                    onclick="closeModal('showOrderDetail')">Close</button>

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


        $("#searchBtn").on("click",function(){
           var search = $("#search").val();
            $.ajax({
                url: '../../Controllers/Admin/_orders.php', // Replace with your server endpoint
                type: 'POST',
                data: {
                    search: search,
                    action: "search"
                },
                success: function (data) {
                    console.log(data)
                    if (data != 0) {
                        $("#tbody").html(data)

                    } else {
                        alert("There is not any order on this location!")
                        $("#tbody").html('')
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error); // Handle any errors here
                }
            });
        })


        $("#btnUpdateSubmit").on("click",function(){
           var name = $('#editName').val();
           var email = $('#editEmail').val();
           var phone = $('#editPhone').val();
           var add = $('#editAddress').val();
           var city = $('#editCity').val();
           var state = $('#editState').val();
           var country = $('#editCountry').val();
           var order_id = $('#modalEditId').val();
           $.ajax({
            url: '../../Controllers/Admin/_orders.php',
                method: 'POST',
                data: {
                    name:name,
                    email:email,
                    phone:phone,
                    add:add,
                    city:city,
                    state:state,
                    country:country,
                    order_id:order_id,
                    action: 'UpdateOrderData'
                },
                success: function (response) {
                    console.log(response)
                    if(response == '1'){
                        alert("Updated Successfully")
                    }else{
                        alert("Something went wrong!")
                    }
                }
           })
        })

    })

</script>