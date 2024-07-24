$(document).ready(function() {

  var userid = $.cookie('userid')
  var usertype = $.cookie('usertype')
  $('.user-role').text(usertype)
  getUserInfo(userid)
  getCount()

  function getUserInfo(userid) {
    $.ajax({
      type: "GET",
      url: url + 'api/grabusers',
      data: {profile:true, userid:userid},
      dataType: "json",
      success: function (user) {
        $('#user-name').text(user[0].fname)
        $('#last-name').text(user[0].lname)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }

  function getCount() {
    $.ajax({
      type: "POST",
      url: url + 'api/grabcount',
      dataType: "json",
      success: function (total) {
        $('.total-food').text(total.total_food)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }



  
  $("#foods").DataTable({
    ajax: {
      url: url + 'api/grabfoods',
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data) {
          return (
            '<button class="btn btn-warning view-button" data-toggle="modal" data-target="#edit-modal" data-food_id="'+data.food_id+'" data-foodname="'+data.foodname+'" data-desc="'+data.desc+'" data-price="'+data.price+'" data-image="'+data.image+'"><i class="fa-solid fa-pen-to-square"></i></button>' +
            '<button class="btn btn-danger delete-button" data-food_id="'+data.food_id+'" data-toggle="modal" data-target="#delete"><i class="fa-solid fa-trash-can"></i></button>'
          )
        },
      },
      {
        data: "image",
        render: function (data) {
          return (
            '<img src="../img/food/' + data + '" alt="Product Image" width="70" height="70">'
          );
        },
      },
      { data: "food_id" },
      { data: "foodname" },
      { data: "desc" },
      { data: "price" },
    ],
  })


  $('#foods').on('click', '.view-button', function() {
    var food_id = $(this).attr('data-food_id')
    var foodname = $(this).attr('data-foodname')
    var desc = $(this).attr('data-desc')
    var price = $(this).attr('data-price')
    var image = $(this).attr('data-image')

    $('#food_id').val(food_id)
    $('#name').val(foodname)
    $('#description').val(desc)
    $('#price').val(price)
  })




  $('#foods').on('click', '.delete-button', function() {
    var food_id = $(this).attr('data-food_id')

    $('#delete-confirm').click(function() {
      deleteFood(food_id)
    })

    function deleteFood(food_id) {
      $.ajax({
        type: "POST",
        url: url + 'api/delete_food',
        data: {food_id:food_id},
        dataType: "json",
        success: function (response) {
          if (response.hasOwnProperty('invalid')) {
            Swal.fire({
              title: 'Cannot delete',
              text: 'The food is reserved',
              icon: 'warning'
            })
          } else {
            $('#delete').modal('hide')
            $('#foods').DataTable().ajax.reload()
            getCount()
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          Swal.fire({
            title: 'Error',
            icon: 'error'
          })
          console.log('Error:', textStatus, errorThrown, xhr.responseText)
        }
      })
    }
  })








  $('#add').submit(function(event) {
    event.preventDefault()
    var formData = new FormData(this)

    $.ajax({
      type: "POST",
      url: url + "api/add_food",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response)
        Swal.fire({
          title: 'Success',
          text: 'Food added',
          icon: 'success'
        })
        $('#add').modal('hide')
        $('#add input, #add textarea').val('')
        $('#foods').DataTable().ajax.reload()
        getCount()
      },
      error: function(xhr, textStatus, errorThrown) {
        Swal.fire({
          title: 'Error',
          icon: 'error'
        })
        console.log('Error:', textStatus, errorThrown, xhr.responseText)
      }
    })
  })

  $('#update').submit(function(event) {
    event.preventDefault()
    var formData = new FormData(this)

    // var formDataObject = {};
    // formData.forEach(function(value, key) {
    //   formDataObject[key] = value;
    // })
    // console.log(formDataObject)

    $.ajax({
      type: "POST",
      url: "api/update_food",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire({
          title: 'Success',
          text: 'Food updated',
          icon: 'success'
        })
        $('#edit-modal').modal('hide')
        $('#foods').DataTable().ajax.reload()
      },
      error: function(xhr, textStatus, errorThrown) {
        Swal.fire({
          title: 'Error',
          icon: 'error'
        })
        console.log('Error:', textStatus, errorThrown, xhr.responseText)
      }
    })
  })

})