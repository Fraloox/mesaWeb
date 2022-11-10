function vista_form(){//es para la visibilidad de la contraseña

    let pass = document.getElementById('txtContrasena');
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

function Numeros(string){//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos

    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
	     out += string.charAt(i);
	
    //Retornar valor filtrado
    return out;
}