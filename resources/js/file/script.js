

$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    /********/
    $("#sidebarLeft").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebarLeft').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarLeftCollapse').on('click', function () {
        $('#sidebarLeft').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    //Editor File
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            language: 'fa',
            image: {
                resizeUnit: 'px'
            },
            ckfinder: {
                uploaded: true,
                uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Images&responseType=json',
            },
        } )
        .then( editor => {
            console.log( editor );
        } )
        .catch( error => {
            // console.error( error );
        } );



//    ارور محدودیت حجم
    window.validate =  function validate(file,size) {
        var FileSize = file.files[0].size / 1024 / 1024; // in MB
        if (FileSize > size) {

            swal.fire({
                title: 'اخطار',
                text: "محدودیت حجم آپلود "+size+" مگابایت می باشد لطفا فایل با حجم مناسب آپلود کنید",
                icon: 'error',
                confirmButtonText: 'فهمیدم!'
            });
            $(file).val('');
        }
    };
// show password
    $(".toggle-password").click(function() {

        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {

            $(this).children(0).addClass('fa-eye-slash')
            // console.log( $(this).children(0).addClass('fa-eye-slash'))
            input.attr("type", "text");

        }else if (input.attr("type") == "text") {
            $(this).children(0).addClass('fa-eye')
            input.attr("type", "password");

        }
    });

//باز و بسته شدن منو موبایل
    $('li.subnav')
        .on('click', function(){
            $(this).find('ul').toggle();
            $(this).toggleClass("down");
        })



});



