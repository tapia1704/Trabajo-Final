<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserController extends Controller
{
   public function index():View{
    $users =  DB::select('select * from user');
    return view("user", ["users"=> $users]);
   } //
   public function edit():View{
    return view("useredita");
   } //
   public function create():View{
    return view("create");
   } 
  public function store():View{
     $data = $_POST;
    $insert = DB::insert('Insert into user (id,name,lastname) values (?,?,?)', [$data['id'], $data['name'], $data['lastname']]);
    
    return $this->index();
   } 
   public function update():View{
    $data = $_POST;
    $update = DB::update('Update user SET name = ?, lastname=? where id=?', [$data['name'], $data['lastname'], $data['id']]);
    return $this->index();
   } 

   public function delete():View{
    $data = $_GET;
    $delete = DB::delete('DELETE FROM user where id=?', [$data['id']]);
    return $this->index();
   } 
   
   
   
   //
  // public function crud($crud):View{
    //$update="Insert into user (id,name,lastname) values (id:,name:,lastname:)";
//$delete="delete from user where id=:id";
   // $sql = ($crud="update")? $update:$delete;
    //$users =  DB::update($sql);
    //return view("user", ["users"=> $users]);
  // } //
}
