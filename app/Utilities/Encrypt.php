<?php
namespace App\Utilities;
use Log;

class Encrypt{

    public static function EncryptWithOpenssl($sourcestr)  
    {
        $key_content = file_get_contents(Config('openssl.public_key'));  
        $pubkeyid    = openssl_get_publickey($key_content);  
          
        if (openssl_public_encrypt($sourcestr, $crypttext, $pubkeyid))  
        {
            return base64_encode("".$crypttext);  
        }
    }
 
    public static function DecryptWithOpenssl($crypttext)  
    {
        $key_content = file_get_contents(Config('openssl.private_key')); 
        $prikeyid    = openssl_pkey_get_private($key_content);
        $crypttext   = base64_decode($crypttext);
        if (openssl_private_decrypt($crypttext, $sourcestr, $prikeyid, OPENSSL_PKCS1_PADDING))  
        {
            return '' . $sourcestr;  
        }else{
            while ($msg = openssl_error_string()){
                Log::info($msg);
            }
            throw new \Exception("crypt failure");
        }
    }

    public static function test(){
        $key_content = file_get_contents('../../resources/encrypt/public_20180212.key');  
        $pubkeyid    = openssl_get_publickey($key_content);  
        $crypttext = '';
        openssl_public_encrypt('123', $crypttext, $pubkeyid);
        echo str_replace('+', '%2B', urldecode($crypttext)) . PHP_EOL;
        //$crypttext = urlencode($crypttext);
        //$crypttext = str_replace('%2B', '+', 'hhuFnieWsZddhs5gUMl6BSoosAdhGjLiqiCex74%2BWzQhI1Jn2n3j0Pe0h5hjsSeeFam9UMNduOnsasNuvx%2BICMjHVT8EuKtjBxwD0e8OySIpUoJpmus4LyZ6hgZhuvMjHGkFM/fWjYNmSbTbKv6RYPUMkvr8e3Pueq7jZSvUQnU=');

        //$crypttext = base64_decode($crypttext);
        //print_r($crypttext);
        //$crypttext = base64_decode($crypttext);
        //echo PHP_EOL;
        $key = file_get_contents('../../resources/encrypt/private_20180212.key');
        $prikeyid = openssl_pkey_get_private($key);
        openssl_private_decrypt($crypttext, $sourcestr, $prikeyid);
        echo $sourcestr;
        echo PHP_EOL;
        //while ($msg = openssl_error_string())
        //    echo $msg . "<br />\n";
    }

}
/**

Encrypt::test();
**/