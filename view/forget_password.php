<?php require_once __DIR__."/layout/start.php"; ?>

    <a href="./"><h1>Scuba<span>PHP</span></h1></a>
    <form action="./?page=forget-password&from=forget-password" method="post">
        <p>Alterar Senha</p>
        <!-- <div class="mensagem-sucesso">
            <p>Mensagem de Sucesso</p>
        </div> -->
        <label for="email">E-mail</label>
        <input type="email" required name="person[email]">
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->
        <input type="submit" value="Solicitar">

    </form>

<?php require_once __DIR__."/layout/final.php"; ?>