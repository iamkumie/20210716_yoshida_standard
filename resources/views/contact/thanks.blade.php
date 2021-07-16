@extends('layouts.hello')

@section('content')
<div class="thanks-p">
  <p class="thanks-txt">{{__('ご意見いただきありがとうございました。')}}</p>
  <button class="contact-submit thanks-btn">トップページへ</button>
</div>
@endsection