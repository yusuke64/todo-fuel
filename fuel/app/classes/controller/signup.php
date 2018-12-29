<?php

class Controller_Signup extends Controller
{

    public function action_index()
    {
        if(Input::method() === 'GET') {
            //return Response::forge(View::forge('auth/signup'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/signup'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }
        $name = Input::post('name');
        $user = Model_User::find('all', array(
            'where' => array(
                array('name' => $name),
            )));

        if(empty($user)){
            $val = Validation::forge();
            $val->add('name', 'Name')->add_rule('required')->add_rule('min_length',1)->add_rule('max_length',255);
            $val->add('pass', 'パスワード')->add_rule('required')->add_rule('min_length',6)->add_rule('max_length',255);
            $val->add('pass_re', 'パスワード（再入力）')->add_rule('required')->add_rule('match_field', 'pass');
            if ($val->run())
            {
                $name = Input::post('name');
                $pass = Input::post('pass');

                $user = Model_User::forge();
                $user->name = $name;
                $user->password = $pass;
                $user->created = Date::forge()->format("%Y-%m-%d %H:%M:%S");
                $user->save();

                $session = Session::instance();
                Session::set('name', $name);

                Session::set_flash('slide-msg','ユーザー登録が完了しました！');

                //return Response::redirect('todo/index');
                $view = View::forge('template/index');
                $view->set('head',View::forge('template/head'));
                $view->set('header',View::forge('template/header'));
                $view->set('contents',Response::redirect('todo/index'));
                $view->set('footer',View::forge('template/footer'));

                return $view;


            }

                $errors = $val->error();
                $error['error'] = $errors;

                //return Response::forge(View::forge('auth/signup', $error));
                $view = View::forge('template/index');
                $view->set('head',View::forge('template/head'));
                $view->set('header',View::forge('template/header'));
                $view->set('contents',View::forge('auth/signup', $error));
                $view->set('footer',View::forge('template/footer'));

                return $view;
        }else{

            $e_msg['e_msg'] = 'そのNAMEはすでに使用されています。';

            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/signup', $e_msg));
            $view->set('footer',View::forge('template/footer'));

            return $view;
        }

}

}