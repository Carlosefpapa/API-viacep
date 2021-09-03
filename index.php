<?php
    include_once('viacep.php');
    $address = getAddress();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <p><strong>Digite o CEP pra encontrar o endereço.</strong></p>
        <input type="text" placeholder="Digite um cep..." name="cep" value="<?php echo $address->cep; ?>">
        <button type="submit">Pesquisar</button>
        
        <?php if ( ! empty( $address->erro ) ) : ?>
            <div class="error">
                <strong><?php echo $address->erro; ?></strong>
            </div>
        <?php endif; ?>
        
        <input type="text" placeholder="Rua" name="rua" value="<?php echo $address->logradouro; ?>">
        <input type="text" placeholder="Bairro" name="bairro" value="<?php echo $address->bairro; ?>">
        <input type="text" placeholder="Cidade" name="cidade" value="<?php echo $address->localidade; ?>">
        <input type="text" placeholder="Estado" name="estado" value="<?php echo $address->uf; ?>">
    </form>
</body>
</html>