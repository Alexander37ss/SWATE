function constanciaDescargar(){
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        $(".swal2-modal").css('background-color', 'white', '!important');//Optional changes the color of the sweetalert 

      }
    })
    
    Toast.fire({
      icon: 'success',
      title: 'Se ha descargado satisfactoriamente',
      background: 'white',
      color: 'black'
    })
}
function prejustificante(){
  const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        $(".swal2-modal").css('background-color', 'white', '!important');//Optional changes the color of the sweetalert 

      }
    })
    
    Toast.fire({
      icon: 'success',
      title: 'Solicitud enviada',
      background: 'white',
      color: 'black'
    })
}