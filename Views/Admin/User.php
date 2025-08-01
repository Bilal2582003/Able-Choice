<?php

session_start();
include ("session.php");

$page = "User";
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

    input {
        margin: 3px
    }
    .hide{
        display: none;
    }
</style>
<main id="main">

    <!-- set breadcrumb -->
    <?php include "Master/breadcrumb.php"; ?>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

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
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>PARENT NAME</th>
                                    <th>PHONE</th>
                                    <th>CITY</th>
                                    <th>COUNTRY</th>
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

<div class="modal" id="showOrderDetail" style="min-width:80%">
    <div class="modal-dialog" style="min-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Details</h4>
                <button type="button" onclick="closeModal('showOrderDetail')" style="
    background-color: transparent;
    border: none;
    font-size: x-large;
    color: red;
    ">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <div class="row m-2">
                        <input type="hidden" id="editId">
                        <div class="col-4">
                            <label>Name</label>
                            <input type="text" id="editName" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Email</label>
                            <input type="text" id="editEmail" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Address</label>
                            <input type="text" id="editAddress" class="form-control">
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-4">
                            <label>Parent</label>
                            <input type="text" id="editParent" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>City</label>
                            <input type="text" id="editCity" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>State</label>
                            <input type="text" id="editState" class="form-control">
                        </div>

                    </div>
                    <div class="row m-2">
                        <div class="col-4">
                            <label>Country</label>
                            <input type="text" id="editCountry" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Phone</label>
                            <input type="text" id="editPhone" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Password</label>
                            <input type="text" class="form-control" id="editPassword">
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-4">
                            <label>Created At</label>
                            <input type="text" class="form-control" disabled id="editCreatedAt">
                        </div>
                    </div>

                    <div class="row" style="justify-content:flex-end">
                        <div class="col-4">
                            <button class="btn btn-secondary" id="historyBtn">Order History</button>
                        </div>
                    </div>

                    <div class="row hide" id="historyDiv">
                        <div class="col-8">
this is mee
                        </div>
                    </div>

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

        function showData(action) {
            $.ajax({
                url: '../../Controllers/Admin/_user.php', // Replace with your server endpoint
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
        $("#searchBtn").on("click", function () {
            var search = $("#search").val();
            $.ajax({
                url: '../../Controllers/Admin/_user.php', // Replace with your server endpoint
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

        $(document).on("click", ".userDetailModal", function () {
            var tr = $(this).closest('tr');
            var id = tr.find("td").eq(0).html().trim()
            alert(id)
            $.ajax({
                url: '../../Controllers/Admin/_user.php', // Replace with your server endpoint
                type: 'POST',
                data: {
                    id: id,
                    action: "getModalData"
                },
                success: function (data) {
                    console.log(data)
                    data = JSON.parse(data);
                    // console.log(data['user']['id'])
                    if (data['user']) {
                        document.getElementById('editId').value = data['user']['id'];
                        document.getElementById('editName').value = data['user']['name'];
                        document.getElementById('editEmail').value = data['user']['email'];
                        document.getElementById('editParent').value = data['user']['parent_name'];
                        document.getElementById('editPhone').value = data['user']['phone'];
                        document.getElementById('editPassword').value = data['user']['password'];
                        document.getElementById('editAddress').value = data['user']['address_add'];
                        document.getElementById('editCity').value = data['user']['city'];
                        document.getElementById('editState').value = data['user']['state'];
                        document.getElementById('editCountry').value = data['user']['country'];
                        document.getElementById('editCreatedAt').value = data['user']['created_at'];
                    }

                }

            })
        })

        $("#btnUpdateSubmit").on("click", function () {
            var name = $('#editName').val();
            var email = $('#editEmail').val();
            var phone = $('#editPhone').val();
            var add = $('#editAddress').val();
            var city = $('#editCity').val();
            var state = $('#editState').val();
            var country = $('#editCountry').val();
            var order_id = $('#modalEditId').val();
            $.ajax({
                url: '../../Controllers/Admin/_user.php',
                method: 'POST',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    add: add,
                    city: city,
                    state: state,
                    country: country,
                    order_id: order_id,
                    action: 'UpdateOrderData'
                },
                success: function (response) {
                    console.log(response)
                    if (response == '1') {
                        alert("Updated Successfully")
                    } else {
                        alert("Something went wrong!")
                    }
                }
            })
        })

        $("#historyBtn").on("click",function(){
                $("#historyDiv").toggleClass('hide')
        })
    })

</script>