$(document).ready(function () {
    $('.slider-container.first-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        appendArrows: $('.first-arrows'),
        lazyLoad: 'ondemand',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 426,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    })
    $('.slider-container.scd-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        appendArrows: $('.scd-arrows'),
        lazyLoad: 'ondemand',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 376,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    })
    $('.slider-container.thrd-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        appendArrows: $('.thrd-arrows'),
        lazyLoad: 'ondemand',
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 376,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    })

    let pageLabels = $('.slider-page')
    let pageArrows = $('.slider-arrows')
    let pages = $('.slider-container')

    for (let i = 0; i < pageLabels.length; i++) {
        pageLabels[i].addEventListener('click', function () {
            for (let j = 0;j<pageLabels.length;j++) {
                pageLabels[j].classList.remove('active')
                pageArrows[j].classList.add('none')
                pages[j].classList.add('none')
            }
            pageArrows[i].classList.remove('none')
            pages[i].classList.remove('none')
            pageLabels[i].classList.add('active')
        })
    }
})