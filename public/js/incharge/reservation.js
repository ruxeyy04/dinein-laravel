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
        $('.total-table').text(total.totalReservation)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }



  
  let reserv = $("#tables").DataTable({
    ajax: {
      url: url + 'api/grab_res',
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (d) {
          return `<select name="status" class="form-control statRes" data-resno=${d.resno} ${d.status==='Cancelled' ? 'disabled' : ''}>
          <option value="Pending" ${d.status==='Pending' ? 'selected' : ''}>Pending</option>
          <option value="Approved" ${d.status==='Approved' ? 'selected' : ''}>Approve</option>
          <option value="Cancelled" ${d.status==='Cancelled' ? 'selected disabled' : ''}>Cancel</option>
        </select>`
        },
      },
      { data: "resno" },
      { data: "table_no" },
      { data: null, render: function (a) {
        return `${a.fname} ${a.lname}`
      } },
      { data: "datetimesched", render: function (a) {
        var originalDate = a;

        // Convert the date using Moment.js
        var convertedDate = moment(originalDate, "YYYY-MM-DD HH:mm:ss").format("MMMM D, YYYY [at] h:mmA");
          return convertedDate
      }},
      { data: "status" },
    ],
    order: []
  })

$(document).on('change', '.statRes', function () {
  let stat = $(this).val()
  let resno = $(this).data('resno')
  $.ajax({
    type: "POST",
    url: url + "api/update_res",
    data: {resno : resno, status: stat},
    dataType: "json",
    success: function (res) {
      console.log(res)
      reserv.ajax.reload()
    }
  });
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