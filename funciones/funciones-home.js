function cargarDatos(){

    //Cargo los datos obtenidos, en los imputs
    //Lo hago de esta manera para que se entienda mejor el codigo


    //instancio el elemento al que voy a acargar
    var nombre = document.getElementById("txtNombre");
    var apellido = document.getElementById("txtApellido");
    var dni = document.getElementById("txtDni");
    var telefono = document.getElementById("txtTelefono");
    var email = document.getElementById("txtEmail");
    var rol = document.getElementById("sctRol");
    var direccion = document.getElementById("txtDireccion");


    //cargo el elemento con el valor que esta en un input hidden
    nombre.value = document.getElementById("dato_nombre").value;
    apellido.value = document.getElementById("dato_apellido").value;
    dni.value = document.getElementById("dato_dni").value;
    telefono.value = document.getElementById("dato_telefono").value;
    email.value = document.getElementById("dato_email").value;
    rol.value = document.getElementById("dato_rol").value;
    direccion.value = document.getElementById("dato_direccion").value;

}