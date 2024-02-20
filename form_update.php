<?php if(isset($_GET["id"]) && !empty($_GET["id"])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form_update.css">
    <title>Actualizar datos</title>
</head>
<body>
    <form class="container_form_udp">
        <input name="name" class="input" type="text" value="miNombre">
        <input name="lastname" class="input" type="text" value="misApellidos">
        <input name="domicile" class="input" type="text" value="miDomicilio">
        <button class="btn_update" data-id="<?php echo $_GET['id']; ?>" onclick="send_data_udp(this);" type="button">Actualizar</button>
    </form>

    <script src="javascript/form_update.js"></script>
</body>
</html>

<?php endif; ?>