@extends('layouts.hello')

@section('content')
<div class="contact">
  <h1>お問い合わせ</h1>

  <form action="/contact/confirm" method="POST" class="h-adr" novalidate>
    @csrf
    <table class="contact-table">

      <tr>
        <th class="contact-item">お名前<sapn class="required-mark">※</sapn>
        </th>
        <td class="contact-body">
          <input id="textbox" class="form-text" type="text" name="fullname" value="{{old('fullname')}}">
          <p class="sample-txt">例）山田太郎</p>
          <!-- エラーメッセージを表示 -->
          <div class="err_textbox error-message"></div>
          @if ($errors->has('fullname'))
          <p class="error-message">{{ $errors->first('fullname') }}</p>
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact-item">性別<span class="required-mark">※</span></th>
        <td class="contact-body contact-gender">
          <label class="contact-sex">
            <input type="radio" name="gender" value='1' {{ old('gender', '1') == '1' ? 'checked' : ''}}>
            <span class="contact-sex-txt">男性</span>
          </label>
          <label class="contact-sex">
            <input type="radio" name="gender" value='2' {{ old('gender') == '2' ? 'checked' : ''}}>
            <span class="contact-sex-txt">女性</span></label>
          <!-- エラーメッセージを表示 -->
          @if ($errors->has('gender'))
          <p class="error-message">{{ $errors->first('gender') }}</p>
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact-item">メールアドレス<span class="required-mark">※</span></th>
        <td class="contact-body">
          <input id="email" type="email" name="email" value="{{old('email')}}" class="form-text">
          <p class="sample-txt">例）test@example.com</p>
          <!-- エラーメッセージを表示 -->
          <div class="err_email error-message"></div>
          @if ($errors->has('email'))
          <p class="error-message">{{ $errors->first('email') }}</p>
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact-item">郵便番号<span class="required-mark">※</span></th>
        <td class="contact-body contact-body-postcode">
          <span class="p-country-name" style="display:none;">Japan</span>
          <span>〒</span><input type="text" name="postcode" id="postcode" value="{{old('postcode')}}" class="form-text-postcode p-postal-code">
          <p class="sample-txt">例）〒123-4567</p>
          <!-- エラーメッセージ表示 -->
          <div class="err_postcode error-message"></div>
          @if ($errors->has('postcode'))
          <p class=" error-message">{{ $errors->first('postcode') }}</p>
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact-item">住所<span class="required-mark">※</span></th>
        <td class="contact-body">
          <input type="text" name="address" value="{{old('address')}}" id="address" class="form-text p-region p-locality p-street-address p-extended-address">
          <p class="sample-txt">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          <!-- エラーメッセージ表示 -->
          <div class="err_address error-message"></div>
          @if ($errors->has('address'))
          <p class="error-message">{{ $errors->first('address') }}</p>
          @endif
        </td>
      </tr>

      <tr>
        <th class="contact-item">建物名</th>
        <td class="contact-body">
          <input type="text" name="building_name" value="{{old('building_name')}}" id="building" class="form-text">
          <p class="sample-txt">例）千駄ヶ谷マンション101</p>
        </td>
      </tr>

      <tr>
        <th class="contact-item contact-item-title">ご意見<span class="required-mark">※</span></th>
        <td class="contact-body">
          <textarea id="opinion" name="opinion" cols="30" rows="10" class="form-textarea">{{old('opinion')}}</textarea>
          <!-- エラーメッセージ表示 -->
          <div class="err_opinion error-message"></div>
          @if ($errors->has('opinion'))
          <p class="error-message">{{ $errors->first('opinion') }}</p>
          @endif
        </td>
      </tr>

    </table>

    <button class="contact-submit" type="submit">確認</button>
  </form>
</div>
@endsection