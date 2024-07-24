function urlLink() {
  let urlLink = "http://127.0.0.1:8000/";
  return urlLink;
}
let url = urlLink();
$(".logoutt").click(function () {
  Swal.fire({
    icon: "info",
    title: "Logging out...",
    showConfirmButton: false,
    timer: 2500,
    allowOutsideClick: false,
    allowEscapeKey: false,
    didOpen: function () {
      setTimeout(function () {
        $.removeCookie("userid", { path: "/", expires: new Date(0) });
        $.removeCookie("usertype", { path: "/", expires: new Date(0) });
        window.location.href = "/";
      }, 2500);
    },
  });
});

$.ajax({
  type: "GET",
  url: url + "api/products",
  dataType: "json",
  success: function (res) {
    let proditem = "";
    $.each(res.food, function (a, b) {
      proditem += `<div class="col-md-12" id="prodbox">
        <div class="row">
          <div class="col d-flex justify-content-center" id="prodd">
            <img src="/img/food/${b.image}" alt="" class="img-thumbnail"/>
          </div>
          <div class="col-md-4 d-flex justify-content-center" id="prodd">
            <h5>${b.foodname}</h5>
          </div>
          <div class="col" id="prodd">
            <h6>₱${b.price}</h6>
          </div>
          <div class="col" id="prodd">
            <button class="btn btn-warning foodInfo" data-foodid="${b.food_id}">Order In Advance</button>
          </div>
        </div>
      </div>`;
    });
    $("#prodcontentt").html(proditem);
  },
  error: function (error) {
    // Handle error case
    console.log("Error: " + error);
  },
});

function foodList() {
  $.ajax({
    type: "GET",
    url: url + "api/products",
    dataType: "json",
    success: function (res) {
      let proditem = "";
      $.each(res.food, function (a, b) {
        proditem += `<div class="col-md-12" id="prodbox">
          <div class="row">
            <div class="col d-flex justify-content-center" id="prodd">
              <img src="/img/food/${b.image}" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-4 d-flex justify-content-center" id="prodd">
              <h5>${b.foodname}</h5>
            </div>
            <div class="col" id="prodd">
              <h6>₱${b.price}</h6>
            </div>
            <div class="col" id="prodd">
              <button class="btn btn-warning" data-toggle="modal" data-target="#login">Order In Advance</button>
            </div>
          </div>
        </div>`;
      });
      $("#prodcontent").html(proditem);
      let response = res.food;
      // Handle the response data and display the food items
      if (response && response.length > 0) {
        var menuContainer = $(".currentmenu"); // Assuming you have a container with the class "currentmenu"
        menuContainer.empty(); // Clear the menu container

        var itemsPerRow = 3;
        var maxRows = 2; // Maximum rows to display
        var rows = Math.min(Math.ceil(response.length / itemsPerRow));
        for (var i = 0; i < rows; i++) {
          var rowHTML = '<div class="row menub" id="menub">';

          for (var j = 0; j < itemsPerRow; j++) {
            var index = i * itemsPerRow + j;
            if (index < response.length) {
              var foodItem = response[index];
              var foodName = foodItem.foodname;
              var price = foodItem.price;
              var imageSrc = foodItem.image;

              // Create the HTML structure for each food item
              var foodItemHTML = `
                  <div class="col" id="menu">
                    <div class="row">
                      <div class="col-md-6 d-flex align-content-center" >
                        <img src="/img/food/${imageSrc}" alt="" />
                      </div>
                      <div class="col">
                        <h6>${foodName}</h6>
                        <h5>₱${price}</h5>
                      </div>
                    </div>
                  </div>
                `;

              rowHTML += foodItemHTML;
            }
          }

          rowHTML += "</div>";

          // Append the row to the menu container
          menuContainer.append(rowHTML);
        }
      }
    },
    error: function (error) {
      // Handle error case
      console.log("Error: " + error);
    },
  });
}

foodList();
$(".searchBtn").on("click", function () {
  let value = $("#searchValue").val();
  $.ajax({
    type: "POST",
    url: url + "api/products",
    data: { searchProd: value },
    dataType: "json",
    success: function (res) {
      let proditem = "";
      $.each(res.food, function (a, b) {
        proditem += `<div class="col-md-12" id="prodbox">
          <div class="row">
            <div class="col d-flex justify-content-center" id="prodd">
              <img src="/img/food/${b.image}" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-4 d-flex justify-content-center" id="prodd">
              <h5>${b.foodname}</h5>
            </div>
            <div class="col" id="prodd">
              <h6>₱${b.price}</h6>
            </div>
            <div class="col" id="prodd">
              <button class="btn btn-warning" data-toggle="modal" data-target="#login">Order In Advance</button>
            </div>
          </div>
        </div>`;
      });
      $("#prodcontent").html(proditem);
      let response = res.food;
      // Handle the response data and display the food items
      if (response && response.length > 0) {
        var menuContainer = $(".currentmenu"); // Assuming you have a container with the class "currentmenu"
        menuContainer.empty(); // Clear the menu container

        var itemsPerRow = 3;
        var maxRows = 2; // Maximum rows to display
        var rows = Math.min(Math.ceil(response.length / itemsPerRow), maxRows);

        for (var i = 0; i < rows; i++) {
          var rowHTML = '<div class="row menub" id="menub">';

          for (var j = 0; j < itemsPerRow; j++) {
            var index = i * itemsPerRow + j;
            if (index < response.length) {
              var foodItem = response[index];
              var foodName = foodItem.foodname;
              var price = foodItem.price;
              var imageSrc = foodItem.image;

              // Create the HTML structure for each food item
              var foodItemHTML = `
                  <div class="col" id="menu">
                    <div class="row">
                      <div class="col-md-6 d-flex align-content-center" >
                        <img src="/img/food/${imageSrc}" alt="" />
                      </div>
                      <div class="col">
                        <h6>${foodName}</h6>
                        <h5>₱${price}</h5>
                      </div>
                    </div>
                  </div>
                `;

              rowHTML += foodItemHTML;
            }
          }

          rowHTML += "</div>";

          // Append the row to the menu container
          menuContainer.append(rowHTML);
        }
      }
    },
  });
});

$.ajax({
  type: "GET",
  url: url + "api/table",
  dataType: "json",
  success: function (res) {
    let table = "";
    let option = "";
    $.each(res.table, function (a, b) {
      option += `<option value="${b.table_no}"  ${
        b.statusReserved !== "Occupied"
          ? b.status === "Available"
            ? ""
            : b.status === "Maintenace"
            ? "disabled"
            : b.status === "Not Available"
            ? "disabled"
            : ""
          : "disabled"
      }>Table ${b.table_no}</option>`;
      table += `<div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                      ${
                        b.statusReserved !== "Occupied"
                          ? b.status === "Available"
                            ? '<i class="fa-solid fa-circle fa-2xs" style="color: #1dc928"></i>'
                            : b.status === "Maintenace"
                            ? '<i class="fa-solid fa-lock fa-2xs" style="color: #95a0b1"></i>'
                            : b.status === "Not Available"
                            ? '<i class="fa-solid fa-circle fa-2xs" style="color: #c52921"></i> '
                            : ""
                          : '<i class="fa-solid fa-circle fa-2xs" style="color: #e39c20"></i>'
                      }
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Table${
                          b.table_no
                        }"
                          aria-expanded="true" aria-controls="collapseOne" ${
                            b.status === "Maintenace" ? "disabled" : ""
                          }>
                          Table ${b.table_no}
                        </button>
                      </h2>
                    </div>
                  
                    <div id="Table${
                      b.table_no
                    }" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        ${
                          b.statusReserved === "Occupied"
                            ? `<div class="row">
                        <div class="col-md-2 d-flex justify-content-end">
                          <i class="fa-solid fa-clock fa-xl"></i>
                        </div>
                        <div class="col-md-10">
                          Will be not occupied in <strong>${b.remaining_time}</strong> 
                        </div>
                      </div>`
                            : ""
                        }
                        <div class="row">
                          
                          <div class="col-md-2 d-flex justify-content-end">
                            <i class="fa-solid fa-exclamation fa-xl"></i>
                          </div>
                          <div class="col-md-10">
                            This table is good for ${b.capacity} persons
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2 d-flex justify-content-end">
                            <i class="fa-solid fa-thumbtack fa-xl"></i>
                          </div>
                          <div class="col-md-10">
                            Located at the ${b.location}.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>`;
    });
    $("#tableForm").append(option);
    $(".accordion").append(table);
  },
});

$(document).on("click", ".foodInfo", function () {
  let foodid = $(this).data("foodid");
  $.ajax({
    type: "POST",
    url: url + "api/products",
    data: { getFoodInfo: foodid },
    dataType: "json",
    success: function (res) {
      $(".foodTitle").text(res.foodname);
      $(".foodDesc").text(res.desc);
      $("#foodImg").attr("src", "/img/food/" + res.image);
      $("#foodPrice").text(res.price);
      $("#orderReserve").val(res.food_id);
    },
    complete: function () {
      $("#oia").modal("show");
    },
  });
});

$(".userSearchProd").on("click", function () {
  var search = $("#searchValue").val();
  $.ajax({
    type: "POST",
    url: url + "api/products",
    data: { searchProd: search },
    dataType: "json",
    success: function (res) {
      let proditem = "";
      $.each(res.food, function (a, b) {
        proditem += `<div class="col-md-12" id="prodbox">
          <div class="row">
            <div class="col d-flex justify-content-center" id="prodd">
              <img src="/img/food/${b.image}" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-4 d-flex justify-content-center" id="prodd">
              <h5>${b.foodname}</h5>
            </div>
            <div class="col" id="prodd">
              <h6>₱${b.price}</h6>
            </div>
            <div class="col" id="prodd">
              <button class="btn btn-warning foodInfo" data-foodid="${b.food_id}">Order In Advance</button>
            </div>
          </div>
        </div>`;
      });
      $("#prodcontentt").html(proditem);
    },
  });
});

$("#orderReserve").on("click", function () {
  let foodid = $(this).val();
  $.ajax({
    type: "POST",
    url: url + "api/reserve",
    data: { reserveOrder: foodid, userid: $.cookie("userid") },
    dataType: "json",
    success: function (res) {
      if (res.status === "success") {
        Swal.fire({
          title: "Success!",
          text: "Added to Reservation Order",
          icon: "success",
          showCancelButton: false,
          confirmButtonText: "OK",
        });
      } else {
        Swal.fire({
          title: "Invalid!",
          text: res.message,
          icon: "warning",
          showCancelButton: false,
          confirmButtonText: "OK",
        });
      }
    },
    complete: function () {
      $("#oia").modal("hide");
    },
  });
});
