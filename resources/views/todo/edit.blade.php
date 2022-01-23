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
  .form-flex {
    display: flex;
    margin-bottom: 10px;
  }
  label {
    width: 20%;
    margin-right: 5%;
  }
  input[type=text] {
    width: 60%;
    padding: 10px;
  }
</style>
<body>
  <div class="container">
    <h1>Edit Todo</h1>
    @foreach ($todoList as $todo)
    <form action="{{ route('update-todo',$todo->id) }}" method="POST">
      @csrf
      <div class="form-flex">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ $todo->name }}">
      </div>
      <div class="form-flex">
        <label for="instruction">Instruction</label>
        <input id="instruction" type="text" name="instruction" value="{{  $todo->instruction }}">
      </div>
      <div>
        <button type="submit">Update</button>
        <button onclick="window.history.back()">Back</button>
      </div>
    </form>  
    @endforeach
    
  </div>
</body>

</html>