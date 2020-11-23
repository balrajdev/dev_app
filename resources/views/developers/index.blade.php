@include('../include.header')
 <section class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <aside class="col-md-12">
          <div class="box">

            <h1>Developers</h1>

             <a href="{{ url('/developers/create')}}" class="btn btn-raised btn-primary create"> +ADD </a> 

            @if(session('responce'))
            <div class="alert alert-success">
                @if(session('responce')=='updated')
                
                     <strong>Updated Successfully</strong>
                     
                @elseif(session('responce')=='added')

                    <strong>Added Successfully</strong>

                @elseif(session('responce')=='select_delete')

                    <strong>Select any one to delete</strong>

                @else

                    <strong>Deleted Successfully</strong>

                @endif
           
            </div>
            @endif

<form action="{{ url('/developers/multipledelete') }}" method="POST" id="deleteform" autocomplete="off" enctype="multipart/form-data" onsubmit="return confirm('Do You Want to Delete ?');">

    {{ csrf_field() }} 

    <table id="developers" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                 <th style="width:2%;"> <div class="checkbox">
    <label>
      <input type="checkbox" id="checkAll">
    </label>
  </div></th>
    
                <th>Sno</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1; @endphp
        @foreach ($developers as $developer)

            <tr>
                <td>
                <div class="checkbox">
    <label>
      <input type="checkbox" name="delete[]" value="{{ $developer->id }}">
    </label>
  </div>
              </td>
                <td>{{ $i++ }}</td>
                <td>{{$developer->first_name}}</td>
                <td>{{$developer->last_name}}</td>
                <td>{{$developer->email}}</td>
                <td><a href="{{ route('developers.edit',$developer->id) }}" class="btn btn-primary btn-raised edit-btn" >Edit</a>
                </td>
            </tr>
        @endforeach
            
        </tbody>
    </table>


     <div class="row">
           <div class="col-md-11">
          &nbsp;
         </div>
   
          <div class="col-md-1 fetch-btn-align">
            <button type="submit" class="btn btn-primary btn-raised delete-btn">Bulk Delete</button>
          </div>

        </div>
</form>



          </div>
          
        </aside>
     
      </div>
      <!--Row End Here--> 

    </div>
  </section>

@include('../include.footer')

<script type="text/javascript">
$(document).ready(function () {

    //datatable function
 $('#developers').DataTable();

 //check all check box function
  $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });


});

</script>