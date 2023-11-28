
<!DOCTYPE html>
<html lang="en">
  <head>

<style type="text/css">
label{
  display: inline-block;
width: 200px;
}
  </style>

    @include('admin.css')
    </head>
  <body>
    <div class="container-scroller">
   
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
<!--Success Massege-->
@if(session()->has('message'))
<div class="alert alert-success">
  <button type="button" class="close">x</button>
{{session()->get('message')}}
</div>
@endif
<!--end Success Massege-->
<div class="container" align="center" style="padding-top: 100px">
    <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
      @csrf
<div style="padding: 15px">
<label>Doctor Name</label>
<input type="text" style="color: black" name="name" placeholder="Doctor Name">
</div>
<div style="padding: 15px">
    <label>Phone No</label>
    <input type="number" style="color: black" name="number" placeholder="Doctor Number">
    </div>
    <div style="padding: 15px">
        <label>Speciality</label>
     <select name="speciality" style="color: black; width:200px;">
<option>Select</option>
<option value="skin">Skin</option>
<option value="heart">Heart</option>
<option value="eye">Eye</option>
<option value="nose">Nose</option>
     </select>
      </div>
        <div style="padding: 15px">
            <label>Room No</label>
            <input type="text" style="color: black" name="room" placeholder="Room No">
            </div>
            <div style="padding: 15px">
                <label>Doctor Image</label>
                <input type="file" name="file">
                </div>
                <div style="padding: 15px">
                 
                  <input type="submit" name="btn btn-success">
                  </div>
    </form>  
        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>