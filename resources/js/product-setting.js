require('./file/admin/jquery.tagsinput-revisited.js');

// format pool

window.separateNum = function separateNum(value, input) {
    /* seprate number input 3 number */
    var nStr = value + '';
    nStr = nStr.replace(/\,/g, "");
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    if (input !== undefined) {

        input.value = x1 + x2;
    } else {
        return x1 + x2;
    }
}

//function get count length title
window.Count = function Count() {
    var title = document.getElementById("product_title").value.length;
    var sf = document.getElementById("seo_title_fa").value.length;
    var se = document.getElementById("seo_title_en").value.length;
    var des = document.getElementById("seo_descriptions").value.length;

    document.getElementById("pro_title").innerHTML = 80 - title;
    document.getElementById("seo_fa").innerHTML = 60 - sf;
    document.getElementById("seo_en").innerHTML = 60 - se;
    document.getElementById("des_fa").innerHTML = 120 - des;
}

//small image check size & format
$('input[name=small_image]').change(function(e){
    var ext = $('input[name=small_image]').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['png','jpg']) == -1) {
        swal.fire({
            icon: 'error',
            title: 'اخطار',
            text: 'آپلود عکس با این فرمت مجاز نیست . فرمت های مجاز png,jpg',
        })
        $('input[name=small_image]').val("");
        return false;
    }
    if ($("#small_image")[0].files[0].size >  2097152 ) {
        swal.fire({
            icon: 'error',
            title: 'اخطار',
            text: 'حداکثر حجم برای آپلود این عکس 2 مگابایت است',
        })
        $('input[name=small_image]').val("");
        return false;
    }
});
//big image check size & format
$('input[name=big_image]').change(function(e){
    var ext = $('input[name=big_image]').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['png','jpg']) == -1) {
        swal.fire({
            icon: 'error',
            title: 'اخطار',
            text: 'آپلود عکس با این فرمت مجاز نیست . فرمت های مجاز png,jpg',
        })
        $('input[name=big_image]').val("");
        return false;
    }
    if ($("#big_image")[0].files[0].size >  2097152 ) {
        swal.fire({
            icon: 'error',
            title: 'اخطار',
            text: 'حداکثر حجم برای آپلود این عکس 2 مگابایت است',
        })
        $('input[name=big_image]').val("");
        return false;
    }
});
//product file check size & format
$('input[name=product_file]').change(function(e){
    var ext = $('input[name=product_file]').val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['zip']) == -1) {
        swal.fire({
            icon: 'error',
            title: 'اخطار',
            text: 'آپلود فایل با این فرمت مجاز نیست . فرمت مجاز zip می باشد',
        })
        $('input[name=product_file]').val("");
        return false;
    }
    if ($("#product_file")[0].files[0].size >  209715200 ) {
        swal.fire({
            icon: 'error',
            title: 'اخطار',
            text: 'حداکثر حجم برای آپلود فایل 200 مگابایت است',
        })
        $('input[name=product_file]').val("");
        return false;
    }
});
// free or price
window.freeorprice = function freeorprice()
{
    if($('.freeproduct').is(":checked"))
        $('#pricetype').addClass('d-none');

    if($('.priceproduct').is(":checked"))
        $('#pricetype').removeClass('d-none');


}
// validations

window.etbarsangy = function etbarsangy(){
    var invalid=0;
    var titleproduct=$('input[name=product_title]').val();
    var small_image=$('input[name=small_image]').val();
    var big_image=$('input[name=big_image]').val();
    var product_file=$('input[name=product_file]').val();
    var seo_title_fa=$('input[name=seo_title_fa]').val();
    var seo_title_en=$('input[name=seo_title_en]').val();
    var seo_descriptions=$('input[name=seo_descriptions]').val();
    var demo_site=$('input[name=demo_site]').val();
    var tags=$('input[name=tags]').val();
    var priceFree =$('#priceFree').attr('checked')
    var priceCash =$('#priceCash').attr('checked')



    if (titleproduct == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#product_title").offset().top
        }, 500);
        $('input[name=product_title]').addClass('border border-danger');
    } else {
        $('input[name=product_title]').removeClass('border border-danger');
    }

    if (small_image == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#small_image").offset().top
        }, 500);
        $('input[name=small_image]').addClass('border border-danger');
    } else {
        $('input[name=small_image]').removeClass('border border-danger');
    }

    if (big_image == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#big_image").offset().top
        }, 500);
        $('input[name=big_image]').addClass('border border-danger');
    } else {
        $('input[name=big_image]').removeClass('border border-danger');
    }

    if (product_file == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#product_file").offset().top
        }, 500);
        $('input[name=product_file]').addClass('border border-danger');
    } else {
        $('input[name=product_file]').removeClass('border border-danger');
    }

    if (seo_title_fa == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#seo_title_fa").offset().top
        }, 500);
        $('input[name=seo_title_fa]').addClass('border border-danger');
    } else {
        $('input[name=seo_title_fa]').removeClass('border border-danger');
    }

    if (seo_title_en == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#seo_title_en").offset().top
        }, 500);
        $('input[name=seo_title_en]').addClass('border border-danger');
    } else {
        $('input[name=seo_title_en]').removeClass('border border-danger');
    }

    if (seo_descriptions == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#seo_descriptions").offset().top
        }, 500);
        $('input[name=seo_descriptions]').addClass('border border-danger');
    } else {
        $('input[name=seo_descriptions]').removeClass('border border-danger');
    }

    if (demo_site == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#demo_site").offset().top
        }, 500);
        $('input[name=demo_site]').addClass('border border-danger');
    } else {
        $('input[name=demo_site]').removeClass('border border-danger');
    }

    if (tags == '' ){
        invalid=1;
        $('html, body').animate({
            scrollTop: $("#tags").offset().top
        }, 500);
        $('input[name=tags]').addClass('border border-danger');
    } else {
        $('input[name=tags]').removeClass('border border-danger');
    }









    if (invalid==1){
        return false;
    }
    if (invalid==0) {
        swal.fire({
            title: 'درحال بارگذاری ...',
            text: 'بسته به میزان سرعت اینترنت شما این فرایند ممکن است کمی زمان بر باشد ',
            onOpen: () => {
                swal.showLoading()
            }
        }).then((result) => {
            if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.timer
            ) {
                console.log('I was closed by the timer')
            }
        });

    }













}
