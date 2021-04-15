// // Import jQuery module (npm i jquery)
import $ from 'jquery'
window.jQuery = $
window.$ = $

// // Import vendor jQuery plugin example (not module)
// require('~/app/libs/mmenu/dist/mmenu.js')

document.addEventListener('DOMContentLoaded', () => {

	$('.cont-h1 .h1').click(function (){
   $('.cont-h1 ul').slideToggle(200);
 })




 $(".recomend-item .btn-item").click(function(e){
   e.preventDefault();
   let ths = $(this);
   if(!ths.hasClass('active')) {
     ths.addClass('active').parent().find('.recomend-item--text').css('height', 'auto');
   } else {
     ths.removeClass('active').parent().find('.recomend-item--text').removeAttr('style');
   }
    
 });

 $('.recomend--tabs ul').on('click', 'li:not(.active)', function() {
  $(this)
    .addClass('active').siblings().removeClass('active')
    .closest('.recomend').find('div.recomend--tab').removeClass('active').eq($(this).index()).addClass('active');
 });
 
 $('.recomend-item').each(function(i){
   $(this).find('.recomend-item--hover a').attr("data-id", i + 1);
 });

 $('.btn-cart').click(function(e) {
   e.preventDefault()
   $('.carts').show();
   $('body').css('overflow', 'hidden');
 });

 $('.cart--title .btn-close').click(function(e) {
  e.preventDefault()
  $('.carts').hide();
  $('body').removeAttr('style');
 });

 
 $('.recomend--tabs ul li:eq(0)').addClass('active');
 $('.recomend--tab:eq(0)').addClass('active');

 //$('.recomend--tabs ul li:eq(0), .recomend--tab:eq(0)').remove();

 $('.btn-hide').click(function (e){
   e.preventDefault();
   let ths = $(this),
       block = ths.closest('.recomend-small').find('.recomend-small--wrapper')
   block.slideToggle(500).toggleClass('hide-wrap');
   ths.toggleClass('hide');
   if(block.hasClass('hide-wrap')) {
     ths.text('Показать');
   } else {
     ths.text('Скрыть');
   }
 });
     



 $(".mod-comp-item-slide--title span").click(function (){
   let ths = $(this);
   ths.closest('.mod-comp-item-slide--title').toggleClass("active");
   ths.closest('.mod-comp-item-slide')
      .find('.mod-comp-item-slide--text')
      .slideToggle(500);
 });

 let arrayFromStroage2 = localStorage.getItem('cart');

 function cartAddOn() {
   let data = JSON.parse(localStorage.getItem('cart'));
    if (data) {
       let counts = Object.keys(data);
       counts.forEach(function(i){
         let $items = $('.recomend-item--hover a[data-id="'+i+'"]');
         $items.closest('.recomend-item').addClass('cart-add-on');
         $items.addClass('removeItems').removeClass('addtocard').html('Удалить из корзины');
       });
    } 
 }
 cartAddOn();

  function CountItems() {
   let arrayFromStroage = JSON.parse(localStorage.getItem('cart'));
   if(arrayFromStroage) {
     let countArr = Object.keys(arrayFromStroage);
     $('.cart-button span').html(countArr.length);
   } else {
     $('.cart-button span').html('0');
   }
  }
  CountItems();

  var output = localStorage.getItem('cart');
  var user_selected_images = JSON.stringify(output);
  var selFiles = user_selected_images;
  var selFiles = JSON.parse(selFiles);

var d = document,
    itemBox = d.querySelectorAll('.recomend-item'), // блок каждого товара
    cartCont = d.getElementById('cart_content'); // блок вывода данных корзины
// Функция кроссбраузерной установка обработчика событий
function addEvent(elem, type, handler){
  if(elem.addEventListener){
    elem.addEventListener(type, handler, false);
  } else {
    elem.attachEvent('on'+type, function(){ handler.call( elem ); });
  }
  return false;
}
// Получаем данные из LocalStorage
function getCartData(){
  return JSON.parse(localStorage.getItem('cart'));
}
//Проверяем пустой ли объект
function checkCart() {
  let cartData = getCartData();
  let counts = Object.keys(cartData);
  if(counts == 0){
     localStorage.removeItem('cart');
  } else {
    console.log('Тут еще есть элементы');
  }
}

//Удаляем элемент из корзины
 function removeItem() {
  $('.removeItems').click(function(e){
    e.preventDefault();
    let ths = $(this),
        data = ths.data('id'),
        itemId = data,
        cartData = getCartData();
        delete cartData[itemId];
        setCartData(cartData);
    CountItems();
    ths.closest('.recomend-item').removeClass('cart-add-on');
    ths.removeClass(".removeItems").addClass('addtocard').html('В корзину');
    checkCart();
    location.reload();
  });
 }
 removeItem();

// Записываем данные в LocalStorage
function setCartData(o){
  localStorage.setItem('cart', JSON.stringify(o));
  return false;
}
// Добавляем товар в корзину
function addToCart(e){
  e.preventDefault(); // блокируем кнопку на время операции с корзиной
  var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
      parentBox = this.closest('.recomend-item'), // родительский элемент кнопки "Добавить в корзину"
      itemId = this.getAttribute('data-id'), // ID товара
      itemTitle = parentBox.querySelector('.recomend-item--text').innerHTML, // стоимость товара
      itemRazor = parentBox.getAttribute('data-razor'),
      itemCooking = parentBox.getAttribute('data-cooking'),
      itemCheck = parentBox.getAttribute('data-check'),
      itemDesc = parentBox.getAttribute('data-desc'),
      itemSect = parentBox.getAttribute('data-sect');

  if(cartData.hasOwnProperty(itemId)){ // если такой товар уже в корзине, то добавляем +1 к его количеству
    cartData[itemId][2] += 1;
  } else { // если товара в корзине еще нет, то добавляем в объект
    cartData[itemId] = [itemTitle, itemCooking, itemCheck, itemDesc, itemSect, itemRazor, 1];

  }
  if(!setCartData(cartData)){ // Обновляем данные в LocalStorage
    this.disabled = false; // разблокируем кнопку после обновления LS
  }
 CountItems();
 cartAddOn();
 removeItem();
 return false;
}
// Устанавливаем обработчик события на каждую кнопку "Добавить в корзину"
for(var i = 0; i < itemBox.length; i++){
  addEvent(itemBox[i].querySelector('.recomend-item--hover .addtocard'), 'click', addToCart);
}


// Открываем корзину со списком добавленных товаров

function openCart(e){
  var cartData = getCartData(), // вытаскиваем все данные корзины
      totalItems = ''; // если что-то в корзине уже есть, начинаем формировать данные для вывода
  if(cartData !== null){
    totalItems = '<div class="cart-item-compitence--item">';
    for(let items in cartData){
        totalItems += '<div class="cart-item-compitence--title">';
        totalItems += '<h4 class="h4">'+cartData[items][4]+'<h4>';
        totalItems += '</div>';
        totalItems += '<div class="cart-item-compitence--ink"><div class="cart-item-compitence--ink-title">';
        totalItems += '<h5 class="h5"><span>'+cartData[items][2]+':</span> '+cartData[items][3]+'</h5>';
        totalItems += '</div>';
        totalItems += '<div class="cart-item-compitence--ink-item"><div class="cart-item-compitence--tabs">';
        totalItems += '<div class="compitence--tabs-tl">';
        totalItems += '<span>'+cartData[items][1]+'%:</span> '+cartData[items][5];
        totalItems += '</div>';
        totalItems += '<ul>';
        totalItems += '<li><a href="#">В течение года выявить зоны неэффективности... </a></li>';
        totalItems += '</ul>';
        totalItems += '</div></div>';
        totalItems += '</div>';
    }
    totalItems += '</div>';
    cartCont.innerHTML = totalItems;
  } else {
    // если в корзине пусто, то сигнализируем об этом
    cartCont.innerHTML = 'В корзине пусто!';
  }
  return false;
}
/* Открыть корзину */
addEvent(d.getElementById('btn-cart'), 'click', openCart);
/* Очистить корзину */
addEvent(d.getElementById('clear_cart'), 'click', function(e){
  localStorage.removeItem('cart');
  cartCont.innerHTML = 'Корзина очишена.';
});

})

/* const fileDownloadButton = document.getElementById('btn-carts');
function localStorageToFile() {
    const csv = localStorage.getItem('cart');
    const csvAsBlob = new Blob([csv], {type: 'text/plain'});
    const fileNameToSaveAs = 'cart.csv';
    const downloadLink = document.getElementById('btn-carts');
    downloadLink.download = fileNameToSaveAs;
    if (window.URL !== null) {
        // Chrome allows the link to be clicked without actually adding it to the DOM
        downloadLink.href = window.URL.createObjectURL(csvAsBlob);
        downloadLink.target = `_blank`;
    } else {
        downloadLink.href = window.URL.createObjectURL(csvAsBlob);
        downloadLink.target = `_blank`;
        downloadLink.style.display = 'none';
        // add .download so works in Firefox desktop.
        document.body.appendChild(downloadLink.download);
    }
    downloadLink.click();
}
// file download button event listener
fileDownloadButton.addEventListener('click', localStorageToFile);  */
