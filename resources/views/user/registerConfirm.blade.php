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
  .right {
    display: flex;
    justify-content: end;
  }
  .err-msg {
    color: #B0413E;
  }
</style>
<body>
  <div class="container">
    <h1>Confirm User</h1>
    <form action="{{ route('store-user') }}" method="POST">
      @csrf
      <div class="form-flex">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ $name }}" readonly>
      </div>
      <div class="form-flex">
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="{{ $email }}" readonly>  
      </div>
      <div class="form-flex">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value="{{ $password }}" readonly>  
      </div>
      <div>
        <button type="submit">Confirm</button>
        <input type="button" onclick="window.history.back()" value="Back">
      </div>
    </form>
  </div>
</body>

</html>