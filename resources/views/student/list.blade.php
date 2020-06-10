@extends('layouts.app')

@section('title', '一覧画面')

@section('content')
<div class="page-header">
    <h1><small>受講生一覧</small></h1>
</div>
<div class="col-sm-2">
    <a href="{{ url('store') }}" class="btn btn-warning"><i class="glyphicon glyphicon-plus"></i> 新規登録</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>名前</th>
            <th>email</th>
            <th>tel</th>
            <th>opration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->tel}}</td>
            <td>
                <a href="edit/{{$student->id}}" class="btn btn-primary btn-sm">編集</a>
            </td>
            <td>
                <form action="delete/{{$student->id}}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- page control -->
{!! $students->render() !!}

@endsection

@section('script')
<script>
    $(function(){
    $(".btn-dell").click(function(){
        if(confirm("本当に削除しますか？")){
        }else{
        return false;
        }
    });
});
</script>
@endsection