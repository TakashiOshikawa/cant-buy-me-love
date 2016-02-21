<?php


class Controller_Beatles extends Controller
{

    public function action_hello()
    {
        return \Fuel\Core\Response::forge(\Fuel\Core\View::forge('beatles/index'));
    }

    public function action_override_crypt()
    {
        $text = 'sdkjvskjndvkbgebrii';
        Debug::dump($text);

//        $encoded_text = \Fuel\Core\Crypt::encode($text);
        $encoded_text = Crypt::encode($text);
        Debug::dump($encoded_text);

//        $decode_text = \Fuel\Core\Crypt::decode($encoded_text);
        $decode_text = Crypt::decode($encoded_text);
        Debug::dump($decode_text);

        return \Fuel\Core\Response::forge(\Fuel\Core\View::forge('beatles/crypt'));
    }

}