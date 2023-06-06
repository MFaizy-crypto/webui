<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //

    public function register()
    {
     return view('layouts.register');
    }
    public function userSignup(Request $req){
     $e=DB::table('users')->where('email', $req->email)->count();
     if ($e==0) {
     $data=array(
           'name'=>$req->name,
           'password'=>$req->password,        
           'email'=>$req->email
           );
           DB::table('users')->insert($data);
     return back();
     } else {
       return redirect()->back()->with('error', 'This Email is already exist');
     }
    
   }
   public function login()
    {
     return view('layouts.login');
    }
    public function loginUser(Request $req)
    {
        $userEmail=DB::table('users')->where('email', $req->email)->get()->count();
        if ($userEmail>0) {
        $data=DB::table('users')->where('email', $req->email)->get();
        $password=$data[0]->password;
     
            if ($req->password==$password) {
                $usersId=DB::table('users')->where('email', $req->email)->where('password', $req->password)->get();
                $usersIds=  $usersId[0]->id;
                $req->session()->put('id', $usersIds);
            return redirect('/designPage');
            }else{
              return redirect()->back()->with('error', 'Password is wrong');
            }   
       
    } else{
      return redirect()->back()->with('error', 'Email do not exist');
       }
 }
 public function logout(Request $request){
     if ($request->session()->has('id')){
     $request->session()->flush();
     return redirect('/login');
   }
   return redirect('/login');
   }
   public function saveDesignData(Request $req)
   {
     // $title=$req->title;
    
     // $description=$req->des;
 
     // $image=$req->file('file');
 
     
     // if ($title != null || $description != null || $image != null) {
     //   // $img2=$req->file($image);
     //   $imgdata=[];
     //   if ($image!=null) {
     //     $name=$image->getClientOriginalName();
     //     $path=public_path('assets/design');
     //     $image->move($path, $name);
     //     $dt1=array(
     //       'img'=>$name
     //     );
     //     $dt=DB::table('images')->insertGetId($dt1);
     //     $dt2=DB::table('images')->where('id', $dt)->get();
     //     array_push($imgdata,$dt2);
     //   }
     //     $t=array(
     //       'title'=>$title,
     //     );
     //     $t=array(
     //       'title'=>$title,
     //     );
     $data=DB::table('pagedesign')->where('user_id', session('id'))->orderBy('order_div', 'ASC')->get();
     // $data=$data2->sortBy('order_div');
     return $data;
     }
    public function saveDesignDataNow(Request $req)
    {
     $maxOrder = DB::table('pagedesign')->max('order_div');
 if(($req->description!=null) || ($req->title!=null) || ($req->file('file')!=null))
 {
 // Increment the maximum order value by 1
 $newOrder = $maxOrder + 1;
     $img=$req->file('file');
     if ($img != null) {
       $name=$img->getClientOriginalName();
       $path=public_path('web/design');
       $img->move($path, $name);
       // $t=DB::table('pagedesign')->where('user_id', session('id'))->get();
      
       
     $data=array(
       'img'=>$name,
       'description'=>$req->description,
       'title'=>$req->title,
       'user_id'=>session('id'),
       'order_div'=>$maxOrder
     );
   
    DB::table('pagedesign')->insert($data);
     return redirect()->back()->with('success', 'Your Page Design Changed Successfully..');
     }else{
       $data=array(
         'description'=>$req->description,
         'title'=>$req->title,
         'user_id'=>session('id'),
         'order_div'=>$maxOrder
       );
     
      DB::table('pagedesign')->insert($data);
       return redirect()->back()->with('success', 'Your Page Design Changed Successfully..');
     }
       
    }else{
        return redirect()->back()->with('error', 'Please Fill Anyone Field..');
    }
 
    }
   public function master() {
     $data=DB::table('pagedesign')->where('user_id', session('id'))->get();
     $c=DB::table('pagedesign')->where('user_id', session('id'))->count();
 
     return view('layouts.master', compact('data', 'c'));
 }
 public function designPage(Request $request) {
   //   if ($request->session()->has('id')){
   // $data=DB::table('pagedesign')->where('user_id', session('id'))->get();
   // $c=DB::table('pagedesign')->where('user_id', session('id'))->count();
 
   return view('admin.designPage');
     // }
 // return redirect('/login');
 }
 public function getDesignData(Request $req)
 {
   $id2=$req->all('id');
   $id=$id2['id'];
   $data=DB::table('pagedesign')->where('id', $id)->get();
   return response()->json([
     'data'=>$data,
     'id'=>$id
   ]);
 }
 
 public function editDesignDataNow(Request $req)
 {
   $id=$req->id;
  $img=$req->file('file');
  if ($img != null) {
   $name=$img->getClientOriginalName();
   $path=public_path('web/design');
   $img->move($path, $name);
   // $t=DB::table('pagedesign')->where('user_id', session('id'))->get();
  
   
 $data=array(
   'img'=>$name,
   'description'=>$req->description,
   'title'=>$req->title,
   'user_id'=>session('id')
 );
 
 DB::table('pagedesign')->where('id', $id)->update($data);
 return redirect()->back()->with('success', 'Your Page Design Changed Successfully..');
  }else{
    
   
     $db=DB::table('pagedesign')->where('id', $id)->get();
     $imge=$db[0]->img;
      if ($imge!=null) {
       $data=array(
         'img'=>$imge,
         'description'=>$req->description,
         'title'=>$req->title,
         'user_id'=>session('id')
       );
     
       DB::table('pagedesign')->where('id', $id)->update($data);
       return redirect()->back()->with('success', 'Your Page Design Changed Successfully..');
      }else{
       $data=array(
         'description'=>$req->description,
         'title'=>$req->title,
         'user_id'=>session('id')
       );
     
      DB::table('pagedesign')->where('id', $id)->update($data);
      return redirect()->back()->with('success', 'Your Page Design Changed Successfully..');
      }
   
   
 }
 }
 public function deleteDesignData(Request $req)
 {
   
   $id2=$req->all('id');
   $id=$id2['id'];
   $data=DB::table('pagedesign')->where('id', $id)->delete();
   return $data;
 }
 public function updateOrder(Request $req)
 {
   $id2=$req->all('id');
   $id=explode(',', $id2['id']);
   $order2=$req->all('order');
   $order=explode(',', $order2['order']);
   foreach ($order as $index => $order) {
     $id3 = $id[$index];
     $orderValue = $index + 1;
 $ar=array(
   'order_div'=>$orderValue
 );
 
   DB::table('pagedesign')->where('id', $id3)->update($ar);
 
  
   }
 
 
 
   return 'success';
 }

 public function newDesign() 
 {
  return view('admin.master');
 }
 
}
