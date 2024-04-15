<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS */
    .todo-item {
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h1 class="mb-4">Todo List</h1>
  <form id="todoForm" class="mb-3" action="/addTodo" method="post">
   @csrf()
    <div class="input-group">
      <input type="text" id="newTodoInput" class="form-control" placeholder="Add New Todo" aria-label="Add New Todo" name="todo">
      <div class="input-group-append">
        <button class="btn btn-primary" type="submit">Add</button>
      </div>
    </div>
  </form>
  <ul id="todoList" class="list-group">
@if (count($data) > 0)
            @foreach ($data as $item)
            <div class="d-flex justify-content-around align-items-center">
            <li class="list-group-item todo-item w-100">{{$item->todo}}</li>
         
            <a href="/delectTodo/{{$item->id}}" ><input type="submit" id="rubbishButton" class="btn btn-primary mt-3"  value="🗑️"/></a>
         
          </div>
            @endforeach
        @else
            <tr>
                <th>No Data</th>
            </tr>
        @endif
  </ul>

</div>
</body>
</html>