<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CursoController extends Controller
{

   public function index():View{
    $cursos =  DB::select('select * from cursos');
    return view("cursos", ["cursos"=> $cursos]);
   } 
  
  // public function crud($crud):View{
    //$update="Insert into user (id,name,lastname) values (id:,name:,lastname:)";
//$delete="delete from user where id=:id";
   // $sql = ($crud="update")? $update:$delete;

    //$users =  DB::update($sql);
    //return view("user", ["users"=> $users]);
  // } //
}
