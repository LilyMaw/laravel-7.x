<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User List</title>
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
  .pagination {
    list-style: none;
    display: flex;
    padding: 0;
    width: fit-content;
    border: 1px solid #333;
  }
  .page-item {
    color: #333;
    text-align: center;
    padding: 8px;
    border-right: 1px solid #333;
    text-decoration: none;
  }
  .page-item:last-child {
    border-right: 0;
  }
  .page-item.active {
    background: #3055cf;
    color: #fff;
  }
</style>
<body>
  <div class="container">
    <div class="flex-blk">
      <h1>User List</h1>
      <a href="{{ route('todo-list') }}" class="btn create-btn">Todo</a>
      <a href="{{ route('register') }}" class="btn create-btn">Create</a>
      <a href="{{ route('logout') }}" class="btn delete-btn">Logout</a>
    </div>
    {{-- <table>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
      @foreach ($userList as $user)
        <tr>
          <td>{{ $i = $i + 1 }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
        </tr>
      @endforeach
    </table> --}}
    <ul>
      @foreach ($users as $user)
      <li>{{ $user['name'] }}</li>
      <li>
        @foreach ($user['phones'] as $index => $phone)
        <span>{{ $phone['phone'] }}</span>@if ($index != count($user['phones'])) , @endif
        @endforeach
      </li>
      <li>
        @foreach ($user['roles'] as $index => $role)
        <span>{{ $role['name'] }}</span>@if ($index != count($user['roles'])) , @endif
        @endforeach
      </li>
      <br>
      @endforeach
    </ul>
  </div>
</body>
</html>