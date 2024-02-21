function send_data_register(element_current){
    const data_form = document.querySelector(".container_form_register");
    var formData = new FormData(data_form);
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ' - ' + pair[1]); 
    }
    fetch("middlewares/process_register.php", {
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