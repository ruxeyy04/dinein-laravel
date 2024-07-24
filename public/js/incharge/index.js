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
        $('.total-table').text(total.total_table)
        $('.total-user').text(total.total_user)
        $('.total-incharge').text(total.total_incharge)
      },
      error: function(xhr) {
        console.log('Error', xhr.responseText)
      }
    })
  }





  $("#reservations").DataTable({
    ajax: {
      url: url + 'api/grabreservations',
      dataSrc: "",
    },
    columns: [
      { data: "resno" },
      { data: "table_no" },
      { data: "userid" },
      { data: "datetimesched" },
      { data: "status" },
    ],
    order: [[4, "desc"], [0, "asc"]]
  })


  $("#users").DataTable({
    ajax: {
      url: url + 'api/grabusers',
      dataSrc: "",
    },
    columns: [
      { data: "userid" },
      { 
        data: null,
        render: function(data) {
          return data.fname + " " + data.lname;
        }
      },
      { data: "email" },
      { data: "username" },
      { data: "usertype" },
    ],
  })



})