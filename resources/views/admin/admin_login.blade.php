<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Webhr Admin_Login</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{asset('css/backend_css/bootstrap-responsive.min.css') }} " />
        <link rel="stylesheet" href="{{asset('css/backend_css/matrix-login.css') }}" />
        <link href="{{asset('fonts/backend_fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">   
                 
            <form id="loginform" method="POST" class="form-vertical" action="login">
                 @csrf
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="email" id="email" placeholder="Email"  />
                        </div>
                    </div>
                </div>
                @error('email')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror 
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input id="password" type="password" name="password" placeholder="Password"  />
                        </div>
                    </div>
                </div>
                @error('password')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><button type="submit" class="btn btn-success"> Login</button></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        <div class="alert alert-success alert-block" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong class="success-msg"></strong>
                </div>
        
        <script src="{{asset('js/backend_js/jquery.min.js') }}"></script>  
        <script src="{{asset('js/backend_js/matrix.login.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 


       <script type="text/javascript">
        $(document).ready(function() {
            $(".loginform").click(function(e){
                e.preventDefault();

                var _token = $("input[name='_token']").val();
                var email = $("#email").val();
                var pswd = $("#password").val();
                

                $.ajax({
                    url: "{{ route('login') }}",
                    type:'POST',
                    data: {_token:_token, email:email, pswd:passwword},
                    success: function(data) {
                      printMsg(data);
                    }
                });
            }); 

            function printMsg (msg) {
              if($.isEmptyObject(msg.error)){
                  console.log(msg.success);
                  $('.alert-block').css('display','block').append('<strong>'+msg.success+'</strong>');
              }else{
                $.each( msg.error, function( key, value ) {
                  $('.'+key+'_err').text(value);
                });
              }
            }
        });
    </script>
    </body>

</html>
