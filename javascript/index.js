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
            console.log("Success:", response)
        });
    }
});
