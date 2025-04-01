<?php 

require_once './../../config/env.php'; 
require_once "./../../controller/usuarioController.php";

$usuarioController = new UsuarioController();
$usuario = $usuarioController->listarUsuarios();

session_start(); // Inicia a sessão para acessar as mensagens

// Verifica se a mensagem de erro está na sessão
if (isset($_SESSION['erro'])) {
    // Exibe o alerta em JavaScript
    echo "<script>alert('" . $_SESSION['erro'] . "');</script>";
    
    // Apaga a mensagem de erro após exibi-la para evitar mostrar novamente em futuros carregamentos
    unset($_SESSION['erro']);
}
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
                    <th><button onclick="criarUsuario()">Cadastrar Usuário</button></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuario as $item): ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['nome'] ?></td>
                        <td><?= $item['email'] ?></td>

                            <td>
                                <a href="#" class="editar" onclick="editarUsuario('<?= $item['id']?>','<?= $item['nome'] ?>','<?= $item['email'] ?>')" value="usuario">
                                    <span class="material-symbols-outlined">
                                        edit_square
                                    </span>
                                </a>
                            </td>
                            <td>
                                <form action="../../router/cadastroRouter.php?acao=delete" method="POST">
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

    <script src="<?=VARIAVEIS['DIR_JS'] ?>main.js"></script>
</body>
</html>