<?php

namespace App\Http\Controllers;
use App\Models\todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  public function getAll()
  {
    $data = todo::all();
    return view("welcome")->with("data", $data);
  }

  public function addTodo(Request $req)
  {
    $data = todo::create($req->all());
    return redirect("/");
  }

  public function delectTodo($id)
  {
    $find = todo::findOrFail($id)->delete();
    return redirect("/");
    // return response($this->returns("removed", "success", 200));
  }
}
