if (!$.cookie("userid")) {
    location.replace("/");
  }
  if ($.cookie("usertype")) {
    if ($.cookie("usertype") !== "Incharge") {
      if ($.cookie("usertype") === "Admin") {
        location.replace("/admin/");
      } else if ($.cookie("usertype") === "Customer") {
        location.replace("/");
      }
    }
  }
  