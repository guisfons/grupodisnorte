$(document).ready(function () {
    header()
    wrapperDistance()
    AOS.init();

    $(window).on('resize', function () {
        wrapperDistance()
    })

    if($('.banner, .story').length) {
        sliders()
    }

    if($('.quemsomos__video').length) {
        youtubeVideo()
    }

    if($('.regioes-atendidas').length) {
        mapa()
    }

    if($('input[name="cpf"]').length) {
        mask()
    }

    if($('.evolucao').length) {
        evolucao()
    }
})

function wrapperDistance() {
    let distance = $('.wrapper').offset().left

    $('.wrapper-left').each(function () {
        $(this).css({ 'padding-left': distance + 'px' })
    })
    $('.wrapper-right').each(function () {
        $(this).css({ 'padding-right': distance + 'px' })
    })

    $('.wrapper-full').each(function () {
        $(this).css({ 'padding': '0 ' + distance + 'px' })
    })
}

function header() {
    $('.header__mobile').on('click', function () {
        $(this).toggleClass('header__mobile--active')
        $('.header__menu').toggleClass('header__menu--active')
    })
}

function sliders() {
    $('.banner, .story').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        dots: true
    })

    $('.content__banner').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true
    })

    $('.fornecedores__container').slick({
        slidesToShow: 4,
        // slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: true,
        responsive: [
            {
              breakpoint: 900,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            }
        ]
    })

    $('.infraestrutura__slider').each(function(num, elem) {
        elem = $(elem);
        elem.slick({
            slidesToShow: 1,
            slidesToSroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: false,
            dots: false,
            asNavFor: elem.next('.infraestrutura__slider--nav')
        });

        elem.next('.infraestrutura__slider--nav').slick({
            slidesToShow: 4,
            slidesToSroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            arrows: true,
            dots: false,
            centerMode: true,
            focusOnSelect: true,
            asNavFor: elem,

            responsive: [
                {
                breakpoint: 900,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
                }
            ]
        });
    })

    $('.trabalhe-conosco__box').slick({
        vertical: true,
        slidesToShow: 3,
        slidesToSroll: 1,
        infinite: false,
        dots: true,
        arrows: false,
    })
}

function mapa() {
    $.ajax({
        url: $('.regioes-atendidas__arquivo').data('url'),
        context: document.body
    }).done(function (data) {
        let previousUF = false;
        let newData = [];

        data.result[0].map(function(item, index){
            if (item.UF === previousUF) {
                let lastItem = newData.pop();
                lastItem.elements.push(item)
                newData.push(lastItem);
            } else {
                let newEntry = {
                    uf: item.UF,
                    elements: [item]
                };
                newData.push(newEntry);
            }
            previousUF = item.UF;
        })

        $.each(newData, function(i, itemUF) {
            $('.regioes-atendidas__accordion').append(`
            <div class="regioes-atendidas__tab" data-tab="${itemUF.uf.toLowerCase()}">
                <span>+</span><span>${itemUF.uf.toLowerCase()}</span>
                <div class="regioes-atendidas__content"></div>
            </div>`)


            $.each(itemUF.elements, function(i, item){
                const {UF, CIDADE, NOME, TELEFONE} = item
                if(UF.toLowerCase() == itemUF.uf.toLowerCase()) {
                    if($(`[data-cidade="${CIDADE.toLowerCase().replace(/[^A-Z0-9]+/ig, "_")}"]`).length) {
                        $('.regioes-atendidas__tab[data-tab="'+UF.toLowerCase()+'"] .regioes-atendidas__content').append(`
                            <p>
                                <strong>Nome: </strong>${NOME.toLowerCase()}<br/>
                                <strong>Telefone: </strong><a href="tel+55${TELEFONE.toLowerCase()}">${TELEFONE.toLowerCase()}</a>
                            </p>
                        `)
                    } else {
                        $('.regioes-atendidas__tab[data-tab="'+UF.toLowerCase()+'"] .regioes-atendidas__content').append(`
                            <h4 class="regioes-atendidas__state" data-cidade="${CIDADE.toLowerCase().replace(/[^A-Z0-9]+/ig, "_")}">Cidade: ${CIDADE.toLowerCase()}</h4>
                            <p>
                                <strong>Nome: </strong>${NOME.toLowerCase()}<br/>
                                <strong>Telefone: </strong><a href="tel+55${TELEFONE.toLowerCase()}">${TELEFONE.toLowerCase()}</a>
                            </p>
                        `)
                    }
                }
            })
        })

        $('.regioes-atendidas__tab > span').on('click', function(e) {
            if (e.target == this) {
                let estado = $(this).parent().data('tab')
                let mapa = $('.regioes-atendidas__mapa svg')
                let path = mapa.find('#'+estado)
    
                mapa.find('path').attr('fill', '#eaeaea')
                
                // $('.regioes-atendidas__tab').find('.regioes-atendidas__content').removeClass('regioes-atendidas__content--active')
                $(this).parent().find('.regioes-atendidas__content').toggleClass('regioes-atendidas__content--active')
                if(path.is('path')) {
                    path.attr('fill', '#177793')
                } else {
                    path.find('path').attr('fill', '#177793')
                }
                
                let pathPositionTop = path.offset().top
                let pathPositionLeft = path.offset().left
    
                let mapaPositionTop = $('.regioes-atendidas__mapa').offset().top
                let mapaPositionLeft = $('.regioes-atendidas__mapa').offset().left
    
                $('.regioes-atendidas__mapa span').remove()
                $('.regioes-atendidas__mapa').append('<span>'+estado+'</span>')
                $('.regioes-atendidas__mapa span').css({
                    'top': pathPositionTop - mapaPositionTop + path[0].getBoundingClientRect().height / 2,
                    'left': pathPositionLeft - mapaPositionLeft + path[0].getBoundingClientRect().width / 2,
                })
            }
        })

        function getCidade(cidade) {
            return data.result[0].filter(function(data){
                if(data.CIDADE == cidade) {
                    $('.regioes-atendidas__accordion > span').remove()
                    $('.regioes-atendidas__accordion input[type="search"]').css('border-color', '#414042')
                    $('.regioes-atendidas__content').removeClass('regioes-atendidas__content--active')
                    $('.regioes-atendidas__state[data-cidade="'+cidade.toLowerCase().replace(/[^A-Z0-9]+/ig, "_")+'"]').parent().addClass('regioes-atendidas__content--active')
                    $('.regioes-atendidas__content--active').animate({
                        scrollTop: $('.regioes-atendidas__state[data-cidade="'+cidade.toLowerCase().replace(/[^A-Z0-9]+/ig, "_")+'"]').position().top
                    }, 400); 
                } else {
                    if($('.regioes-atendidas__content--active').length < 1) {
                        $('.regioes-atendidas__accordion > span').remove()
                        $('.regioes-atendidas__accordion input[type="search"]').css('border-color', 'red')
                        $('.regioes-atendidas__accordion input[type="search"]').after('<span>Cidade não encontrada!</span>')
                    }
                }
            });
        }

        $('.regioes-atendidas__accordion input[type="search"]').on('change', function() {
            $('.regioes-atendidas__content--active').removeClass('regioes-atendidas__content--active')
            getCidade($(this).val().toUpperCase())
        })
    })

}


function evolucao() {
    $('.2012').on('mouseover', function () {
        $('.2012-info').addClass('info-active')
    })

    $('.2012').on('mouseleave', function () {
        $('.2012-info').removeClass('info-active')
    })

    $('.2013').on('mouseover', function () {
        $('.2013-info').addClass('info-active')
    })

    $('.2013').on('mouseleave', function () {
        $('.2013-info').removeClass('info-active')
    })

    $('.2014').on('mouseover', function () {
        $('.2014-info').addClass('info-active')
    })

    $('.2014').on('mouseleave', function () {
        $('.2014-info').removeClass('info-active')
    })

    $('.2018').on('mouseover', function () {
        $('.2018-info').addClass('info-active')
    })

    $('.2018').on('mouseleave', function () {
        $('.2018-info').removeClass('info-active')
    })

    $('.2019').on('mouseover', function () {
        $('.2019-info').addClass('info-active')
    })

    $('.2019').on('mouseleave', function () {
        $('.2019-info').removeClass('info-active')
    })
    $('.2020').on('mouseover', function () {
        $('.2020-info').addClass('info-active')
    })

    $('.2020').on('mouseleave', function () {
        $('.2020-info').removeClass('info-active')
    })

    $('.2021').on('mouseover', function () {
        $('.2021-info').addClass('info-active')
    })

    $('.2021').on('mouseleave', function () {
        $('.2021-info').removeClass('info-active')
    })

    $('.2022').on('mouseover', function () {
        $('.2022-info').addClass('info-active')
    })

    $('.2022').on('mouseleave', function () {
        $('.2022-info').removeClass('info-active')
    })
}

function mask() {
    $('input[name="cpf"]').mask('000.000.000-00', {reverse: true})
}

function youtubeVideo() {
    $('.quemsomos__video').on('click', function () {
        $(this).addClass('quemsomos__video--active')
    })
}