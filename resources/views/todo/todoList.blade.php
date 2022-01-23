<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    max-width: 1920px;
    margin: 0 auto;
    font-size: 16px;
    color: #333;
  }
  .container {
    max-width: 1120px;
    margin: 0 auto;
  }
  .flex-blk {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  table {
    width: 100%;
  }
  table, th, td {
    border: 1px solid #333;
    border-collapse: collapse;
  }
  th, td {
    padding: 10px;
    text-align: center;
  }
  th {
    background: #efefef;
  }
  .btn {
    display: inline-block;
    color: #fff;
    padding: 10px;
    border-radius: 10px;
    text-decoration: none;
  }
  .create-btn {
    background: #3055cf;
  }
  .edit-btn {
    background: #2eb051;
    margin-right: 2%;
  }
  .delete-btn {
    background: #eb4034;
  }
  .btn:hover {
    opacity: 0.8;
  }
</style>
<body>
  <div class="container">
    <div class="flex-blk">
      <h1>Todo List</h1>
      <a href="{{ route('create-todo') }}" class="btn create-btn">Create</a>
    </div>
    <table>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Instruction</th>
        <th>Operation</th>
      </tr>
      @foreach ($todoList as $todo)
        <tr>
          <td>{{ $todo->id }}</td>
          <td><a href="{{ route('detail-todo', $todo->id) }}">{{ $todo->name }}</a></td>
          <td>{{ $todo->instruction }}</td>
          <td>
            <a href="{{ route('edit-todo', $todo->id) }}" class="btn edit-btn">Edit</a>
            <a href="{{ route('delete-todo', $todo->id) }}" class="btn delete-btn">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </div>
</body>

</html>