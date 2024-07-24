$(document).ready(function() {
  
  var userid = $.cookie('userid')
  var usertype = $.cookie('usertype')
  $('.user-role').text(usertype)
  getUserInfo(userid)

  
  function getUserInfo(userid) {
    $.ajax({
      type: "GET",
      url: url + 'api/grabusers',
      data: {profile:true, userid:userid},
      dataType: "json",
      success: function (user) {
        var userid = user[0].userid
        var fname = user[0].fname
        var lname = user[0].lname
        var email = user[0].email
        var address = user[0].address
        var username = user[0].username
        var password = user[0].password
        var name = fname + ' ' + lname
        $('#user-name').text(fname)
        $('#last-name').text(lname)
        $('#view_userid').val(userid)
        $('#view_name').val(name)
        $('#view_username').val(username)
        $('#view_email').val(email)
        $('#view_address').val(address)

        
        $('#userid').val(userid)
        $('#fname').val(fname)
        $('#lname').val(lname)
        $('#email').val(email)
        $('#address').val(address)
        $('#username').val(username)
        $('#password').val(password)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }

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