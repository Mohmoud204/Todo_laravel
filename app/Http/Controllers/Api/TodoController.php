<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\todo;
class TodoController extends Controller
{
  public function returns($data = null, $code = null, $mess = null)
  {
    return [
      "message" => $mess,
      "statusCode" => $code,
      "data" => $data,
    ];
  }

  // getAll Todo
  public function getAll()
  {
    $data = todo::all();

    if (count($data) == 0) {
      return response($this->returns(null, "todo is empty", 200));
    }
    return response($this->returns($data, "success", 200));
  }
  // getOne todo by data
  public function findById($id)
  {
    $data = todo::findOrFail($id);

    return response($this->returns($data, "success", 200));
  }

  //post Data
  public function addTodo(Request $req)
  {
    $data = todo::create($req->all());
    return response($this->returns($data, "create", 201));
  }

  //  delectTodo

  public function delectTodo($id)
  {
    $find = todo::findOrFail($id)->delete();

    return response($this->returns("removed", "success", 200));
  }
}
