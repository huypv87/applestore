<?php

// openssl asn1parse -in pkcs8.pem => biết được thuật toán là ec chứ ko phải RSA
// openssl ec -in AuthKey_BDSUV4D6UQ.p8 -pubout -out AuthKey_BDSUV4D6UQ.pub => Lấy được public key, khớp với public key lấy bằng code PHP này

// Private key as string
$pem_private_key = file_get_contents('AuthKey_BDSUV4D6UQ.p8');

$private_key = openssl_pkey_get_private($pem_private_key);

// Public key as PEM string
$pem_public_key = openssl_pkey_get_details($private_key)['key'];
echo $pem_public_key;



/*
Sinh file p8 giống Apple
openssl ecparam -name prime256v1 -genkey -noout -out huypvsameapple.p8



Còn thường gặp là dùng thuật toán RSA
Sinh file -----BEGIN PRIVATE KEY-----
openssl genpkey -algorithm RSA -out pkcs8.pem -pkeyopt rsa_keygen_bits:2048
=> lấy public key: openssl rsa -pubout -in pkcs8.pem -out a.pub
=> chuyển sang pkcs1 (-----BEGIN RSA PRIVATE KEY-----): openssl rsa -in pkcs8.pem -out pkcs1.pem
*/