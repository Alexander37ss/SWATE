const mmm = document.querySelectorAll('.breadcrumb-item');
mmm.forEach(elemento => {
    if(elemento.classList.contains('active')){
        elemento.classList.remove('active');
    }
}); 