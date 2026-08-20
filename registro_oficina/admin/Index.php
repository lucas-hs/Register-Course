<?php 
require_once __DIR__ . "/../connection/Conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $categoria       = mysqli_real_escape_string($conn, $_POST['categoria'] ?? '');
    $localizacao     = mysqli_real_escape_string($conn, $_POST['localizacao'] ?? '');
    $andar           = mysqli_real_escape_string($conn, $_POST['andar'] ?? ''); 
    $descricao       = mysqli_real_escape_string($conn, $_POST['descricao'] ?? '');
    $nome_oficina    = mysqli_real_escape_string($conn, $_POST['nome_oficina'] ?? '');
    $indicacao_idade = mysqli_real_escape_string($conn, $_POST['indicacao_idade'] ?? '');
    $capacidade      = mysqli_real_escape_string($conn, $_POST['capacidade'] ?? '');
    $ordem_chegada   = mysqli_real_escape_string($conn, $_POST['ordem_chegada'] ?? '');
    $hora_inicio     = mysqli_real_escape_string($conn, $_POST['hora_inicio'] ?? '');
    $hora_inicio2    = mysqli_real_escape_string($conn, $_POST['hora_inicio2'] ?? '');
    $hora_inicio3    = mysqli_real_escape_string($conn, $_POST['hora_inicio3'] ?? '');
    $hora_fim        = mysqli_real_escape_string($conn, $_POST['hora_fim'] ?? '');
    $hora_fim2       = mysqli_real_escape_string($conn, $_POST['hora_fim2'] ?? '');
    $hora_fim3       = mysqli_real_escape_string($conn, $_POST['hora_fim3'] ?? '');
    $token_oficina   = mysqli_real_escape_string($conn, $_POST['token_oficina'] ?? '');

    $sql = "INSERT INTO oficina VALUES (
        0, 
        '$categoria', 
        '$localizacao', 
        '$andar', 
        '$descricao', 
        '$nome_oficina', 
        '$indicacao_idade', 
        '$capacidade', 
        '$ordem_chegada', 
        NOW(), 
        '$hora_inicio', 
        '$hora_inicio2', 
        '$hora_inicio3', 
        '$hora_fim', 
        '$hora_fim2', 
        '$hora_fim3', 
        '$token_oficina'
    )";

    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "<div class='alert alert-danger m-3'>Erro ao cadastrar: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <main class="main-content">
        <div class="register-title">
            <h1 class="title">
                Registro Oficina
            </h1>
        </div>
        <form action="" method="post" class="forms">
            <div class="row">
                <div class="col-12">
                    <label for="nome">Nome da Oficina</label>
                    <input type="text" name="nome_oficina" id="nome_oficina" class="form-control" maxlength="60">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="categoria">Categoria</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" maxlength="100">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="localizacao">Localização</label>
                    <input type="text" name="localizacao" id="localizacao" class="form-control" maxlength="60">
                </div>
                <div class="col-6">
                    <label for="token_oficina">Token [QR]</label>
                    <input type="text" name="token_oficina" id="token_oficina" class="form-control" maxlength="20">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="andar">Andar</label>
                    <input type="text" name="andar" id="andar" class="form-control">
                </div>
                <div class="col-6">
                    <label for="indicacao_idade">Indicação de Idade</label>
                    <input type="text" name="indicacao_idade" id="indicacao_idade" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="capacidade">Capacidade</label>
                    <input type="text" name="capacidade" id="capacidade" class="form-control">
                </div>
                <div class="col-6">
                    <label for="ordem_chegada">Ordem de Chegada</label>
                    <select name="ordem_chegada" id="ordem_chegada" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="hora_inicio">1 Período - Inicio</label>
                    <input type="text" name="hora_inicio" id="hora_inicio" class="form-control">
                </div>
                <div class="col-4">
                    <label for="hora_inicio2">2 Período - Inicio</label>
                    <input type="text" name="hora_inicio2" id="hora_inicio2" class="form-control">
                </div>
                <div class="col-4">
                    <label for="hora_inicio3">3 Período - Inicio</label>
                    <input type="text" name="hora_inicio3" id="hora_inicio3" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="hora_fim">1 Período - Fim</label>
                    <input type="text" name="hora_fim" id="hora_fim" class="form-control">
                </div>
                <div class="col-4">
                    <label for="hora_fim2">2 Período - Fim</label>
                    <input type="text" name="hora_fim2" id="hora_fim2" class="form-control">
                </div>
                <div class="col-4">
                    <label for="hora_fim3">3 Período - Fim</label>
                    <input type="text" name="hora_fim3" id="hora_fim3" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="descricao">Descrição</label>
                    <textarea name="descricao" id="descricao" placeholder="Preencha com a descrição.." class="form-control"></textarea>
                </div>
            </div>
            <div class="row d-flex justify-content-end pt-3">
                <div class="btn-container">
                    <input type="submit" value="Enviar" class="btn btn-primary text-uppercase">
                </div>
            </div>
        </form>
    </main>
</body>
</html>
