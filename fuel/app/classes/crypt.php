<?php
/**
 * Created by PhpStorm.
 * User: oshikawatakashi
 * Date: 2016/02/21
 * Time: 12:39
 */

class Crypt extends \Fuel\Core\Crypt
{

    public static function ee($str)
    {
        echo $str . "\n";
    }

    public static function short_encrypt($raw_text)
    {

        $config = Config::get('crypt');
        $key = $config['crypto_key'];

        // 暗号化モジュール使用開始
        $resource = mcrypt_module_open('tripledes', '', 'ecb', '');

        $key = substr($key, 0, mcrypt_enc_get_key_size($resource));
        $iv  = mcrypt_create_iv(mcrypt_enc_get_iv_size($resource), MCRYPT_RAND);

        // 暗号化モジュール初期化
        if (mcrypt_generic_init($resource, $key, $iv) < 0) {
            exit('error.');
        }

        // データを暗号化
        $crypted_password = base64_encode(mcrypt_generic($resource, $raw_text));

        // 暗号化モジュール使用終了
        mcrypt_generic_deinit($resource);
        mcrypt_module_close($resource);

        return $crypted_password;
    }


    public static function simple_encrypt($text)
    {
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_TRIPLEDES, 'H70-IEv6cygMtK4FLcKqcdN4', $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    public static function simple_decrypt($text)
    {
        return trim(mcrypt_decrypt(MCRYPT_TRIPLEDES, 'H70-IEv6cygMtK4FLcKqcdN4', base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_TRIPLEDES, MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    public static function official_crypt($text)
    {
        $config = Config::get('crypt');

        /* キーを作成します */
        $key = $config['crypto_key'];

        /* 暗号モジュールをオープンします */
        $td = mcrypt_module_open('tripledes', '', 'ecb', '');

        /* IV を作成し、キー長を定義します。Windows では、かわりに
         * MCRYPT_RAND を使用します */
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_DEV_RANDOM);
        $ks = mcrypt_enc_get_key_size($td);

        /* 暗号化処理を初期化します */
        mcrypt_generic_init($td, $key, $iv);

        /* データを暗号化します */
        $encrypted = mcrypt_generic($td, $text);

        /* 暗号化ハンドラを終了します */
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return base64_encode($encrypted); // encrypt decryptはここでreturnしないでメソッドを分けること

        /* 復号用の暗号モジュールを初期化します */
        mcrypt_generic_init($td, $key, $iv);

        /* 暗号化された文字列を復号します */
        $decrypted = mdecrypt_generic($td, $encrypted);

        /* 復号ハンドルを終了し、モジュールを閉じます */
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);

        /* 文字列を表示します */
        echo trim($decrypted) . "\n";
    }

}