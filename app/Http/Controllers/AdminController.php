<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use App\Models\Appointment;

class AdminController extends Controller
{
   public function addview()
   {
    return view('admin.add_doctor');
   }
   public function upload(Request $request)
   {
      $request->validate([
         'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         // Add any other validation rules for your fields
     ]);
 
     $doctor = new Doctor;
 
     // Get the file from the request
     $image = $request->file('file');
 
     // Check if a file was uploaded
     if ($image) {
         // Generate a unique name for the file
         $imageName = time() . '.' . $image->getClientOriginalExtension();
 
         // Move the uploaded file to the desired directory
         $image->move('doctorimage', $imageName);
 
         // Set the image name in the Doctor model
         $doctor->image = $imageName;
     }
 
     // Set other attributes from the request
     $doctor->name = $request->name;
     $doctor->phone = $request->number;
     $doctor->room = $request->room;
     $doctor->specialty = $request->speciality;
 
     // Save the Doctor model to the database
     $doctor->save();
 
     return redirect()->back()->with('message', 'Doctor Added Successfully'); //->with('message', 'Doctor Added Successfully')
   }
   public function showappointment()
   {
      $data=appointment::all();//all data display Showappoiment table
      return view('admin.showappointment',compact('data'));
   }
   public function approved($id){
      $data=appointment::find($id);
      $data->status='approved';
      $data->save();
      return redirect()->back();
   }
   public function canceled($id){
      $data=appointment::find($id);
      $data->status='canceled';
      $data->save();
      return redirect()->back();
  }
public function showdoctor(){
   $data = doctor::all();
   return view('admin.showdoctor',compact('data'));
}

public function deletedoctor($id)
{
   $data=doctor::find($id);
   $data->delete();
   return redirect()->back();
}
public function updatedoctor($id)
{
   $data = doctor::find($id);
   return view('admin.update_doctor',compact('data'));
}

public function editdoctor(Request $request , $id)
{

   $doctor = doctor::find($id);

   $doctor->name=$request->name;

   $doctor->phone=$request->phone;

   $doctor->specialty=$request->pecialty;

   $doctor->room=$request->room;

   $image=$request->file;

   if($image)
   {

$imagename=time().'.'.$image-> getClientOriginalExtension();

$request->file->move('doctorimage',$imagename);
$doctor->image=$imagename;
   }

$doctor->save();

return redirect()->back();

}

}
