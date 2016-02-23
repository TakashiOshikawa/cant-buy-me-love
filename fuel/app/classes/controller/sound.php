<?php
/**
 * Created by PhpStorm.
 * User: oshikawatakashi
 * Date: 2016/02/22
 * Time: 23:13
 */

class Controller_Sound extends Controller
{

    public function action_index()
    {
        $views['header'] = View::forge('common/header');
        $views['content'] = View::forge('sound/index', ["url" => "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/246733995&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"]);
        $views['footer'] = View::forge('common/footer');

        return \Fuel\Core\Response::forge(View::forge('common/base', $views));
//        return \Fuel\Core\Response::forge(View::forge('common/base', ["url" => "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/246733995&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"]));
    }

}