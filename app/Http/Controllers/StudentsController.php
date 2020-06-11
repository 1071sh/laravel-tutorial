<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Student;

class StudentsController extends Controller
{
    // 一覧画面
    public function index(Request $request)
    {
        //キーワード受け取り
        $keyword = $request->input('keyword');
        //クエリ生成
        $query = \App\Student::query();
        //もしキーワードがあったら
        if (!empty($keyword)) {
            $query->where('email', 'like', '%'.$keyword.'%')->orWhere('name', 'like', '%'.$keyword.'%');
        }
        //ページネーション
        $students = $query->orderBy('id', 'desc')->paginate(10);
        return view('student.list')->with('students', $students)->with('keyword', $keyword);
    }

    // 新規登録
    public function store()
    {
        return view('student.store');
    }

    // 確認処理
    public function confirm(\App\Http\Requests\CheckStudentRequest $request)
    {
        $data = $request->all();
        return view('student.confirm')->with($data);
    }

    // 削除機能
    public function delete($id)
    {
        $user = \App\Student::find($id);
        $user->delete();
        return redirect()->to('/');
    }

    // 編集処理
    public function edit_index($id)
    {
        $student = \App\Student::findOrFail($id);
        return view('edit.index')->with('student', $student);
    }

    // 編集確認画面
    public function edit_confirm(\App\Http\Requests\CheckStudentRequest $request)
    {
        $data = $request->all();
        return view('edit.confirm')->with($data);
    }

    // 編集確認画面
    public function edit_finish(Request $request, $id)
    {
        $student = \App\Student::findOrFail($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->save();
        return redirect()->to('/');
    }

    // 送信処理
    public function finish(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->tel = $request->tel;
        $student->save();
        return redirect()->to('/');
    }
}
