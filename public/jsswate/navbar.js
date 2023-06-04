const nav = document.querySelector('.main-header');
window.onscroll = function () {
    if(window.scrollY >= 44){
        nav.classList.remove('border-bottom-null');
    }else{
        nav.classList.add('border-bottom-null');
    }
    console.log(window.scrollY); // Value of scroll Y in px
};