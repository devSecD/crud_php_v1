<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form_update.css">
    <title>Actualizar datos</title>
</head>
<body>
    <h2>Registre sus datos</h2>
    <form class="container_form_register">
        <input name="name" class="input" type="text" placeholder="Name">
        <input name="lastname" class="input" type="text" placeholder="Lastname">
        <input name="domicile" class="input" type="text" placeholder="Domicile">
        <button class="btn_register" onclick="send_data_register(this);" type="button">Reguistrar</button>
    </form>

    <script src="javascript/form_register.js"></script>
</body>
</html>

