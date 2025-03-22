<?php 

require_once './../../config/env.php'; 
require_once "./../../controller/usuarioController.php";

$usuarioController = new UsuarioController();
$usuario = $usuarioController->listarUsuarios();


?>

<?php require_once __DIR__ . '\..\components\head.php'; ?>
<body class="content">
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main class="content-grid">
        <h1>Usuários</h1>

        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th colspan="2">Acoes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuario as $item): ?>
                    <tr>
                        <td><?= $item['nome'] ?></td>
                        <td><?= $item['email'] ?></td>

                            <td>
                                <a href="#" class="editar" onclick="editar('<?= $item['nome'] ?>','<?= $item['email'] ?>')" value="usuario">
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