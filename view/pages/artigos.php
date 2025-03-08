<?php

require_once './../../config/env.php';
require_once './../../model/ArtigosModel.php';

require_once './../../model/UsuarioModel.php';
require_once './../../model/CategoriasModel.php';


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
                    <?php foreach (ArtigosModel::$artigo as $artigos):
                        $nome_autor = $artigos['id_autor'];
                        $nome_categoria = $artigos['id_categoria'];

                        foreach (UsuarioModel::$usuarios as $usuario) {
                            if ($usuario['id'] == $nome_autor) {
                                $artigos['id_autor'] = $usuario['nome'];
                            }
                        }

                        foreach (CategoriasModel::$categoria as $categorias) {
                            if ($categorias['id'] == $nome_categoria) {
                                $artigos['id_categoria'] = $categorias['categoria'];
                            }
                        }
                    ?>

                        <tr>
                            <td><?= $artigos['id'] ?></td>
                            <td><?= $artigos['texto'] ?></td>
                            <td><?= $artigos['id_categoria'] ?></td>
                            <td><?= $artigos['id_autor'] ?></td>

                            <td><a href="#" class="editar" value="artigo" onclick="editar('<?= $artigos['texto'] ?>', '<?= $artigos['id_categoria'] ?>', '<?= $artigos['id_autor'] ?>')">
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