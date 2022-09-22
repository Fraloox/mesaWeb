function mostrarError(mensaje){

  document.getElementById('error-alert').textContent = mensaje;

  document.getElementById('error-alert').style.display = 'block'; 

}

function ocultarError(){  

  document.getElementById('error-alert').style.display = 'none';

}