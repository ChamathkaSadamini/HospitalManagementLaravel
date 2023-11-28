<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    </head>
  <body>
    <div class="container-scroller">
   
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
       @include('admin.navbar')
        <!-- partial -->
        <div class="container" align="center" style="padding-top: 100px">
            <form action=" {{url('editdoctor',$data->id)}} " method="POST" enctype="multipart/form-data">
                @csrf
            <div style="padding: 15px">
                <label>Doctor Name</label>
                <input type="text" style="color: black" name="name" value="{{$data->name}}">
                </div>
                <div style="padding: 15px">
                    <label>Phone No</label>
                    <input type="number" style="color: black" name="phone" value="{{$data->phone}}">
                    </div>
                    <div style="padding: 15px">
                        <label>Speciality</label>
                        <input type="text" style="color: black" name="specialty" value="{{$data->specialty}}">
                      </div>
                        <div style="padding: 15px">
                            <label>Room No</label>
                            <input type="text" style="color: black" name="room" value="{{$data->room}}">
                            </div>
                            <div style="padding: 15px">
                                <label>Doctor Image</label>
                                <img height="100" width="100" src="doctorimage/{{$data->image}}">
                                </div>
                                <div style="padding: 15px">
                                    <label>Change Image</label>
                                    <input type="file" style="color: black" name="file">
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