@extends('layouts.app')

@section('title', '確認画面')

@section('content')
<form action="" method="post" class="form-horizontal">
    {{ csrf_field() }}
    <input type="hidden" name="name" value="{{$name}}">
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="tel" value="{{$tel}}">
    <table class="table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$name}}</td>
                <td>{{$email}}</td>
                <td>{{$tel}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-offset-4 col-sm-8">
            <input type="submit" name="button1" value="登録" class="btn btn-primary btn-wide" />
        </div>
    </div>
</form>
@endsection