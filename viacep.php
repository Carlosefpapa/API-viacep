<?php

function getAddress () {
    $cep = isset( $_POST['cep'] ) ? $_POST['cep'] : null;
    $address = addressEmpty();

    if ( $cep !== null ) {
        if (isCep($cep)) {
            // busca o endereço
            $address = getAddressViacep($cep);
        } else {
            // informa um erro quando um valor que não é um CEP for informado
            $address->erro = 'Formato inválido de CEP';
        }
    }
    $address->cep = $cep;
    return $address;
}

function addressEmpty() {
    return (object) [
        'cep' => '',
        'logradouro' => '',
        'bairro' => '',
        'localidade' => '',
        'uf'=> '',
        'erro' => ''
    ];
}

function isCep (String $value):bool{
    $cep = preg_replace('/[^0-9]/', '', $value);
    return strlen( $cep ) === 8;
}

function getAddressViacep (String $cep){
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    $address = json_decode(file_get_contents($url));

    if ( ! empty( $address->erro ) ) {
        $address = addressEmpty();
        $address->erro = 'Este CEP não existe';
    }

    return $address;
}