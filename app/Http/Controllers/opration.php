<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class opration extends Controller
{
    function insert(request $req){
        $result = DB::table('ktable')->insert($req->except('_token'));
        if($result == 1)
        {
            session(['msg'=>'insert successfully']);
        }else{
            session(['msg'=>'insert fail']);
        }
        return redirect('/home');
    }
    
    function delete($id){

        $result = DB::table('ktable')->where('id',$id)->delete();
        return redirect('home');

    }

    function search($id){
         $result = DB::table('ktable')->where('id',$id)->get();
         if(sizeOf($result) == 0)
         {
             session(['data' => "no data found"]);
         }
         else{
                session(['data' => $result]);
         }
         return redirect('update');
    }

    function update(request $res){
        $id = $res->input('id');
        $result = DB::table('ktable')->where('id',$id)->update($res->except('_token','id'));
        if($result == 1){
            session(['msg'=>'data update successfull']);
        }
        else{
            session(['msg'=>'fail']);
        }
        return redirect("home");
    }
    

}
