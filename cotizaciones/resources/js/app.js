import './bootstrap';

/**
 * Muestra u oculta el div de entrada de color de franja según el estado del checkbox.
 * Si el checkbox con id 'franja_color_si' está marcado, se muestra el div con id 'franja_color_input';
 * de lo contrario, se oculta.
 */
window.toggleInputDisplay = function(checkboxId, inputDivId) {
    const checkbox = document.getElementById(checkboxId);
    const inputDiv = document.getElementById(inputDivId);
    if (checkbox && inputDiv) {
        inputDiv.style.display = checkbox.checked ? 'block' : 'none';
    }
}
