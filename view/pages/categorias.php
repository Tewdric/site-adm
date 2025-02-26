<?php 

require_once './../../config/env.php'; 
require_once './../../model/CategoriasModel.php';


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
                <?php foreach (CategoriasModel::$categoria as $categorias): ?>
                    <tr>
                        <td><?= $categorias['id'] ?></td>
                        <td><?= $categorias['categoria'] ?></td>
                        <td>
                            <a href="">editar</a>
                        </td>
                        <td>
                            <a href="">excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>