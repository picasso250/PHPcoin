<?php

/**
 *
 */
class Wallet
{

  static function newWallet()
  {
    //create new private and public key
    $new_key_pair = openssl_pkey_new(array(
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ));
    openssl_pkey_export($new_key_pair, $private_key_pem);

    $details = openssl_pkey_get_details($new_key_pair);
    $public_key_pem = $details['key'];
    return [$private_key_pem, $public_key_pem];
  }

}
