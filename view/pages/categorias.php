<?php

require_once './../../config/env.php';
require_once "./../../controller/categoriaController.php";

$categoriaController = new CategoriaController();
$categoria = $categoriaController->listarCategorias();

session_start(); // Inicia a sessão para acessar as mensagens

// Verifica se a mensagem de erro está na sessão
if (isset($_SESSION['erro'])) {
    // Exibe o alerta em JavaScript
    echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
    
    // Apaga a mensagem de erro após exibi-la para evitar mostrar novamente em futuros carregamentos
    unset($_SESSION['erro']);
}

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
                    <th><button onclick="criarCategoria()">Cadastrar Categoria</button></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categoria as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['categoria'] ?></td>
                        <td>
                            <a href="#" class="editar" value="categoria" onclick="editarCategoria('<?= $item['id'] ?>','<?= $item['categoria'] ?>')">
                                <span class="material-symbols-outlined">
                                    edit_square
                                </span>
                            </a>
                        </td>
                        <td>
                            <form action="../../router/categoriaRouter.php?acao=delete" method="POST">
                                <input type="hidden" name="id" value="<?php echo $item["id"]?>">
                                <button>Excluir</button>
                            </form>
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
