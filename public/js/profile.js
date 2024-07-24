function userprofile () {
    $.ajax({
      type: "POST",
      url: url + "api/userinfo",
      data: {userid: $.cookie('userid')},
      dataType: "json",
      success: function (res) {
        $('#fullname').val(res.fname + ' ' + res.lname)
        $('.username').val(res.username)
        $('.address').val(res.address)
  
        $('#fname').val(res.fname)
        $('#lname').val(res.lname)
        $('#username').val(res.username)
        $('#address').val(res.address)
        $('.email').val(res.email)
      }
    });
  }

  userprofile()
 $('#editProfile').submit(function (e) {
  e.preventDefault()
  let form = new FormData(this)
  form.append('editProd', $.cookie('userid'))
  $.ajax({
    type: "POST",
    url: url + "api/userinfo",
    data: form,
    dataType: "json",
    contentType: false,
    processData: false,
    success: function (res) {
      Swal.fire({
        title: "Success!",
        text: "Updated Profile Successfully",
        icon: "success",
        showCancelButton: false,
        confirmButtonText: "OK",
      }).then(function () {
        userprofile()
      })
    }
  });
 })

 $(document).ready(function() {
    // Password validation rules using jQuery Validation plugin
    $("#changePass").validate({
        rules: {
            newpass: {
                required: true,
                minlength: 6
            },
            confirmpass: {
                required: true,
                minlength: 6,
                equalTo: "#newpass"
            }
        },
        messages: {
            newpass: {
                required: "Please enter a new password",
                minlength: "Password must be at least 6 characters"
            },
            confirmpass: {
                required: "Please confirm your password",
                minlength: "Password must be at least 6 characters",
                equalTo: "Passwords do not match"
            }
        },
        submitHandler: function(form) {
          $.ajax({
            url: url+  "api/check_password",
            type: "POST",
            data: $(form).serialize() + "&userid=" + $.cookie('userid'),
            success: function(res) {
                if (res.status === 'success') {
                  Swal.fire({
                    title: "Success!",
                    text: res.message,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                  })
                } else {
                  Swal.fire({
                    title: "Invalid",
                    text: res.message,
                    icon: "warning",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                  })
                }
            }
        });
        
        }
    });
  });
  