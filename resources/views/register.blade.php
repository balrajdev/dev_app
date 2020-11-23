<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{URL::asset('css/custom.css') }}">
 <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-material-design.min.css') }}" >
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrapValidator.min.css') }}">
<title>DEV APP</title>

</head>
<body>
<div class="page-wrapper">
    <aside class="register-box mx-auto" style="width: 260px">
        <div class="container-fluid">
            <div class="row">
                
                <aside class="col-md-12">

                @if(session('responce'))
                <div class="alert alert-success">
                <strong>
                 @if(session('responce')=='register_success')

               Your registration has been successful.

                @endif
                </strong>
                </div>
                @endif


                @if ($errors->any())
                
                <div class="alert alert-danger">
                
                @if ($errors->has('email'))
                <div class="error">The email has already been taken.</div>
                @endif

          
                </div>
                @endif
                <aside class="sub-logo"><a href="#">DevAPP</a></aside>
                    <form id="registerform" method="POST" action="{{ url('/register/create')}}" enctype="multipart/form-data" >
                        {{ csrf_field() }}



                       <div class="form-group">
                            <label for="username" class="bmd-label-floating">Username</label>
                            <input type="text" name="username" class="form-control" id="username" required value="{{ old('username') }}" />
                          </div>

                          <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required value="{{ old('email') }}"  />
                          </div>
                          
                          <div class="form-group">
                            <label for="password" class="bmd-label-floating">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required value="{{ old('password') }}"  />
                          </div>
                          
                            <button type="submit" class="btn btn-primary btn-raised">Submit</button>
                        </form>
<p>You Already Have An Account</p>
<a href="/" class="sign-in">Signin</a>
                    </aside>
            </div>
        </div>       
    </aside>
</div>

<script src="{{URL::asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"  ></script>
 <script src="{{URL::asset('js/popper.js') }}" type="text/javascript" ></script>
 <script src="{{URL::asset('js/bootstrap-material-design.js') }}" type="text/javascript"  ></script>
 <script src="{{URL::asset('js/bootstrapValidator.min.js') }}" type="text/javascript" ></script>

<script type="text/javascript">
$(document).ready(function() {
 $('body').bootstrapMaterialDesign(); 

$('#registerform').bootstrapValidator({
        fields: {
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Username is required'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    }
                }
            },

        }
    });

});
</script>
</body>
</html>
