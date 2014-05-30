@extends('layouts.default')

@section('head')
<style type="text/css">
  body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #eee;
  }

  .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin .checkbox {
    font-weight: normal;
  }
  .form-signin .form-control {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
  }
  .form-signin .form-control:focus {
    z-index: 2;
  }
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
</style>
@stop

@section('body')
<div class="container">
  <form action="/user" method="post" class="form-signin" role="form">
    <h2 class="form-signin-heading">Register</h2>
    <div id="username-group" class="input-group">
      <input id="username" type="text" name="username" class="form-control" placeholder="Username" required autofocus>
      <span class="input-group-addon" id="username-addon"></span>
    </div>
    <span id="username-help-block" class="help-block"></span>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
  </form>
</div> <!-- /container -->
@stop


@section('script')
<script type="text/javascript">
  $('#username').focusout(function() {
    // start a spinner in the username field
    // until I get a reponse from /a/user/username
    $('#username-addon').html('<i class="fa fa-spinner fa-spin"></i>');
    var username = $('#username').val();
    $.post("/a/username", { username: username }, function(data) {
      if(data == "available")
      {
        $('#username-addon').html('<i class="fa fa-check"></i>');
        $('#username-group').removeClass('has-error');
        $('#username-group').addClass('has-success');
      } else {
        $('#username-addon').html('<i class="fa fa-ban"></i>');
        $('#username-group').addClass('has-error');
        $('#username-group').removeClass('has-');
      }
    });
  });
</script>
@stop
