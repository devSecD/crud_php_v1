function send_data_udp(element_current){
    const data_form = document.querySelector(".container_form_udp");
    var formData = new FormData(data_form);
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ' - ' + pair[1]); 
    }
    formData.append("id", element_current.dataset.id);
    fetch("middlewares/process_updates.php", {
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