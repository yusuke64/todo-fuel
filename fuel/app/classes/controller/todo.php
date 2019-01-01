<?php
class Controller_Todo extends Controller
{
    public function action_index()
    {
        $name = Session::get('name');
        if ($name === null)
        {
            //return Response::forge(View::forge('auth/login'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/login'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }
        $todos = Model_Todo::find('all', array(
            'where' => array(
                array('name' => $name),
            )));
        $valuesOfView['todos'] = $todos;

        //return Response::forge(View::forge('todo/index', $valuesOfView));
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',View::forge('todo/index', $valuesOfView));
        $view->set('footer',View::forge('template/footer'));

        return $view;

    }

    public function action_add()
    {
        if(Input::method() === 'GET') {
            //return Response::forge(View::forge('todo/index'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('todo/index'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }
        $name = Session::get('name');
        if ($name === null)
        {
            //return Response::forge(View::forge('auth/login'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/login'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        $name = Session::get('name');
        $note = Input::post('note');

        $todo = Model_Todo::forge();
        $todo->name = $name;
        $todo->note = $note;
        $todo->created = Date::forge()->format("%Y-%m-%d %H:%M:%S");
        $todo->save();

        //return Response::redirect('todo/index');
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',Response::redirect('todo/index'));
        $view->set('footer',View::forge('template/footer'));

        return $view;

    }

    public function action_delete($todoId = null)
    {
        $name = Session::get('name');
        if ($name === null)
        {
            //return Response::forge(View::forge('auth/login'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/login'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        if ($todoId === null) {
            //return Response::redirect('todo/index');
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',Response::redirect('todo/index'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        if (Input::method() === 'GET') {
            $valuesOfView['todoId'] = $todoId;
            //return Response::forge(View::forge('todo/index', $valuesOfView));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('todo/index', $valuesOfView));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        $todo = Model_Todo::find($todoId);
        $todo->delete();

        //return Response::redirect('todo/index');
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',Response::redirect('todo/index'));
        $view->set('footer',View::forge('template/footer'));

        return $view;

    }

    public function action_done($todoId = null)
    {
        $name = Session::get('name');
        if ($name === null)
        {
            //return Response::forge(View::forge('auth/login'));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('auth/login'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        if ($todoId === null) {
            //return Response::redirect('todo/index');
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',Response::redirect('todo/index'));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        if (Input::method() === 'GET') {
            $valuesOfView['todoId'] = $todoId;
            //return Response::forge(View::forge('todo/index', $valuesOfView));
            $view = View::forge('template/index');
            $view->set('head',View::forge('template/head'));
            $view->set('header',View::forge('template/header'));
            $view->set('contents',View::forge('todo/index', $valuesOfView));
            $view->set('footer',View::forge('template/footer'));

            return $view;

        }

        $todo = Model_Todo::find($todoId);
        $todo->delete();

        Session::set_flash('slide-msg','お疲れ様でした！');

        //return Response::redirect('todo/index');
        $view = View::forge('template/index');
        $view->set('head',View::forge('template/head'));
        $view->set('header',View::forge('template/header'));
        $view->set('contents',Response::redirect('todo/index'));
        $view->set('footer',View::forge('template/footer'));

        return $view;

    }
}