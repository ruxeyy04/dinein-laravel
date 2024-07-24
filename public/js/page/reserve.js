function resFood() {
    $.ajax({
        type: "POST",
        url: url + "api/reserve",
        data: {getFoodOrder: $.cookie('userid')},
        dataType: "json",
        success: function (res) {
            $('#totalAmount').text(res.totalAmount)
            if (res.food.length === 0) {
                Swal.fire({
                    title: "Invalid!",
                    text: 'Add Food First',
                    icon: "warning",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                  }).then(function () {
                    window.location.href ='order';
                  })
            }
            let response = res.food;
            // Handle the response data and display the food items
            if (response && response.length > 0) {
                let orderlist = '';
                console.log(res.food)
                $.each(res.food, function (a,b) {
                    orderlist += `<div class="oitems">
                                    <div class="row text-center" id="citem">
                                        <div class="col-md-3">
                                            <img src="/img/food/${b.image}" width="50" alt="" class="img-thumbnail"/>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>${b.foodname}</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>Quantity: ${b.quantity}</h6>
                                        </div>
                                        <div class="col-md-3" id="price">
                                            <h6>₱ ${b.totalPrice}</h6>
                                        </div>
                                    </div>
                                    <hr />
                                </div>`
                })
                $('.foodReserveList').html(orderlist)


              var menuContainer = $(".reserveFood"); // Assuming you have a container with the class "currentmenu"
              menuContainer.empty(); // Clear the menu container
        
              var itemsPerRow = 3;
              var rows = Math.min(Math.ceil(response.length / itemsPerRow));
              for (var i = 0; i < rows; i++) {
                var rowHTML = '<div class="row" id="ocm">';
        
                for (var j = 0; j < itemsPerRow; j++) {
                  var index = i * itemsPerRow + j;
                  if (index < response.length) {
                    var foodItem = response[index];
                    var foodName = foodItem.foodname;
                    var price = foodItem.totalPrice;
                    var imageSrc = foodItem.image;
        
                    // Create the HTML structure for each food item
                    var foodItemHTML = `
                    <div class="ocmm col" >
                    <button class="btn btn-danger remove mb-3" data-cartid=${foodItem.resfoodid}>
                    <i class="fa-solid fa-x" style="color: #ffff"></i>
                    </button>
                        <div class="row" >
                        
                            <div class="col-md-6 d-flex justify-content-center viewProd" data-foodid="${foodItem.food_id}">
                                <img src="/img/food/${imageSrc}" width="150" height="150" class="pl-2" alt=""/>
                            </div>
                            <div class="col pt-4">
                                <h6>${foodName}</h6>
                                <h5>Total: ₱${price}</h5>
                                <div>
                                    <input data-cartid="${foodItem.resfoodid}" type="number" min="1" placeholder="Quantity" class="form-control quantityChange" value="${foodItem.quantity}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
        
                    rowHTML += foodItemHTML;
                  }
                }
        
                rowHTML += '</div>';
        
                // Append the row to the menu container
                menuContainer.append(rowHTML);
              }
      
             
            }
        },
        error: function (a,b,c) {
            console.log(a.responseText, b,c)
        }
    });
}
resFood() 
$(document).on('click','.viewProd', function () {
    let foodid = $(this).data("foodid");
    $.ajax({
        type: "POST",
        url: url + "api/products",
        data: {getFoodInfo: foodid},
        dataType: "json",
        success: function (res) {
          $('.foodTitle').text(res.foodname)
          $('.foodDesc').text(res.desc)
          $('#foodImg').attr('src', '/img/food/'+res.image)
          $('#foodPrice').text(res.price)
          $('#orderReserve').val(res.food_id)
  
        },
        complete: function () {
          $('#oia').modal('show')
        }
      });
})

$(document).on('click', '.quantityChange', function () {
    let quant = $(this).val()
    let cartid = $(this).data("cartid");
    $.ajax({
        type: "POST",
        url: url + "api/reserve",
        data: {updateQuantity: cartid, quant: quant},
        dataType: "json",
        success: function (res) {
        },
        complete: function () {
            resFood() 
        }
      });
})
$(document).on('click', '.remove', function () {
   let cartid = $(this).data('cartid')
   $.ajax({
    type: "POST",
    url: url + "api/reserve",
    data: {deleteReserveFood: cartid},
    dataType: "json",
    success: function (res) {
        
    },
    complete: function () {
        resFood();
    }
   });
})
$('#res').click(function () {
    let table = $('#tableForm').val()
    let userid = $.cookie('userid')
    $('#tableNo').text(table)
})

$('.confirmReservation').click(function () {
    let table = $('#tableForm').val()
    let schedule = $('#schedule').val()
    $.ajax({
        type: "POST",
        url: url + "api/reserve",
        data: {finalReserve: table, sched: schedule, userid: $.cookie('userid')},
        dataType: "json",
        success: function (res) {
            console.log(res)
            if (res.status === 'success') {
                Swal.fire({
                    title: "Success!",
                    text: "Successfully Reserve a Table",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                  }).then(function () {
                    location.replace('prof')
                  })
            } else {
                Swal.fire({
                    title: "Invalid!",
                    text: res.message,
                    icon: "warning",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                  })
            }
        },
        error: function (a,b,c) {
            console.log(a.responseText,b,c)
        }
    });
}) 

var currentDate = new Date().toISOString().split("T")[0];
        $('#schedule').attr('min', currentDate);

        $('#schedule').on('change', function() {
            var selectedDateTime = new Date($(this).val());
            var currentDateTime = new Date();

            if (selectedDateTime < currentDateTime) {
                alert('Please select a future date and time.');
                $(this).val(''); // Clear the input field
            }
        });