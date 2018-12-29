<?php
class Controller_Login extends Controller
{
    public function action_index()
    {
        if(Input::method() === 'GET') {

            //return Response::forge(View::forge('auth/login'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/login'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        $name = Input::post('name');

        $user = Model_User::find('all', array(
            'where' => array(
                array('name' => $name),
            )));

        if(!empty($user)){
            foreach($user as $val){
                $pass = $val->password;
            }

            $val = Validation::forge();
            $val->add('name', 'Name')->add_rule('required');
            $val->add('pass', 'パスワード')->add_rule('required')->add_rule('match_value', $pass);

            if ($val->run())
            {

                $session = Session::instance();
                Session::set('name', $name);

                Session::set_flash('slide-msg','ログインしました！');

                //return Response::redirect('todo/index');
                $view = View::forge('template/index');
                $view->set('head',View::forge('template/head'));
                $view->set('header',View::forge('template/header'));
                $view->set('contents',Response::redirect('todo/index'));
                $view->set('footer',View::forge('template/footer'));

                return $view;

            }else{

                $errors = $val->error();
                $error['error'] = $errors;

                //return Response::forge(View::forge('auth/login', $error));
                $view = View::forge('template/index');
                $view->set('head',View::forge('template/head'));
                $view->set('header',View::forge('template/header'));
                $view->set('contents',View::forge('auth/login', $error));
                $view->set('footer',View::forge('template/footer'));
                return $view;


            }
        }else{
        //return Response::forge(View::forge('auth/login'));

        $e_msg['e_msg'] = '入力内容が間違っています。';
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',View::forge('auth/login', $e_msg));
        $view->set('footer',View::forge('template/footer'));

        return $view;
        }

    }
}
