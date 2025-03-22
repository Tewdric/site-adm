<?php

require_once './../../config/env.php';
require_once "./../../controller/categoriaController.php";

$categoriaController = new CategorialController();
$categoria = $categoriaController->listarCategorias();


?>

<?php require_once __DIR__ . '\..\components\head.php';
?>

<body class="content">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main class="content-text">
        <h1>Categoria</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Categoria</th>
                    <th colspan="2">Acoes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoria as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['categoria'] ?></td>
                        <td>
                            <a href="#" class="editar" value="categoria" onclick="editar('<?= $item['id'] ?>','<?= $item['categoria'] ?>')">
                                <span class="material-symbols-outlined">
                                    edit_square
                                </span>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <span class="material-symbols-outlined" tooltip="Excluir">
                                    delete
                                </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
        
</body>
</html>
