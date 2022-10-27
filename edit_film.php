<?php
require_once("film_controller.php");

$film = new Film();
if (isset($_POST["edit"])) {
    $result = $film->update();
}

$result;

if (isset($_POST["update"])) {
    $result = $film->getById($_POST["film_id"])->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Insert Film</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <input type="text" name="film_id" value="<?= $result["film_id"] ?>" class="form-control" id="film_id" hidden>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="<?= $result["title"] ?>" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="language_id" class="form-label">Language ID</label>
                <input type="text" name="language_id" value="<?= $result["language_id"] ?>" class="form-control" id="language_id">
            </div>
            <button class="btn btn-primary" type="submit" name="edit">Submit</button>
        </form>
    </div>
</body>

</html>