<?php


class Controller_Beatles extends Controller
{

    public function action_hello()
    {
        return \Fuel\Core\Response::forge(\Fuel\Core\View::forge('beatles/index'));
    }

    public function action_override_crypt()
    {

        $text = 'takashioshikawa|thisis4premierleagueteam|' . time();
        Debug::dump($text);

        $encoded_text = Crypt::encode($text);
        Debug::dump($encoded_text);
        Debug::dump( "hey\n" . self::custom_short_encrypt($encoded_text) );

        $decode_text = Crypt::decode($encoded_text);
        Debug::dump($decode_text);
        Debug::dump( "hey\n" . self::custom_short_decrypt(self::custom_short_encrypt($encoded_text)) );


        Debug::dump( self::short_encrypt($text) );

        Debug::dump( "short_encrypt\n" . Crypt::short_encrypt($text) );

        Debug::dump( "simple_encrypt\n" . Crypt::simple_encrypt($text));

        Debug::dump( "simple_decrypt\n" . Crypt::simple_decrypt(Crypt::simple_encrypt($text)));

        Debug::dump( urlencode(Crypt::official_crypt($text)) );


        return \Fuel\Core\Response::forge(\Fuel\Core\View::forge('beatles/crypt'));
    }

    // 短いけど可逆かわからない
    public static function short_encrypt($data, $algo = 'CRC32')
    {
//        return strtr(rtrim(base64_encode(pack('H*', sprintf('%u', $algo($data)))), '='), '+/', '-_');
        return base64_encode(pack('H*', sprintf('%u', $algo($data))));
    }

    public static function custom_short_encrypt($encoded_text)
    {

        // unpackはarrayで帰ってくる
        // base64_encode(pack('H*', bin2hex("adksakas")));
        // hex2bin(unpack('H*', pack('H*', bin2hex("asdrersd")))[1]);

        return base64_encode( pack('H*', bin2hex($encoded_text)) );
    }

    public static function custom_short_decrypt($decode_text)
    {
        return hex2bin(unpack('H*', base64_decode($decode_text))[1]);
    }


}