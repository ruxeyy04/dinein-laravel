if ($.cookie('userid')) {
    if ($.cookie('usertype') === 'Admin') {
        window.location.href = "/admin/";
      } else {
        window.location.href = "/user/";
      }
}
$('#regForm').submit(function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('register', 1)

// var displayData = '';
// for (var pair of formData.entries()) {
//   displayData += pair[0] + ': ' + pair[1] + '\n';
//   console.log(displayData);
// }

    $.ajax({
        type: "POST",
        url: url + "api/login",
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (res) {
            Swal.fire({
                title: "Success!",
                text: "User Registered Successfully",
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "OK",
              }).then(function () {
                $("#regForm")[0].reset();
                $("#register").modal("hide");
              });
        },
        error: function (a,b,c) {
            console.log(a.responseText, b,c)
        }
    });
})

$('#loginForm').submit(function (e) {
    e.preventDefault()
    var formData = new FormData(this)
    formData.append('login', 1)
    $.ajax({
        type: "POST",
        url: url + "api/login",
        data: formData,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function (res) {
          if (res.status === 'success') {
            Swal.fire({
                icon: "success",
                title: "Logged In Successfully",
                showConfirmButton: false,
                timer: 2500,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: function () {
                  setTimeout(function () {
                    if (res.usertype === 'Admin') {
                      window.location.href = "/admin/";
                    } else {
                      window.location.href = "/";
                    }
                    $.cookie('userid', res.userid, { expires: 1, path: '/' });
                    $.cookie('usertype', res.usertype, { expires: 1, path: '/' });
                  }, 2500);
                },
              });
          } else {
            Swal.fire({
                title: "Invalid!",
                text: "Username or password is incorrect",
                icon: "warning",
                showCancelButton: false,
                confirmButtonText: "OK",
              })
          }
        },
        error: function (a,b,c) {
            console.log(a.responseText, b,c)
        }
    });
})