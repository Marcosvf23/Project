<?php include('header.php'); ?>

<?php
$data_nascimento = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");
$dataFormatada = DateTime::createFromFormat('Y-m-d', $data_nascimento);
$diaNascimento = $dataFormatada->format('d');
$mesNascimento = $dataFormatada->format('m');
$anoAtual = date('Y');
$signoEncontrado = null;

foreach ($signos->signo as $signo) {
    $dataInicioStr = $signo->dataInicio;
    $dataFimStr = $signo->dataFim;

    
    $inicioSigno = DateTime::createFromFormat('d/m', $dataInicioStr);
    $fimSigno = DateTime::createFromFormat('d/m', $dataFimStr);

    
    if ($inicioSigno > $fimSigno) {
        $inicioSigno->setDate($anoAtual, (int)$inicioSigno->format('m'), (int)$inicioSigno->format('d'));
        $fimSigno->setDate($anoAtual + 1, (int)$fimSigno->format('m'), (int)$fimSigno->format('d'));
    } else {
        $inicioSigno->setDate($anoAtual, (int)$inicioSigno->format('m'), (int)$inicioSigno->format('d'));
        $fimSigno->setDate($anoAtual, (int)$fimSigno->format('m'), (int)$fimSigno->format('d'));
    }

    $dataNascimentoObj = new DateTime($data_nascimento);

    if ($dataNascimentoObj >= $inicioSigno && $dataNascimentoObj <= $fimSigno) {
        $signoEncontrado = $signo;
        break; 
    }
}
?>


<body class="resultado-pagina">
    <div class="container mt-5 text-center resultado-container">
        <h2>Resultado</h2>
        <?php if ($signoEncontrado): ?>
            <h1 class="signo-nome"><?php echo $signoEncontrado->signoNome; ?></h1>
            <p><?php echo $signoEncontrado->descricao; ?></p>
        <?php else: ?>
            <p>Não foi possível determinar o seu signo.</p>
        <?php endif; ?>
        <p><a href="index.php" class="btn btn-secondary mt-3">Voltar</a></p>
    </div>
    
</body>
</html>