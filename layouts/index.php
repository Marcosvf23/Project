<!DOCTYPE html>
<html lang="pt-br">
<?php include('header.php'); ?>
<body>
<div class="container mt-5 text-center formulario-container">
    <h1>Descubra o seu Signo!</h1>
    <p class="lead">Informe sua data de nascimento para saber qual é o seu signo do zodíaco.</p>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required placeholder="Ex.: 21/05/1992">
        </div>
        <button type="submit" class="btn btn-primary">Descobrir Signo</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>