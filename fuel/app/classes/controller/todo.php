<?php
class Controller_Todo extends Controller
{
    public function action_index()
    {
        // todos テーブルに格納した 3 つのテストデータを取得
        $todos = Model_Todo::find('all');
        $valuesOfView['todos'] = $todos;

        return Response::forge(View::forge('todo/index', $valuesOfView));
    }

    public function action_add()
    {
        if (Input::method() === 'GET') {
            return Response::forge(View::forge('todo/add'));
        }

        $note= Input::post('note');

        $todo = Model_Todo::forge();
        $todo->note = $note;
        $todo->created = Date::forge()->format("%Y-%m-%d %H:%M:%S");
        $todo->updated = Date::forge()->format("%Y-%m-%d %H:%M:%S");
        $todo->save();

        return Response::redirect('todo/index');
    }

    public function action_update($todoId = null)
    {
        if ($todoId === null) {
            return Response::redirect('todo/index');
        }

        if (Input::method() === 'GET') {
            $valuesOfView['todoId'] = $todoId;
            return Response::forge(View::forge('todo/update', $valuesOfView));
        }

        $note= Input::post('note');

        $todo = Model_Todo::find($todoId);
        $todo->note = $note;
        $todo->updated = Date::forge()->format("%Y-%m-%d %H:%M:%S");
        $todo->save();

        return Response::redirect('todo/index');
    }

    public function action_delete($todoId = null)
    {
        if ($todoId === null) {
            return Response::redirect('todo/index');
        }

        if (Input::method() === 'GET') {
            $valuesOfView['todoId'] = $todoId;
            return Response::forge(View::forge('todo/delete', $valuesOfView));
        }

        $note= Input::post('note');

        $todo = Model_Todo::find($todoId);
        $todo->delete();

        return Response::redirect('todo/index');
    }
}