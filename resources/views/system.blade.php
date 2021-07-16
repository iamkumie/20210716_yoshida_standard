@extends('layouts.hello')

@section('content')
<div class="system">
  <h1>管理システム</h1>

  <form action="/" method="get" class="search-form">
    @csrf

    <div class="system-set">
      <label class="name-title">お名前</label>
      <input type="text" name="fullname" value="{{$fullname ?? ''}}">
      <label class="gender-title">性別</label>
      <label class="contact-sex">
        <input type="radio" value="0" @if($gender=="" ) checked @endif name="gender" checked><span class="contact-sex-txt">全て</span>
      </label>
      <label class="contact-sex">
        <input type="radio" value="1" @if($gender=="1" ) checked @endif name="gender">
        <span class="contact-sex-txt">男性</span>
      </label>
      <label class="contact-sex">
        <input type="radio" value="2" @if($gender=="2" ) checked @endif name="gender">
        <span class="contact-sex-txt">女性</span>
      </label>
    </div>

    <div class="system-date">
      <label class="date-title">登録日</label>
      <input type="date" name="created_at_from" value="{{$created_at_from ?? ''}}">
      <span>~</span>
      <input type="date" name="created_at_to" value="{{$created_at_to ?? ''}}">
    </div>

    <div class="system-email">
      <label class="email-title">メールアドレス</label>
      <input type="text" name="email" value="{{$email ?? ''}}">
    </div>


    <button class="contact-submit" type="submit">検索</button>
    <a href="/" class="reset-link">リセット</a>
  </form>

  <div class="page-info-set">
    @if (count($items) >0)
    全{{ $items->total() }}件中
    {{ ($items->currentPage() -1) * $items->perPage() + 1}} -
    {{ (($items->currentPage() -1) * $items->perPage() + 1) + (count($items) -1)  }}件
    @else
    データがありません
    @endif
    {{$items->appends(request()->query())->links()}}
  </div>


  <table>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th></th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->fullname}}</td>
      <td>{{$item->gender}}</td>
      <td>{{$item->email}}</td>
      <td class="opinion-change">
        <div class="opinion-normal">{{Str::limit($item->opinion, 50, '...')}}</div>
        <div class="opinion-hover">{{$item->opinion}}</div>
      </td>
      @include('delete')
    </tr>
    @endforeach
  </table>
</div>
@endsection