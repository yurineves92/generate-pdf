<?php

use Source\Models\User;

require dirname(__DIR__, 1)."/vendor/autoload.php";
$users = (new User())->find()->order("first_name")->fetch(true);

?>
<!doctype html>
<html lang="pt-br">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Open Sans", sans-serif;
        }

        body {
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border: 1px solid #555555;
            margin: 0;
            padding: 0;
        }

        th {
            text-transform: uppercase;
        }

        table, th, td {
            border: 1px solid #555555;
            border-collapse: collapse;
            text-align: left;
            padding: 10px;
        }

        tr:nth-child(2n+0) {
            background: #eeeeee;
        }

        p {
            color: #888888;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <h1>Usuários: </h1>
        <table>
            <tr>
                <th>Nome: </th>
                <th>Sobrenome: </th>
                <th>Email: </th>
                <th>Cadastro: </th>
            </tr>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?= $user->first_name; ?></td>
                    <td><?= $user->last_name; ?></td>
                    <td><?= "user@email.com" ?></td>
                    <td><?= date("d/m/Y", strtotime($user->created_at)); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p>Gerado no dia <?= date(DATE_W3C)?></p>
    </div>
</body>
</html>