if (!$.cookie("userid")) {
    location.replace("/");
  }
  if ($.cookie("usertype")) {
    if ($.cookie("usertype") !== "Admin") {
      if ($.cookie("usertype") === "Incharge") {
        location.replace("/incharge/");
      } else if ($.cookie("usertype") === "Customer") {
        location.replace("/");
      }
    }
  }
  