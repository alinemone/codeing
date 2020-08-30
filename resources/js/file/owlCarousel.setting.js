
// var owl = $('.vips');owl.owlCarousel({
//     loop:true,
//     margin:12,
//     touchDrag:true,
//     mouseDrag:true,
//     responsiveClass:true,
//     dots: false,
//     lazyLoad: true,
//     slideBy: 1,
//     autoplay: false,
//     autoplayHoverPause: true,
//     nav: true,
//     navText:["<i class='fa fa-angle-right'></i>","<i class='fa fa-angle-left'></i>"],
//     responsive:{
//         10000:{
//             items:10
//         },
//         1000:{
//             items:9
//         },
//         960:{
//             items:8
//         },
//         900:{
//             items:7
//         },
//         860:{
//             items:6
//         },
//         780:{
//             items:5
//         }
//     }
// })


var owl = $('.vips');owl.owlCarousel({
    autoplay:false,
    autoplayTimeout:2500,
    lazyLoad:true,
    merge:true,
    touchDrag:true,
    mouseDrag:true,
    rtl:true,
    loop:false,
    dots: false,
    nav:true,
    slideBy: 1,
    autoWidth:true,
    margin:0,
    navText:[""],
    responsive:{
        0:{
            items:8,

        },
        // 100:{
        //     items:1,
        //
        // },
        // 320:{
        //     items:2,
        //
        // },
        // 360:{
        //     items:3,
        //     row:2
        // },
        // 400:{
        //     items:3,
        //
        // },
        // 500:{
        //     items:3,
        //
        // },
        // 600:{
        //     items:4,
        //
        // },
        // 700:{
        //     items:4,
        //
        // },
        // 800:{
        //     items:5,
        //
        // },
        // 900:{
        //     items:6,
        //
        // },
        // 1000:{
        //     items:7,
        //
        // },
        // 1200:{
        //     items:7,
        //
        // },
        // 1400:{
        //     items:8,
        //
        // },
        // 1600:{
        //     items:10,
        // }


    }
})
