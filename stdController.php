<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class stdController extends Controller

{
    //read data
    public function index(){
     $data = students::get() ;

      return view('students.index',['data'=>$data]);

    }




    public function create(){
        return view('students.create');
    }


    public function storeInfo(Request $request){

     $data= $this->validate($request,[
            "name" =>"required|regex:/^[a-zA-Z\s]*$/",
            "email" =>"required|email",
            "password" =>"required|min:6",
            "cv"=>"required|mimes:pdf,zip|max:5048"

        ]);
        $newCV= time().' '. rand() . " ". $request->cv->extension();
        $request->cv->move(public_path('cv'),$newCV);



        $data["password"] = bcrypt($data["password"]);
        $data["cv"] = $newCV;
        $op = students::create($data );
        if($op){
            $message = "Raw Removed";
        }else{
            $message = "Error Try Again";
        }
        return redirect(url('students'));

    }
    public function edit($id){
        $data = students::where('id',$id)->get();
        return view('students.edit',['data'=>$data]);

    }

    public function update(Request $request){
        // code ......

            # Validate Data .....
            $data =   $this->validate($request,[
                  "name" =>"required|regex:/^[a-zA-Z\s]*$/",
                  "email" =>"required|email",
                 "id"  => "required|numeric",
                 "cv"=> "required|mimes:pdf,zip|max:5048"
           ]);
           $newCV= time().''. rand() . "". $request->cv->extension();
           $request->cv->move(public_path('cv'),$newCV);





         $op =  students::where('id',$request->id)->update($data);

         if($op){
             $message = "Raw Updated";
         }else{
             $message = "Error Try Again";
         }


         return redirect(url('/students'));



      }








    public function destroy($id){
        $op  =  students::where('id',$id)->delete();

        if($op){
            $message = "Raw Removed";
        }else{
            $message = "Error Try Again";
        }
        return redirect(url('students'));

    }











}
