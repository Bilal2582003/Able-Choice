<?php

session_start();
include ("session.php");

$page = "productCategory";
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
                                <div class="col-1" style="display:flex;align-items:center;">
                                    <button id="searchBtn" class="btn btn-success">Search</button>
                                </div>


                                <div class="col-2" style="display:flex;align-items:center;">

                                    <button class="btn btn-primary" onclick="openModal(`addProductCategory`,0)">
                                        Add New
                                    </button>
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Created At</th>
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
                <h4 class="modal-title">Category Details</h4>
                <button type="button" onclick="closeModal('showOrderDetail')" style="
    background-color: transparent;
    border: none;
    font-size: x-large;
    color: red;
    ">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-12" id="EditModalForm">

                </div>
                <br>
                <hr>
                <button type="button" class="btn UBtn" onclick="updateProductCategory()">Update</button>
                <button type="button" class="btn CBtn float-right"
                    onclick="closeModal('showOrderDetail')">Close</button>

            </div>
        </div>
    </div>
</div>
<div class="modal" id="addProductCategory" style="min-width:80%">
    <div class="modal-dialog" style="min-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" onclick="closeModal('addProductCategory')" style="
    background-color: transparent;
    border: none;
    font-size: x-large;
    color: red;
    ">&times;</button>
            </div>
            <div class="modal-body">

                <div class="col-12" id="modalBody">
                <div class="row">
                    <div class="col-3" style="text-align:right;"><label style="vertical-align:sub">Name</label></div>
                    <div class="col-9"><input class="form-control" style="width: 80%; padding:5px border-radius:13px;" type="text" id="name" ></div>
                </div>
                </div>
                <br>
                <hr>
                <button type="button" class="btn UBtn" id="addNew">Add</button>
                <button type="button" class="btn CBtn float-right"
                    onclick="closeModal('addProductCategory')">Close</button>

            </div>
        </div>
    </div>
</div>

<?php
include "Master/footer.php";
?>
<script>
    function showTable() {
        $(document).ready(function () {
            $.ajax({
                url: "../../Controllers/Admin/_productCategory.php",
                type: "POST",
                data: {
                    Action: "showTable"
                },
                success: function (data) {
                    //  console.log(data)
                    $("#tbody").html(data)
                }
            })
        })
    }
    showTable();


    function getCategoryData(id) {
        // console.log(1)
        var dId = id;
        $(document).ready(function () {
            $.ajax({
                url: "../../Controllers/Admin/_productCategory.php",
                type: "POST",
                data: {
                    id: id,
                    Action: "fetchModal"
                },
                success: function (data) {
                    // console.log(data)
                    $("#EditModalForm").html(data)
                }
            });
        });

    };


    function updateProductCategory() {
        var editId = document.getElementById("editId").value
        var editname = document.getElementById("editName").value
       
        $(document).ready(function () {
            $.ajax({
                url: "../../Controllers/Admin/_productCategory.php",
                type: "POST",
                data: {
                    id: editId,
                    name: editname,
                    Action: "Update"
                },
                success: function (data) {
                    // console.log(data)
                    if (data == 1) {
                        alert("Updated Category successfully");
                        showTable();
                        closeModal('showOrderDetail');
                    } else {
                        console.log(data)
                    }
                }
            });
        });
    }



    // delete group
    function deleteBtn(id) {
        if (confirm("Do you want to delete!") == true) {
            window.location.assign("../../Controllers/Admin/_productCategory.php?id=" + id);
        }
    }





    $(document).ready(function () {
        $("#addNew").on("click", function () {

            var name = $("#name").val();

            if (name != '') {
                $.ajax({
                    url: "../../Controllers/Admin/_productCategory.php",
                    type: "POST",
                    data: {
                        name: name,
                        Action: "add"
                    },
                    success: function (data) {
                        console.log(data)
                        if (data == 1) {
                            alert("Added Categpory");
                            showTable();
                            closeModal('addProductCategory');

                            $("#name").val('');
                        }
                    }
                });
            } else {
                alert("Some Fields are empty!")
            }

        });
        //   end add new depart

    });
</script>