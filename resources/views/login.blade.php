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

    <aside class="login-box mx-auto" style="width: 260px">
        <div class="container-fluid">

            <div class="row">

                <aside class="col-md-12">

                @if(session('responce'))
                   
                 @if(session('responce')=='mismatch')
                    <div class="alert alert-danger">
                    <strong> 
                EmailID And Password Mismatch
                    </strong>
                    </div>
                 @endif

                 @if(session('responce')=='registersuccess')
                    <div class="alert alert-success">
                    <strong> 
                Your registration has been successful.
                    </strong>
                    </div>
                 @endif
                    
                    @endif

                </aside>
                
            </div>

            <div class="row">
                <aside class="col-md-12">
                    <aside class="sub-logo"><a href="#">DevAPP</a></aside>
                    <form id="loginform"  method="POST" action="{{ url('/login')}}" >

                        {{ csrf_field() }}
                          <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required value="{{ old('email',session('email') ? session('email') : null) }}" />
                          </div>
                          <div class="form-group">
                            <label for="password" class="bmd-label-floating">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required  />
                          </div>
                            <button type="submit" class="btn btn-primary btn-raised login-btn">Login</button> <a href="/register" class="btn btn-primary btn-raised register-btn">Register</a>
                        </form>


<br>
<a href="/forgetpassword" class="forget-url" >Forget Password</a>


<div class="row"> <aside class="col-md-12">


      </aside></div>

                    </aside>
            </div>
        </div>       
    </aside>
</div>
</div>
<script src="{{URL::asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"  ></script>
 <script src="{{URL::asset('js/popper.js') }}" type="text/javascript" ></script>
 <script src="{{URL::asset('js/bootstrap-material-design.js') }}" type="text/javascript"  ></script>
 <script src="{{URL::asset('js/bootstrapValidator.min.js') }}" type="text/javascript" ></script>

<script type="text/javascript">
$(document).ready(function() {
 $('body').bootstrapMaterialDesign(); 

$('#loginform').bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email is required'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is Required'
                    }
                }
            }
        }
    });

});
</script>
</body>
</html>
