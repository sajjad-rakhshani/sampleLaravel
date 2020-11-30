function navbtn(){
    $('.navbar-toggler').click(function () {
        var width = $('#navbarNavDropdown').css('width');
        if (width == '0px'){
            $('#navbarNavDropdown')
                .fadeIn()
                .css('width', '50%');
        }else{
            $('#navbarNavDropdown')
                .fadeOut()
                .css('width', '0');
        }
        $('#navbarNavDropdown').click(function () {
            return false;
        });
        $('.nav-link').click(function () {
            window.location.href = this.href;
        });
        $('body').click(function () {
            $('#navbarNavDropdown')
                .fadeOut()
                .css('width', '0');
        });
        return false;
    });
}
$(document).ready(function () {
    navbtn();
});
