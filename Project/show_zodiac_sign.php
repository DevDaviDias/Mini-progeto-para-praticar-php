<?php include('layouts/header.php'); ?>

<?php
if (isset($_POST['data_nascimento'])) {
    $data_nascimento = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");

    $partes = explode('-', $data_nascimento);
    $dia = (int)$partes[2];
    $mes = (int)$partes[1];

    $signo_encontrado = null;

    foreach ($signos->signo as $signo) {
        list($diaInicio, $mesInicio) = explode('/', $signo->dataInicio);
        list($diaFim, $mesFim) = explode('/', $signo->dataFim);

        $diaInicio = (int)$diaInicio;
        $mesInicio = (int)$mesInicio;
        $diaFim = (int)$diaFim;
        $mesFim = (int)$mesFim;

        if (($mesInicio == 12 && $mesFim == 1)) {
            if (($mes == 12 && $dia >= $diaInicio) || ($mes == 1 && $dia <= $diaFim)) {
                $signo_encontrado = $signo;
                break;
            }
        } else {
            if (
                ($mes == $mesInicio && $dia >= $diaInicio) ||
                ($mes == $mesFim && $dia <= $diaFim) ||
                ($mes > $mesInicio && $mes < $mesFim)
            ) {
                $signo_encontrado = $signo;
                break;
            }
        }
    }

    if ($signo_encontrado) {
        echo "
        <div class='card shadow-lg p-4 text-center mt-5' style='max-width: 600px; background-color: #ffffffcc; backdrop-filter: blur(5px);'>
            <h2 class='text-primary fw-bold mb-3'>✨ Seu Signo é: {$signo_encontrado->signoNome} ✨</h2>
            <p class='fs-5'>{$signo_encontrado->descricao}</p>
        </div>
        ";
    } else {
        echo "<p class='text-center text-danger mt-4'>Não foi possível identificar seu signo.</p>";
    }
} else {
    echo "<p class='text-center text-danger mt-4'>Data de nascimento não informada.</p>";
}
?>

<div class="text-center mt-4">
    <a href='index.php' class='btn btn-outline-light px-4 py-2 shadow-sm'>← Voltar</a>
</div>

</main>
</body>
</html>
