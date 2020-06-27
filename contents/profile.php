<?php

use Source\Models\User;

require dirname(__DIR__, 1)."/vendor/autoload.php";
$users = (new User())->find()->order("first_name")->fetch(true);

?>
<html lang="pt-br">
<head>
    <style>
        @page {
            margin-top: 70px 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Open Sans", sans-serif;
        }

        .header {
            position: fixed;
            top: -70px;
            left: 0;
            right: 0;

            width: 100%;
            text-align: center;
            background: #555555;
            padding: 10px;
        }

        .header img {
            width: 50px;
        }

        .footer {
            position: fixed;

            /* 43 + 27 = 70 @page */
            bottom: -27px;
            left: 0;

            width: 100%;
            padding: 0px 10px 10px 10px;
            text-align: center;
            background: #555555;
            color: #ffffff;
        }

        .footer .page:after {
            content: counter(page);
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
            text-align: center;
            padding: 10px;
        }

        tr:nth-child(2n+0){
            background: #eeeeee;
        }

        .img-logo {
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="contents/logo.png" alt="">
    </div>

    <div class="footer">
        Gerado no dia <?= date(DATE_W3C)?>, <span class="page">Página </span>
    </div>

    <div class="content">
        <table>
            <tr id="top">
                <th>Usuário: </th>
                <th>Dados: </th>
            </tr>
            <?php 
                for($i = 0; $i < 5; $i++):
                    foreach($users as $user): ?>
                        <tr>
                            <td><img class="img-logo" src="https://www.mozilla.org/media/protocol/img/logos/firefox/browser/logo-lg-high-res.fbc7ffbb50fd.png" alt=""></td>
                            <td>
                                <p><?= $user->first_name; ?> <?= $user->last_name; ?></p>
                                <p><?= "user@email.com" ?></p>
                                <p><?= ["M" => "Masculino", "F" => "Feminino"][$user->genre]; ?></p>
                                <p>Cadastro: <?= date("d/m/Y", strtotime($user->created_at)); ?></p>
                            </td>
                        </tr>
                    <?php 
                    endforeach;
                endfor;
                ?>
        </table>
    </div>
</body>
</html>