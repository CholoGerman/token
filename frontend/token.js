window.onload = () => {


}


    login(correo, password){
    let url ="http://localhost/token/backend/controlador.php?funcion=login";
    let formData = new FormData();
    formData.append("correo",correo);
    formData.append("password",password);
    let config = {
        method:"POST",
        body:formData 
    }
    let respuesta = await fetch(url,config);

}