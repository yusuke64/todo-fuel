<?php
class Controller_Logout extends Controller
{
    public function action_index()
    {
        Session::destroy();

        Session::set_flash('slide-msg', 'ログアウトしました！');

        //return Response::forge(View::forge('auth/login'));
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',View::forge('auth/login'));
        $view->set('footer',View::forge('template/footer'));

        return $view;


    }
}