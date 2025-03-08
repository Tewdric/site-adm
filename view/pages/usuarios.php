<?php 

require_once './../../config/env.php'; 
require_once './../../model/UsuarioModel.php';

    // $usario_dados = new UsuarioModel();


    // var_dump($usario_dados->usuarios);

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
                <?php foreach (UsuarioModel::$usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['nome'] ?></td>
                        <td><?= $usuario['email'] ?></td>

                            <td><a href="#" class="editar" onclick="editar('<?= $usuario['nome'] ?>','<?= $usuario['email'] ?>')" value="usuario">Editar</a></td>
                            <td><a href="#">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </main>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>

    <script src="<?= VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>