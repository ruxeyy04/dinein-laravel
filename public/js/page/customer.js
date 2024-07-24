if (!$.cookie('userid')) {
    location.replace('/login')

}
if ($.cookie('usertype')) {
    if ($.cookie('usertype') !== 'Customer') {
        if ($.cookie('usertype') === 'Admin') {
         location.replace('/admin/')
        } else if ($.cookie('usertype') === 'Incharge') {
         location.replace('/incharge/')
        }
     
     }
}
