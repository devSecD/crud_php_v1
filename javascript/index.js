var data_delete = null; 
const dialog = document.querySelector(".alert-delete");

function open_dialog_delete(current_element){
    data_delete = current_element.dataset.id;
    dialog.showModal();
}

const closeButton = document.querySelector(".close");
closeButton.addEventListener("click", () => {
    dialog.close();
});

const okButton = document.querySelector(".ok");
okButton.addEventListener("click", ()=>{
    if(data_delete != null){
        var formData = new FormData();
        formData.append("id", data_delete);
        fetch("middlewares/process_deletes.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.json())
        .catch((error) => {
            console.error("Error:", error)
        })
        .then((response) => {
            if(response == "ok") location.reload();
        });
    }
});

// get all people
var formData = new FormData();
formData.append("data", "people");
fetch("middlewares/process_get_people.php", {
    method: "POST",
    body: formData,
})
.then((response) => response.json())
.catch((error) => {
    console.error("Error:", error);
})
.then((response) => {
    if(response.length > 0){
        const tableContainer = document.getElementById('table-container');  
        tableContainer.innerHTML = generateTable(response);  
    }
});

function generateTable(data) {  
    let table = '<tr><th>Nombre</th><th>Apellidos</th><th>Domicilio</th><th>Acciones</th></tr>';  
    data.forEach(item => {  
        table += `<tr><td>${item.name}</td><td>${item.lastname}</td><td>${item.domicile}</td><td><div class="buttons_action"><button class="button_edit" data-id="${item.id}" onclick="location.href ='form_update.php?id=${item.id}'">Actualizar</button><button class="button_delete open-dialog" data-id="${item.id}" onclick="open_dialog_delete(this);">Borrar</button></div></td></tr>`;
    });  
    return table;
}