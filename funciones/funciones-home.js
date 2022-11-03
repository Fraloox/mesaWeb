//declaro el elementos para ocuparlos en las funciones

/*  *** DECLARACIONES *** */
var nombre = document.getElementById("txtNombre");
var apellido = document.getElementById("txtApellido");
var dni = document.getElementById("txtDni");
var telefono = document.getElementById("txtTelefono");
var email = document.getElementById("txtEmail");
var rol = document.getElementById("sctRol");
var direccion = document.getElementById("txtDireccion");


/* *** FUNCIONES ***  */ 

function cargarDatos(){    

    //cargo el elemento con el valor que esta en un input hidden
    nombre.value = document.getElementById("dato_nombre").value;
    apellido.value = document.getElementById("dato_apellido").value;
    dni.value = document.getElementById("dato_dni").value;
    telefono.value = document.getElementById("dato_telefono").value;
    email.value = document.getElementById("dato_email").value;
    rol.value = document.getElementById("dato_rol").value;
    direccion.value = document.getElementById("dato_direccion").value;

}

function clearDatos(){

    //sirve para limpiar los campos
    nombre.value = "";
    apellido.value = "";
    dni.value = "";
    telefono.value = "";
    email.value = "";    
    rol.value = "";
    direccion.value= "";

    document.getElementById("txtContrasena").value = "";

}

function vista_form(){//es para la visibilidad de la contraseña

    let pass = document.getElementById('contrasena');
    let ver = document.getElementById('ver');
    let ocultar = document.getElementById('ocultar');

    if(pass.type === 'password'){

        pass.type = 'text';
        ver.style.display = 'none';
        ocultar.style.display = 'block';

    }else{

        pass.type = 'password';
        ver.style.display = 'block';
        ocultar.style.display = 'none';

    }

}

// *** ERROR ALERT ***

function mostrarError(mensaje){

    document.getElementById('error-alert').textContent = mensaje;
  
    document.getElementById('error-alert').style.display = 'block'; 
  
  }
  
  function ocultarError(){  
  
    document.getElementById('error-alert').style.display = 'none';
  
  }

