@extends('layouts.app')

@section('title', '一覧画面')

@section('form');
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="text" name="keyword" value="{{$keyword}}" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
@endsection

@section('content')
<div class="page-header">
    <h1><small>受講生一覧</small><a href="{{ url('store') }}" class="btn btn-warning float-right btn-lg">
            <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>新規登録</a></h1>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>電話番号</th>
            <th>操作</th>
            <th>&nbsp;</th>
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
                <a href="edit/{{$student->id}}" class="btn btn-primary btn-sm">
                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                    </svg>編集</a>
            </td>
            <td>
                <form action="delete/{{$student->id}}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm btn-dell">
                        <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                        </svg>削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- {{ $students->links() }} --}}
{!! $students->appends(['keyword'=>$keyword])->render() !!}
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