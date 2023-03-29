var selectedRow = null;


function showAlert(message, className){
    const div = document.createElement("div");
    div.className = `alert alert-${className}`;

    div.appendChild(document.createTextNode(message));
    const container = document.querySelector(".container");
    const main = document.querySelector(".main");
    container.insertBefore(div, main);

    setTimeout(() => document.querySelector(".alert").remove(), 3000);
}


function clearFields(){
    document.querySelector("#Apellido_Paterno").value = "";
    document.querySelector("#Apellido_Materno").value = "";
    document.querySelector("#Email").value = "";
    document.querySelector("#Contraseña").value = "";
}


document.querySelector("#student-form").addEventListener("submit", (e) =>{
    e.preventDefault();

    const firstName = document.querySelector("#firstName").value;
    const lastName = document.querySelector("#lastName").value;
    const rollNo = document.querySelector("rollNo").value;

    if (firstName == "" || lastName == "" || rollNo == ""){
        showAlert("Plase fill in all fields", "danger");
    }
    else{
        if(selectedRow == null)
        //const list = document.querySelector("#student-list");
        //const row = document.createElement("tr");

        row.innerHTML = `
            <td>${firstName}</td>
            <td>${lastName}</td>
            <td>${rollNo}</td>
            <td>${Contraseña}</td>
            <td>
            <a href="#" class="btn btn-warning btn-sm edit">Edita</a>
            <a href="#" class="btn btn-danger btn-sm delete">Delete</a>
        `;
        list.appendChild(row);
        selectedRow = null;
        showAlert("Student Added", "success");
    }
});


document.querySelector("#student-list").addEventListener("click", (e) =>{
    target = e.target;
    if(target.classList.contains("delete")){
        target.parentElement.parentElement.remove();
        showAlert("Student Data Deleted", "danger");

    }
});