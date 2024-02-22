<?php if(isset($_GET["id"]) && !empty($_GET["id"])): ?>
<?php 
include_once("connections/conneciton.php");
include_once("core/get_person_by_id.php");
$data_person = get_people_by_id($mysqli, $_GET["id"]);
// print_r($data_person);
// Array ( [id] => 1 [name] => a [lastname] => a [domicile] => a )
?>
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
        <input name="name" class="input" type="text" value="<?php echo $data_person["name"]; ?>">
        <input name="lastname" class="input" type="text" value="<?php echo $data_person["lastname"]; ?>">
        <input name="domicile" class="input" type="text" value="<?php echo $data_person["domicile"]; ?>">
        <button class="btn_update" data-id="<?php echo $_GET['id']; ?>" onclick="send_data_udp(this);" type="button">Actualizar</button>
    </form>

    <script src="javascript/form_update.js"></script>
</body>
</html>

<?php endif; ?>