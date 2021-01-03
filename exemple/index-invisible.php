<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Implementação Google reCaptcha Transparente - V3</title>
</head>
<body>

<div class="container">
    <div class="my-5 w-75 mx-auto bg-light p-5 rounded">
        <div class="form_container w-100 row justify-content-center">
            <h1 class="mb-2 text-center">Verificação com google reCapatcha V3 (Transparent)</h1>
            <h2 class="mb-5 text-center">Digite seus dados abaixo:</h2>
            <form action="../src/controllerUseClassRecaptcha.php" class="main_form w-100" enctype="multipart/form-data" autocomplete="off" method="post" id="main_form">
                <div class="form-group">
                    <input type="text" class="form-control w-100 custom-radio" placeholder="Nome completo"
                           name="full_name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control w-100 custom-radio" placeholder="Melhor E-mail"
                           name="email">
                </div>
                <button type="submit" class="btn btn-success w-50 ml-auto btn-block g-recaptcha"
                        data-sitekey="YOUR_SITE_KEY"
                        data-callback='submitFormValidate'
                        data-action='submit'>Enviar formulário</button>
            </form>
        </div>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function submitFormValidate(){
        $('#main_form').submit();
    }
</script>
</body>
</html>