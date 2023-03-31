<?php require_once __DIR__."/layout/start.php"; ?>

    <a href="./"><h1>Scuba<span>PHP</span></h1></a>
    <form action="./?page=change-password&from=change-password" method="post">
        <div class="mensagem-sucesso">
            <p>Mensagem de Sucesso</p>
        </div>
        <p>Alterar Senha</p>
        <label for="senha">Senha</label>
        <input type="password" name="person[password]">
        <span class="mensagem-erro">Mensagem de Erro</span>
        <label for="repita-senha">Repita Senha</label>
        <input type="password" name="person[password-confirm]">
        <span class="mensagem-erro">Mensagem de Erro</span>
        <input type="submit" value="Salvar">
    </form>

<?php require_once __DIR__."/layout/final.php"; ?>