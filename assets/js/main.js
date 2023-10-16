const menuLi = document.querySelectorAll('.menu__item');
menuLi.forEach(element => {
    element.addEventListener('mouseover',()=> {
        const sub_menu = element.querySelector('.sub_menu');
        sub_menu.style.display = 'block';
    })
});
menuLi.forEach(element => {
    element.addEventListener('mouseout',()=> {
        const sub_menu = element.querySelector('.sub_menu');
        sub_menu.style.display = 'none';
    })
});


// import AirDatepicker from '../airdatepicker';
// import '../airdatepicker/air-datepicker.css';

// new AirDatepicker('#date', {
//     isMobile: true,
//     autoClose: true
// });

$(function(){
    $('.slider').slick({
        infinite: true,
        autoplay:true, /* Автообновление картинок */
        autoplaySpeed:2000, /* Скорость обновления картинок  */
        slidesToShow:1,
        dots:true,
        arrow:true,

        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
              }
            },
            {
                breakpoint: 850,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true,
                  arrow:false
                }
              },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll:1,
                infinite:true,
                dots:true,
                arrow:false
              }
            },
            {
              breakpoint: 425,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrow:false
              }
            }
        ]

      })

})


// вкладки
const buttons = document.querySelectorAll('.tabs__header-button');
const tabs = document.querySelectorAll('.tabs__body');

for(let x = 0; x < buttons.length; x++){
    buttons[x].addEventListener('click',()=>{
        for(let y = 0; y < tabs.length; y++){
            if(x == y){
                tabs[y].classList.add('body__active');
                buttons[y].classList.add('button__active');
            }
            else{
                tabs[y].classList.remove('body__active');
                buttons[y].classList.remove('button__active');
            }
        }
        buttons[x].classList.add('button__active');
    })
}