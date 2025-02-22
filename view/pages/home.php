<?php require_once __DIR__ . '\..\components\head.php'; ?>
<body class="body">
    <!-- arquivo responsável pela tela Home -->

    <!-- 
        require // require_once -> lança erro // once - inclui apenas 1x
        include // include_once -> lança msg de aviso
    -->
    <?php require_once __DIR__ . '\..\components\navbar.php'; ?>
    <?php require_once __DIR__ . '\..\components\sidebar.php'; ?>

    <main class="content-grid">
        <h1>Home</h1>
    </main>
    <Script src="../assets/js/main.js"></Script>

    <?php require_once __DIR__ . '\..\components\footer.php'; ?>
</body>
</html>