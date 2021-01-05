(function() {
    // 'use strict';

    document.addEventListener('DOMContentLoaded', function() {

        //Botón
        let calculo = document.getElementById('btnIVA');
        let div = document.getElementById('buttons');
        let htmlTotal = document.getElementById('total');
        let numero = document.createElement('h4');
        let total = Number.parseFloat(htmlTotal.value);

        calculo.addEventListener('click', verificarCampos);

        function verificarCampos(event) {
            event.preventDefault();
            numero.innerHTML = 'IVA = $' + (total * 0.16);
            div.appendChild(numero);
        }

    });
})();