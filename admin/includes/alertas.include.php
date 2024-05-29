<?php

$alertas_sucesso = [
    "cadastrousuario" => "Cadastro realizado com sucesso!",
    "editarusuario" => "Perfil alterado com sucesso!",
    "editarveiculo" => "Informações alteradas com sucesso!",
    "registroveiculo" => "Registro bem sucedido!",
    "removerveiculo" => "Removido com sucesso!"
];

$alertas_falha = [
    "cadastrousuario" => "Falha ao cadastrar. Verifique as informações digitadas.",
    "falhalogin" => "Usuário ou senha inválidos.",
    "editarusuario" => "Erro, verifique as informações digitadas.",
    "editarveiculo" => "Erro, verifique as informações digitadas.",
    "registroveiculo" => "Falha ao registrar, verifique as informações novamente.",
    "removerveiculo" => "Ocorreu um erro, tente novamente."
];

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (isset($_GET['sucesso'])) { ?>

        Swal.fire({
            title: "Show!",
            text: "<?= $alertas_sucesso[$_GET['sucesso']]; ?>",
            icon: "success",
            confirmButtonColor: "#f5821f",
            color: "#fff",
            background: "#1d1c23"
        });
        // Remover os parâmetros da URL (?sucesso= ...):
        window.history.replaceState(null, '', window.location.pathname);

    <?php } ?>;

    <?php if (isset($_GET['falha'])) { ?>

        Swal.fire({
            title: "Erro!",
            text: "<?= $alertas_falha[$_GET['falha']]; ?>",
            icon: "error",
            confirmButtonColor: "#f5821f",
            color: "#fff",
            background: "#1d1c23"
        });
        // Remover os parâmetros da URL (?sucesso= ...):
        window.history.replaceState(null, '', window.location.pathname);

    <?php } ?>
</script>