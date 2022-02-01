<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
    <h1>Create User</h1>
    <form action="{{ route('confirm-register') }}" method="POST">
      @csrf
      <div class="form-flex">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}">
      </div>
      <div class="right">
        @error('name')
          <span class="err-msg">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-flex">
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="{{ old('email') }}">  
      </div>
      <div class="right">
        @error('email')
          <span class="err-msg">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div class="form-flex">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" value="{{ old('password') }}">  
      </div>
      <div class="right">
        @error('password')
          <span class="err-msg">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
      <div>
        <button type="submit">Create</button>
        <button type="reset">Clear</button>
      </div>
    </form>
  </div>

</body>

</html>