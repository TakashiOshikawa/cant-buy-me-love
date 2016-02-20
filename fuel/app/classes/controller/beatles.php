<?php


class Controller_Beatles extends Controller
{

    public function action_hello()
    {
        return \Fuel\Core\Response::forge(\Fuel\Core\View::forge('beatles/index'));
    }

    public function action_override_crypt()
    {
        return \Fuel\Core\Response::forge(\Fuel\Core\View::forge('beatles/crypt'));
    }

}