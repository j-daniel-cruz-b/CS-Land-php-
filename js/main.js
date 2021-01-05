(function() {
    // 'use strict';

    document.addEventListener('DOMContentLoaded', function() {

        let fName = document.getElementById('firstnameUser');
        let lName = document.getElementById('lastnameUser');
        let userName = document.getElementById('nameUser');
        let emailUser = document.getElementById('emailUser');
        let passUser = document.getElementById('passUser');
        let phoneUser = document.getElementById('phoneUser');

        //Botón
        let registrar = document.getElementById('registrar');

        registrar.addEventListener('click', verificarCampos);

        function verificarCampos(event) {
            event.preventDefault();
            if (isEmpty()) {
                document.getElementById('registrarPhp').style.display = 'block';
                document.getElementById('registrar').style.display = 'none';
            } else {

            }

        }

        const isEmpty = () => {
            if (fName.value == '') {
                alert('El campo [Nombre] se encuentra vacío');
                return false;
            } else if (lName.value == '') {
                alert('El campo [Apellido] se encuentra vacío');
                return false;
            } else if (userName.value == '') {
                alert('El campo [Username] se encuentra vacío');
                return false;
            } else if (emailUser.value == '') {
                alert('El campo [E-mail] se encuentra vacío');
                return false;
            } else if (passUser.value == '') {
                alert('El campo [Contraseña] se encuentra vacío');
                return false;
            } else if (phoneUser.value == '') {
                alert('El campo [Teléfono] se encuentra vacío');
                return false;
            } else {
                return true;
            }
        }

    });
})();