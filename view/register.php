<?php require_once __DIR__."/layout/start.php"; ?>

    <a href="./?page=login"><h1>Scuba<span>PHP</span></h1></a>

    <form action="/register" method="POST">
        <p>Cadastre Um Novo Usuário</p>
        <div class="mensagem-sucesso">
            <p>Mensagem de Sucesso</p>
        </div>
        <label for="nome">Nome</label>
        <input type="text" name="name" required>
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->

        <label for="email">E-mail</label>
        <input type="email" name="email" required>
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->

        <label for="senha">Senha</label>
        <input type="password" name="password" required>
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->

        <label for="repita-senha">Repita Senha</label>
        <input type="password" name="password-confirm" required>
        <!-- <span class="mensagem-erro">Mensagem de Erro</span> -->

        <input type="submit" value="Salvar">

    </form>

<?php require_once __DIR__."/layout/final.php"; ?>
