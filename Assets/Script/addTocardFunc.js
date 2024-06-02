function totalAmountCart(action, data) {
  var parent = $(data).parent();
  var qty = $(parent).find(".qty");

  var parent_parent = $(parent).parent();
  var perAmount = $(parent_parent).find(".perAmount");
  var totalAmountElem = $(parent_parent).find(".totalAmount");

  if (qty.val()) {
    var qtyValue = parseInt(qty.val());
  } else {
    qtyValue = 1;
  }

  if (action == "+") {
    qtyValue++;
  } else if (action == "-") {
    qtyValue--;
  }

  if (qtyValue < 1 && action != "*") {
    qtyValue = 1;
  }

  qty.val(qtyValue);

  var perAmountValue = parseFloat(perAmount.html());
  console.log(perAmountValue);
  var total = qtyValue * perAmountValue;
  totalAmountElem.html(total.toFixed(2));
  console.log(totalAmountElem.html());

  if(action == '+'){
      $("#totalSum").html(
        parseInt($("#totalSum").html()) + parseInt(perAmountValue)
      );
      if(setNetAmount()){
        setNetAmount()
      }
  }else if(action == '-'){
    $("#totalSum").html(
        parseInt($("#totalSum").html()) - parseInt(perAmountValue)
      );
      if(setNetAmount()){
        setNetAmount()
      }
  }

}
function showCartData() {
  $.ajax({
    url: "../Controllers/_cardData.php", // Replace with your server endpoint
    type: "POST",
    data: {
      page: "GetAddToCartData",
    },
    success: function (data) {
      data = data.split("!");
      var sum = data[0];
      var output = data[1];
      var rowCount = data[2];
      if (output != 0) {
        $("#AddToCardTableData").html(output);
      } else {
        $("#AddToCardTableData").html("");
      }
      $("#totalSum").html(sum);
      $("#addToCardIconValue").html(rowCount);
    },
  });
}
// showCartData();

function updateAddToCart(element, id) {
  // Show the loader

  $(document).ready(function () {
    setTimeout(() => {
      // Traverse up to the grandparent element of the clicked button
      var parent = $(element).parent().parent();

      // Find the elements by class name within the parent
      var perAmount = parent.find(".perAmount").html();
      var qty = parent.find(".qty2").val();
      var totalAmount = parent.find(".totalAmount").html();
     

      // Alert the values for debugging purposes
      // alert('ID: ' + id + ' Per Amount: ' + perAmount + ' Total Amount: ' + totalAmount + ' Quantity: ' + qty);
      $.ajax({
        url: "../Controllers/_cardData.php", // Replace with your server endpoint
        type: "POST",
        data: {
          id: id,
          perAmount: perAmount,
          totalAmount: totalAmount,
          qty: qty,
          page: "updateAddToCartValue",
        },
        success: function (res) {
          console.log(res);
        },
      });
    }, 1000);
  });
}

function deleteCartItem(element, id) {
  $(document).ready(function () {
    var tr = $(element).closest("tr");
    tr.css("display", "none");
    var cartCount = $("#addToCardIconValue");
    cartCount.html(parseInt(cartCount.html()) - 1);
    var totalamount = tr.find('.totalAmount').html()
    var totalSum = $('#totalSum').html( parseInt($("#totalSum").html()) - parseInt(totalamount)  )
    if(setNetAmount()){
      setNetAmount()
    }
    $.ajax({
      url: "../Controllers/_cardData.php", // Replace with your server endpoint
      type: "POST",
      data: {
        id: id,
        page: "deleteCartItem",
      },
      success: function (res) {
        console.log(res);
      },
    });
  });
}

$(document).ready(function () {
  $(document).on("click", ".incrementBtnCart", function () {
    console.log("yes");
    totalAmountCart("+", $(this));
  });

  $(document).on("click", ".decrementBtnCart", function () {
    totalAmountCart("-", $(this));
  });

  $(document).on("keyup", ".qty2", function () {
    qty2(this);
  });

  function qty2(element) {
    var parent = $(element).parent().find(".decrementBtnCart");
    console.log($(element).val());
    // if( $(element).val() ){
    totalAmountCart("*", parent);
    // }
  }
});
