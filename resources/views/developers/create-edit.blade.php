@include('../include.header')


<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-12">

             @if ($errors->any())
    
                <div class="alert alert-danger">
                    <ul>
            @foreach ($errors->all() as $error)
                
                        <li>{{ $error }}</li>
            @endforeach
        
                    </ul>
                </div>
@endif

        
                <!-- create Add Edit Form in same Page GET : https://laracasts.com/discuss/channels/code-review/clean-way-to-inject-old-input-->

            @if(isset($developer->id))
            
                <form action="{{ route('developers.update', $developer->id) }}" method="POST" id="developerform" autocomplete="off" enctype="multipart/form-data">
            @method('PUT')
            @else
            
                    <form action="{{ route('developers.store') }}" method="POST" id="developerform" autocomplete="off" enctype="multipart/form-data">
            @endif

            {{ csrf_field() }} 

                
                        <div class="row">
                            <aside class="col-md-3"></aside>
                            <aside class="col-md-6">
                                <div class="row">
                                    <aside class="col-md-12">
                                        <div class="box" style="margin-bottom: 0.5rem !important;">
                                            <h1 style="margin-bottom: 0px !important;">Developer</h1>
                                            <div class="row">
                                                <aside class="col-md-12">
                                                    <div class="form-group" >
                                                        <label class="bmd-label-floating">First Name</label>
                                                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ old('first_name',isset($developer->first_name) ? $developer->first_name : null) }}" >
                                                        </div>
                                                    </aside>
                                                </div>
                                                <div class="row">
                                                    <aside class="col-md-12">
                                                        <div class="form-group" >
                                                            <label class="bmd-label-floating">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name',isset($developer->last_name) ? $developer->last_name : null) }}" >
                                                            </div>
                                                        </aside>
                                                    </div>
                                                    <div class="row">
                                                        <aside class="col-md-12">
                                                            <div class="form-group" >
                                                                <label class="bmd-label-floating">Email</label>
                                                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email',isset($developer->email) ? $developer->email : null) }}" >
                                                                </div>
                                                            </aside>
                                                        </div>
                                                        <div class="row">
                                                            <aside class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Phone No</label>
                                                                    <input type="text" class="form-control" name="phone_no" id="phone_no" value="{{ old('phone_no',isset($developer->phone_no) ? $developer->phone_no : null) }}" >
                                                                    </div>
                                                                </aside>
                                                            </div>
                                                            <div class="row">
                                                                <aside class="col-md-12">
                                                                    <div class="form-group" >
                                                                        <label class="bmd-label-floating">Address</label>
                                                                        <input type="text" class="form-control" name="address" id="address" value="{{ old('address',isset($developer->address) ? $developer->address : null) }}" >
                                                                        </div>
                                                                    </aside>
                                                                </div>
                                                                <div class="row">
                                                                    <aside class="col-md-12">

                                @if(isset($developer->image))
                                 
                                                                        <div class="form-group">
                                                                            <img src="{{ url('/storage/developers-img/'.$developer->image) }}" alt="" title="" class="img-fluid" />
                                                                        </div>
                 @endif


        
                                                                        <div class="form-group">
                                                                            <label for="logo" class="bmd-label-floating">Image</label>
                                                                            <input type="file" name="logo" class="form-control-file" id="logo"   />
                                                                        </div>
                                                                    </aside>
                                                                </div>
                                                            </div>
                                                        </aside>
                                                        <aside class="col-md-12">
                                                            <div class="box" >
                                                                <button type="submit" class="btn btn-primary btn-raised save">SAVE</button>
                                                                <a href="/developers" class="btn btn-primary btn-raised cancel">Cancel</a>
                                                            </aside>
                                                        </div>
                                                    </div>
                                                </aside>
                                                <aside class="col-md-3"></aside>
                                            </form>
                                        </aside>
                                    </div>
                                </div>
                            </section>





@include('../include.footer')


                            <script type="text/javascript">



$(document).ready(function () {



//add form validation start here
$('#developerform').bootstrapValidator({
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'First Name is required'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'First Name is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Emailid is required'
                    },
                    emailAddress: {
                        message: 'Emailid Not valid'
                    }
                }
            },
            phone_no: {
                validators: {
                    notEmpty: {
                        message: 'Emailid is required'
                    },
                    regexp: {
                        regexp: /^([\+][0-9]{1,3}[ \.\-])?([\(]{1}[0-9]{1,6}[\)])?([0-9 \.\-\/]{3,10})((x|ext|extension)[ ]?[0-9]{1,4})?$/,
                        message: 'Phone No not valid'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },

            logo: {
                validators: {
                    file: {
                        extension: 'jpeg,png,jpg',
                        type: 'image/jpeg,image/png,image/jpg',
                        maxSize: 2*1024*1024,
                        message: 'The selected file is not valid format or not in 2MB'
                    }
                }
            },

                                   

        }
    });

//add form validation end here

 });




</script>