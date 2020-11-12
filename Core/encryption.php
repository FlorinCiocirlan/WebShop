<?php

    function encrypt($string){
        $method = "AES-128-CBC";
        $iv_length = openssl_cipher_iv_length($method);
        $options = 0;
        $encryption_iv = "1234567890111212";
        $key = "webshop";
        return openssl_encrypt($string , $method,$key,$options,$encryption_iv);
    }
    function decrypt($encrypted){
        $method = "AES-128-CBC";
        $iv_length = openssl_cipher_iv_length($method);
        $options = 0;
        $encryption_iv = "123456789011121";
        $key = "webshop";
        return openssl_decrypt($encrypted , $method,$key,$options,$encryption_iv);
    }
