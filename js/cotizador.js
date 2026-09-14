/**
 * -------------------------------------------------------------------------
 * SISTEMA WEB DE GESTIÓN TÉCNICA - MACHIN3 IT
 * -------------------------------------------------------------------------
 * Archivo: js/cotizador.js
 * Descripción: Lógica en JavaScript para el cálculo dinámico del presupuesto 
 * en tiempo real según los servicios seleccionados en el cotizador.
 * -------------------------------------------------------------------------
 */

document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('.servicio-chk');
    const totalAmount = document.getElementById('total-amount');

    checkboxes.forEach(chk => {
        chk.addEventListener('change', () => {
            let sumaTotal = 0;
            checkboxes.forEach(c => {
                if (c.checked) {
                    sumaTotal += parseFloat(c.value);
                }
            });
            totalAmount.textContent = 'S/ ' + sumaTotal.toFixed(2);
        });
    });
});