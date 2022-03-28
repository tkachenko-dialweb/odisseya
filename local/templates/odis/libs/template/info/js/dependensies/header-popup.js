let popup = document.querySelectorAll('.popup')[0]
let popupButton = document.querySelectorAll('.burger-btn')[0]
let close = document.querySelectorAll('.popup__close')[0]
popupButton.addEventListener('click', function () {
    popup.classList.remove('none')
    document.body.style.overflow = "hidden"
})

close.addEventListener('click', function () {
    popup.classList.add('none')
    document.body.style.overflow = "unset"
})