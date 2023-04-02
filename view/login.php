<?php require_once __DIR__."/layout/start.php"; ?>

    <h1>Scuba<span>PHP</span></h1>
    <form action="/login" method="POST">
        <?php if(isset($_SESSION['success_message'])): ?>
            <div class="mensagem-sucesso">
                <p><?= $_SESSION['success_message']; ?></p>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="mensagem-erro">
                <p><?= $_SESSION['error_message']; ?></p>
            </div>
        <?php endif; ?>
        
        <label for="login">Email</label>
        <input type="email" name="email" required>
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->
        
        <label for="password">Senha</label>
        <input type="password" name="password" required>
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->
        
        <button>Entrar</button>
        <a href="./register">Cadastrar Usuário</a>
        <a href="./forget-password">Esqueci Minha Senha</a>
    </form>

<?php require_once __DIR__."/layout/final.php"; ?>
