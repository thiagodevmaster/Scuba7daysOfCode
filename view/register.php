<?php require_once __DIR__."/layout/start.php"; ?>

    <a href="./?page=login"><h1>Scuba<span>PHP</span></h1></a>

    <form action="/register" method="POST">
        <p>Cadastre Um Novo Usuário</p>
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="mensagem-erro">
                <p><?= $_SESSION['error_message']; ?></p>
            </div>
        <?php endif; ?>


        <label for="nome">Nome</label>
        <input type="text" name="name" required>
        <?php if(isset($_SESSION['error_message_name'])): ?>
            <span class="mensagem-erro"><?= $_SESSION['error_message_name']; ?></span>
            <?php unset($_SESSION['error_message_name']);?>
        <?php endif; ?>

        <label for="email">E-mail</label>
        <input type="email" name="email" required>
        <?php if(isset($_SESSION['error_message_email'])): ?>
            <span class="mensagem-erro"><?= $_SESSION['error_message_email']; ?></span>
            <?php unset($_SESSION['error_message_email']);?>
        <?php endif; ?>

        <label for="senha">Senha</label>
        <input type="password" name="password" required>
        <?php if(isset($_SESSION['error_message_password'])): ?>
            <span class="mensagem-erro"><?= $_SESSION['error_message_password']; ?></span>
            <?php unset($_SESSION['error_message_password']);?>
        <?php endif; ?>

        <label for="repita-senha">Repita Senha</label>
        <input type="password" name="password-confirm" required>
        <?php if(isset($_SESSION['error_message_password'])): ?>
            <span class="mensagem-erro"><?= $_SESSION['error_message_password']; ?></span>
            <?php unset($_SESSION['error_message_password']);?>
        <?php endif; ?>

        <input type="submit" value="Salvar">

    </form>

<?php require_once __DIR__."/layout/final.php"; ?>
