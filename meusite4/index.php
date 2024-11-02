<?php


require "Database.php";


$database = new Database(
    "localhost",
    3306,
    "root",
    "",
    "filmesdb"
);


var_dump($database);

$conn = $database->__createConnection();

var_dump($conn);

$stmt = $conn->prepare("SELECT * FROM filme");

$stmt->execute();

// foreach ($stmt as $row) {
//     print_r($row);
// }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
            <?php foreach ($stmt as $row) {?>
            <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["titulo"]?></td>
                <td><?php echo $row["ano"]?></td>
                <td><?php echo $row["descricao"]?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>
