<?php include('layouts/header.php'); ?>

<div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%; background-color: #ffffffcc; backdrop-filter: blur(6px);">
    <h2 class="text-center mb-4 text-primary">Informe sua data de nascimento</h2>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="row g-3">
        <div class="col-12">
            <label for="data_nascimento" class="form-label fw-semibold">Data de Nascimento:</label>
            <input type="date" class="form-control form-control-lg" id="data_nascimento" name="data_nascimento" required>
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary btn-lg w-100 mt-3 shadow-sm">Consultar Signo ✨</button>
        </div>
    </form>
</div>

</main>
</body>
</html>
