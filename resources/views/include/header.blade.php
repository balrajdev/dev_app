<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{URL::asset('css/custom.css') }}">
 <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-material-design.min.css') }}" >
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrapValidator.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('css/dataTables.bootstrap4.min.css') }}">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{URL::asset('css/responsive.dataTables.min.css') }}">

<title>DEV APP</title>
</head>

<body class="sub-page-bg">
<div class="page-wrapper">
  <header class="main-header">
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-2">

              <div class="row"> <aside class="col-md-12"> <div class="logo">
            DEV APP
            </div> </aside> </div>
          
            </aside>

            <aside class="col-md-8">

              <ul class="nav nav-tabs">

                <li class="nav-item"><a href="/developers" class="nav-link" ><i class="material-icons">person</i>Developers</a></li>
  

</ul>

            </aside>

            <aside class="col-md-2"> 

              <div class="btn-group" id="username-label">
  <button class="btn dropdown-toggle" type="button" id="buttonMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <a href="#" >Welcome <span> {{ Auth::user()->name }}</span> </a>
  </button>
 
  <div class="dropdown-menu" aria-labelledby="buttonMenu1">
    <a href="/logout" class="dropdown-item" >
      <i class="material-icons">power_settings_new</i>Logout
    </a>
  </div>
</div>

  <!--<div class="username-label" >            
            <a href="#" >Welcome <span> {{ Auth::user()->name }}</span> </a>
      </div>-->

            
            </aside>

        </div>
    </div>  
  </header>
 