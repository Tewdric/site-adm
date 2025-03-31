<?php

require_once './../../config/env.php';

require_once "./../../controller/artigoController.php";

$artigoController = new ArtigoController();
$artigo = $artigoController->listarArtigos();

?>

<?php
//require_once __DIR__ . '\..\components\head.php';
require_once '../components/head.php';
?>

<body class="content">
    <?php require_once '../components/navbar.php'; ?>
    <?php require_once '../components/sidebar.php'; ?>

    <main class="content-grid">
        <h1>Artigos</h1>

        <section class="content-grid">
            <table border="1">
                <thead>
                    <tr>
                        <th>Id Artigo</th>
                        <th>Texto</th>
                        <th>Categoria</th>
                        <th>Autor</th>
                        <th colspan="2">Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($artigo as $item):?>

                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['texto'] ?></td>
                            <td><?= $item['categoria'] ?></td>
                            <td><?= $item['nome'] ?></td>

                            <td><a href="#" class="editar" value="artigo" onclick="editarArtigo('<?= $item['id'] ?>', '<?= $item['texto'] ?>', '<?= $item['categoria'] ?>','<?= $item['nome'] ?>')">
                                    <span class="material-symbols-outlined">
                                        edit_square
                                    </span>
                                </a></td>
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
        </section>
    </main>

    <?php require_once '../components/footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>

</html>