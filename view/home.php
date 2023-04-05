<?php require_once __DIR__."/layout/start.php"; ?>

<?php if(isset($_SESSION['success_message'])): ?>
    <div class="mensagem-sucesso">
        <p><?= $_SESSION['success_message']; ?></p>
    </div>
<?php endif; ?>
    <h1>Scuba<span>PHP</span></h1>

    <div class="info">
        <div class="imagemPerfil">
            <img src="/img/elephant.png">
        </div>
        <div class="dados">
            <div class="info-dados">
                <?php if(!isset($user)): ?>
                    <span class="mensagem-erro"><?= $_SESSION['error_message']; ?></span>
                <?php endif; ?>
                <p>Nome do Usuário: <?= isset($user[0]['name']) ? $user[0]['name'] : ''; ?></p>
                <p>Email do Usuário: <?= isset($user[0]['email']) ? $user[0]['email'] : ''; ?></p>
            </div>
            <div class="delete">
                <a href="./logout">
                    <img src="/img/exit-outline.svg">
                </a>
                <a href="./delete?email=<?= $user[0]['email'];?>">
                    <img src="/img/trash-outline.svg">
                </a>
            </div>
        </div>
    </div>


<?php require_once __DIR__."/layout/final.php"; ?>