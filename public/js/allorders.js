function allorder() {
$.ajax({
    type: "GET",
    url: url + "api/reservation",
    data: {getReservation: $.cookie('userid')},
    dataType: "json",
    success: function (ress) {
        let item = ''
        $.each(ress.res, function (a, b) {
            item +=`<div class="ordereditem">
            <hr />
            <div class="row">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <h4>Res #${b.resno}</h4>
                </div>
                <div class="col-md-4 text-center">
                    <p>Items: ${b.totalItem}</p>
                    <strong>
                        <p>₱${b.totalAmount}</p>
                    </strong>
                    <p>
                        Status:
                        ${b.status === 'Pending'? '<i class="fa-solid fa-circle mr-1" style="color: #d7d117"></i>' : b.status === 'Approved' ? '<i class="fa-solid fa-circle mr-1" style="color: #23be35"></i>' : '<i class="fa-solid fa-circle mr-1" style="color: #be3523"></i>'}
                    </p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <button class="btn btn-warning viewDetails" data-resno="${b.resno}">
                        View Details
                    </button>
                </div>
            </div>
            <hr />
        </div>`
        })
        $('.allord').html(item)
    }
});
}
allorder()
$(document).on('click','.viewDetails', function () {
    let resno = $(this).data('resno')
    $.ajax({
        type: "POST",
        url: url + "api/reservation",
        data: {getResrvation: resno},
        dataType: "json",
        success: function (res) {
            let items = ''
            $.each(res.item, function (a,b) {
                items += `<div class="oitems">
                <div class="row text-center" id="citem">
                    <div class="col-md-3">
                        <img src="/img/food/${b.image}" width="50" alt="" />
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
            if (res.statusReserve === 'Cancelled' || res.statusReserve === 'Approved') {
                $('.cancelOrder').prop('disabled', true)
            } else {
                $('.cancelOrder').prop('disabled', false)
            }
            $('.cancelOrder').attr('data-resno', res.item[0].resno)
            $('#totalAmount').text(res.totalAmount)
            $('#tableNo').text(res.table_no)
            $('.orderList').html(items)
        },
        error: function (a,b,c) {
            console.log(a.responseText,b,c)
        },
        complete: function () {
            $('#vdetails').modal('show')
        }
    });
})

$(document).on('click', '.cancelOrder', function () {
    let resno = $('.cancelOrder').attr('data-resno')

    $.ajax({
        type: "POST",
        url: url+ "api/reservation",
        data: {cancelOrder: resno},
        dataType: "json",
        success: function (res) {
            console.log(res)
            allorder()
            if (res.status) {
                Swal.fire({
                    title: "Success!",
                    text: res.message,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
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
        error: function (a, b, c) {
            console.log(a.responseText,b,c)
        },
        complete: function () {
            $('#vdetails').modal('hide')
        }
    });
})