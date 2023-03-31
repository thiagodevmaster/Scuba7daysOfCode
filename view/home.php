<?php require_once __DIR__."/layout/start.php"; ?>

    <div class="mensagem-sucesso">
        <p>Mensagem de Sucesso</p>
    </div>
    <h1>Scuba<span>PHP</span></h1>

    <div class="info">
        <div class="imagemPerfil">
            <img src="./resource/elephant.png">
        </div>
        <div class="dados">
            <div class="info-dados">
                <span class="mensagem-erro">Mensagem de Erro</span>
                <p>Nome do Usuário:{{field_name}}</p>
                <p>Email do Usuário:{{field_email}}</p>
            </div>
            <div class="delete">
                <a href="./?page=logout&from=home">
                    <img src="./resource/exit-outline.svg">
                </a>
                <a href="./?page=delete-account&from=home">
                    <img src="./resource/trash-outline.svg">
                </a>
            </div>
        </div>
    </div>


<?php require_once __DIR__."/layout/final.php"; ?>