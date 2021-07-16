@extends('layouts.hello')

@section('content')
<div class="contact">
  <h1>内容確認</h1>

  <form action="/contact/thanks" method="POST">
    @csrf
    <table class="contact-table">

      <tr>
        <th class="contact-item">お名前</th>
        <td class="contact-body">
          {{ $request['fullname'] }}
          <input name="fullname" value="{{ $request['fullname'] }}" type="hidden">
        </td>
      </tr>

      <tr>
        <th class="contact-item">性別</th>
        <td class="contact-body">
          @switch ($request['gender'])
          @case(1)
          男性
          @break
          @case(2)
          女性
          @break
          @endswitch
          <input name="gender" value="{{ $request['gender'] }}" type="hidden">
        </td>
      </tr>

      <tr>
        <th class="contact-item">メールアドレス</th>
        <td class="contact-body">
          {{ $request['email'] }}
          <input name="email" value="{{ $request['email'] }}" type="hidden">
        </td>
      </tr>

      <tr>
        <th class="contact-item">郵便番号</th>
        <td class="contact-body">
          {{ $request['postcode'] }}
          <input name="postcode" value="{{ $request['postcode'] }}" type="hidden">
        </td>
      </tr>

      <tr>
        <th class="contact-item">住所</th>
        <td class="contact-body">
          {{ $request['address'] }}
          <input name=" address" value="{{ $request['address'] }}" type="hidden">
        </td>
      </tr>

      <tr>
        <th class="contact-item">建物名</th>
        <td class="contact-body">
          {{ $request['building_name'] }}
          <input name="building_name" value="{{ $request['building_name'] }}" type="hidden">
        </td>
      </tr>

      <tr>
        <th class="contact-item">ご意見</th>
        <td class="contact-body">
          {{ $request['opinion'] }}
          <input name="opinion" value="{{ $request['opinion'] }}" type="hidden">
        </td>
      </tr>

    </table>

    <button class="contact-submit confirm-button" type="submit" name="action" value="submit">送信</button>
    <button class="contact-submit confirm-button fix-button" type="submit" name="action" value="back">修正する
    </button>

  </form>
</div>
@endsection