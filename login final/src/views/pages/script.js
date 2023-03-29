var selectedRow = null;

//Alertas
function showAlert(message, className){
    const div = document.createElement("div");
    div.className = 'alert alert-${className}';

    div.appendChild(document.createTextNode(message));
    const container = document.querySelector(".container");
    
}
