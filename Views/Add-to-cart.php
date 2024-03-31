<style>
    .table-image {

        thead {

            td,
            th {
                border: 0;
                color: #666;
                font-size: 0.8rem;
            }
        }

        td,
        th {
            vertical-align: middle;
            text-align: center;

            &.qty {
                max-width: 2rem;
            }
        }
    }

    .price {
        margin-left: 1rem;
    }

    .modal-footer {
        padding-top: 0rem;
    }

    @media (min-width: 992px) {
        .modal-lg {
            max-width: 30%;
            /* Adjust as needed */
            margin-left: auto;
            margin-right: 2%;
        }
    }

    .modal-full-height {
        display: flex;
        align-items: stretch;
    }
</style>


<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-full-height" style="height:min-content !important"
        role="document">
        <div class="modal-content" style="height:90% !important">
            <div class="modal-header border-bottom-0 bg-dark">
                <h5 class="modal-title text-warning" id="exampleModalLabel">
                    Your Shopping Cart
                </h5>
                <button type="button" class="close cross bg-dark text-warning" onclick="closeModal('cartModal')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body h-100" style="overflow-y:scroll">
                <table class="table table-image">
                    <thead>
                        <tr>
                            <th scope="col" colspan="8"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * from card_detail join   ";
                        ?>
                        <tr rowspan="2">
                            <td><input type="checkbox" class="cartChk"></td>
                            <td class="w-40">
                                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png"
                                    class="img-fluid img-thumbnail" alt="Sheep">
                            </td>
                            <td colspan="5">
                                <div class="row">
                                    <p class="mb-0 " style="text-align:left">Vans Sk8-Hi MTE Shoes</p>
                                    <p class="mb-0 text-secondary " style="text-align:left">Rs: <span
                                            class="text-secondary perAmount">2000</span></p>
                                    <p class=" totalAmount" style="display:none"> 2000</p>
                                    <br>

                                    <div class="input-group row">
                                        <button type="button" class="decrementBtnCart col-lg-2 col-sm-2">-</button>
                                        <input type="text" style="border:none;text-align:center"
                                            class="qty qty2 col-lg-5 col-sm-5" value="1">
                                        <button type="button" class="incrementBtnCart col-lg-2 col-sm-2">+</button>
                                    </div>

                                </div>

                            </td>
                            <td>
                                <a href="#" style="font-size:large" class="btn btn-sm text-danger ">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr>
                <div class="d-flex justify-content-end">
                    <h5>Total: <span class="price text-success">89$</span></h5>
                </div>
            </div>
            <div class="modal-footer border-top-0 ">
                <button type="button" class="cartBtn">Cash On Delivery (COD)</button>
                <button type="button" class="cartBtn">Pay Now</button>

                <button type="button" class="cartBtn" onclick="closeModal('cartModal')">Close</button>

            </div>
        </div>
    </div>
</div>
<script>

    function totalAmountCart(action, data) {
        var parent = $(data).parent();
        var qty = $(parent).find('.qty');

        var parent_parent = $(parent).parent();
        var perAmount = $(parent_parent).find(".perAmount");
        var totalAmountElem = $(parent_parent).find(".totalAmount");

        if (qty.val()) {
            var qtyValue = parseInt(qty.val());
        } else {
            qtyValue = 1
        }

        if (action == '+') {
            qtyValue++;
        } else if (action == '-') {
            qtyValue--;
        }

        if (qtyValue < 1 && action != '*') {
            qtyValue = 1;
        }

        qty.val(qtyValue);


        var perAmountValue = parseFloat(perAmount.html());
        console.log(perAmountValue)
        var total = qtyValue * perAmountValue;
        totalAmountElem.html(total.toFixed(2));
        console.log(totalAmountElem.html())
    }
    function showCartData(){
        $.ajax({
            
        })
    }
    $(document).ready(function () {
        $(document).on('click', '.incrementBtnCart', function () {
            console.log("yes");
            totalAmountCart('+', $(this));
        });

        $(document).on('click', '.decrementBtnCart', function () {
            totalAmountCart('-', $(this));
        });

        $(document).on('keyup', '.qty2', function () {
            qty2(this)
        });

        function qty2(element) {
            var parent = $(element).parent().find(".decrementBtnCart");
            console.log($(element).val())
            // if( $(element).val() ){
                totalAmountCart('*', parent);
            // }
        }


    })
</script>