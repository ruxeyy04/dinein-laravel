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
        $('.total-table').text(total.total_table)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }



  
  $("#tables").DataTable({
    ajax: {
      url: url + 'api/grab_table',
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data) {
          return (
            '<button class="btn btn-warning view-button" data-toggle="modal" data-target="#edit-modal" data-table_no="'+data.table_no+'" data-capacity="'+data.capacity+'" data-location="'+data.location+'" data-status="'+data.status+'"><i class="fa-solid fa-pen-to-square"></i></button>' +
            '<button class="btn btn-danger delete-button" data-table_no="'+data.table_no+'" data-toggle="modal" data-target="#delete"><i class="fa-solid fa-trash-can"></i></button>'
          )
        },
      },
      { data: "table_no" },
      { data: "capacity" },
      { data: "location" },
      { data: "status" },
    ],
  })



  $('#tables').on('click', '.view-button', function() {
    var table_no = $(this).attr('data-table_no')
    var capacity = $(this).attr('data-capacity')
    var location = $(this).attr('data-location')
    var status = $(this).attr('data-status')

    $('#table_no').val(table_no)
    $('#capacity').val(capacity)
    $('#location').val(location)
    $('#status').val(status)
  })

  $('#tables').on('click', '.delete-button', function() {
    var table_no = $(this).attr('data-table_no')

    $('#delete-yes').click(function() {
      deleteTable(table_no)
    })

    function deleteTable(table_no) {
      $.ajax({
        type: "POST",
        url: "api/delete_table",
        data: {table_no: table_no},
        dataType: "json",
        success: function (response) {
          if (response.hasOwnProperty('invalid')) {
            Swal.fire({
              title: 'Cannot delete',
              text: 'The table is reserved',
              icon: 'warning'
            })
          } else {
            $('#delete').modal('hide')
            $('#tables').DataTable().ajax.reload()
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
      url: url + "api/add_table",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire({
          title: 'Success',
          text: 'Table added',
          icon: 'success'
        })
        $('#add').modal('hide')
        $('#add input').val('')
        $('#tables').DataTable().ajax.reload()
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

    $.ajax({
      type: "POST",
      url: url + "api/update_table",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire({
          title: 'Success',
          text: 'Table updated',
          icon: 'success'
        })
        $('#update').modal('hide')
        $('#tables').DataTable().ajax.reload()
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