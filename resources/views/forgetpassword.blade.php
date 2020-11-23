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

                    @if(session('error'))
                    <div class="alert alert-danger">
                    <strong> @if(session('error')=='emailid_notfound')

                    Email ID not found

                    @endif
                    </strong>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="alert alert-success">
                    <strong> @if(session('success')=='reset_password_success')

                    Password Rest Successful Current Password : {{session('password')}}

                    @endif</strong>
                    </div>
                    @endif

                </aside>
                
            </div>

            <div class="row">
                <aside class="col-md-12">
                    
    <aside class="sub-logo"><a href="#"><img src="{{URL::asset('images/logo.jpg') }}" alt=""/></a></aside>
            <form id="resetform"  method="POST" action="{{ url('/resetpassword')}}" >

                        {{ csrf_field() }}
                          <div class="form-group">
                            <label for="email" class="bmd-label-floating">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required value="{{ old('email',session('email') ? session('email') : null) }}" />
                          </div>
                            <button type="submit" class="btn btn-primary btn-raised login-btn">Submit</button>
                        </form>
                        <a href="/" class="return-url">Return</a>
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

$('#resetform').bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email Id required'
                    }
                }
            }
        }
    });

});
</script>
</body>
</html>
