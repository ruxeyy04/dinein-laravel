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
        $('.total-user').text(total.total_user)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }

  
  $("#users").DataTable({
    ajax: {
      url: url + 'api/grabusers',
      dataSrc: "",
    },
    columns: [
      {
        data: null,
        render: function (data) {
          return (
            '<button class="btn btn-warning view-button" data-toggle="modal" data-target="#edit-modal" data-userid="'+data.userid+'" data-fname="'+data.fname+'" data-lname="'+data.lname+'" data-email="'+data.email+'" data-address="'+data.address+'" data-username="'+data.username+'" data-password="'+data.password+'" data-usertype="'+data.usertype+'"><i class="fa-solid fa-pen-to-square"></i></button>'
          )
        },
      },
      { data: "userid" },
      {
        data: null,
        render: function(data) {
          return data.fname + " " + data.lname;
        }
      },
      { data: "email" },
      { data: "address" },
      { data: "username" },
      { data: null, render: function () {
        return '******';
      } },
      { data: "usertype" },
    ],
  })







  $('#users').on('click', '.view-button', function() {
    var userid = $(this).attr('data-userid')
    var fname = $(this).attr('data-fname')
    var lname = $(this).attr('data-lname')
    var email = $(this).attr('data-email')
    var address = $(this).attr('data-address')
    var username = $(this).attr('data-username')
    var password = $(this).attr('data-password')
    var usertype = $(this).attr('data-usertype')
    console.log(usertype)

    $('#userid').val(userid)
    $('#fname').val(fname)
    $('#lname').val(lname)
    $('#email').val(email)
    $('#address').val(address)
    $('#username').val(username)
    $('#password').val(password)
    $('.usertype').val(usertype)
  })







 $('#add').submit(function(event) {
    event.preventDefault()
    var formData = new FormData(this)

    $.ajax({
      type: "POST",
      url: url + "api/add_user",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response)
        Swal.fire({
          title: 'Success',
          text: 'User added',
          icon: 'success'
        })
        $('#add').modal('hide')
        $('#add input').val('')
        $('#users').DataTable().ajax.reload()
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
      url: url + "api/update_user",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        Swal.fire({
          title: 'Success',
          text: 'User updated',
          icon: 'success'
        })
        $('#update').modal('hide')
        $('#users').DataTable().ajax.reload()
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