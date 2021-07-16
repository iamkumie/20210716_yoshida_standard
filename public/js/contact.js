$(function(){
  //全角→半角メソッド
  function toHalfWidth(input) {
    return input.replace(/[！-～]/g,
      function(input){
        return String.fromCharCode(input.charCodeAt(0)-0xFEE0);
      }).replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-');
  };

  //半角指定の項目は自動で半角変換
  $('#postcode').on('blur',function(e){
    $(this).val(toHalfWidth($(this).val()));
  });

  $('#address').on('blur',function(e){
    $(this).val(toHalfWidth($(this).val()));
  });

  $('#building').on('blur',function(e){
    $(this).val(toHalfWidth($(this).val()));
  });
})

  // before push the button name
  $(function () {
    $("#textbox").bind("blur", function () {
      var _textbox = $(this).val();
      check_textbox(_textbox);
    });
  });

  function check_textbox(str) {
    $(".err_textbox p").remove();
    var _result = true;
    var _textbox = $.trim(str);

    if (_textbox.match(/^[ 　\r\n\t]*$/)) {
      $(".err_textbox").append("<p>お名前を入力してください</p>");
      _result = false;
    } else if (_textbox.length > 255) {
      $(".err_textbox").append("<p>お名前は255文字以内で入力してください</p>");
      _result = false;
    }
    return _result;
  }


    // before push the button email
  $(function () {
    $("#email").bind("blur", function () {
      var _email = $(this).val();
      check_email(_email);
    });
  });

  function check_email(str) {
    $(".err_email p").remove();
    var _result = true;
    var _email = $.trim(str);

    if (_email.match(/^[ 　\r\n\t]*$/)) {
      $(".err_email").append("<p>メールアドレスを入力してください</p>");
      _result = false;
    } else if (!_email.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)) {
      $(".err_email").append("<p>メールアドレスの形式にしてください</p>");
      _result = false;
    } else if (_email.length > 255) {
      $(".err_email").append("<p>メールアドレスは255文字以内で入力してください</p>");
      _result = false;
    } 
    return _result;
  }

    // before push the button zip
  $(function () {
    $("#postcode").bind("blur", function () {
      var _postcode = $(this).val();
      check_postcode(_postcode);
    });
  });

  function check_postcode(str) {
    $(".err_postcode p").remove();
    var _result = true;
    var _postcode = $.trim(str);

    if (_postcode.match(/^[ 　\r\n\t]*$/)) {
      $(".err_postcode").append("<p>郵便番号を入力してください</p>");
      _result = false;
    } else if (!_postcode.match(/^[0-9０-９]{3}-?[0-9０-９]{4}$/)) {
      $(".err_postcode").append("<p>郵便番号はハイフンを含めた８文字で入力してください</p>");
      _result = false;
    }
    return _result;
  }


    // before push the button address
  $(function () {
    $("#address").bind("blur", function () {
      var _address = $(this).val();
      check_address(_address);
    });
  });

  function check_address(str) {
    $(".err_address p").remove();
    var _result = true;
    var _address = $.trim(str);

    if (_address.match(/^[ 　\r\n\t]*$/)) {
      $(".err_address").append("<p>住所を入力してください</p>");
      _result = false;
    } else if (_address.length > 255) {
      $(".err_email").append("<p>住所は255文字以内で入力してください</p>");
      _result = false;
    }
    return _result;
  }



  // before push the button opinion
  $(function () {
    $("#opinion").bind("blur", function () {
      var _opinion = $(this).val();
      check_opinion(_opinion);
    });
  });

  function check_opinion(str) {
    $(".err_opinion p").remove();
    var _result = true;
    var _opinion = $.trim(str);

    if (_opinion.match(/^[ 　\r\n\t]*$/)) {
      $(".err_opinion").append("<p>ご意見を入力してください</p>");
      _result = false;
    } else if (_opinion.length > 120) {
      $(".err_opinion").append("<p>ご意見は120文字以内で入力してください</p>");
      _result = false;
    }
    return _result;
  }