<h1>Login</h1>
<form action="{{ route('post-login') }}" method="post">
  @csrf

  @if ($errors->any())
    <span>{{ $errors->first() }}</span>
  @endif

  <div>
    <label for="email">Email</label>
    <input type="text" id="email" name="email">
    @error('email')
      <span class="err-msg">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    @error('password')
      <span class="err-msg">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div>
    <button type="submit">
      Login
    </button>
  </div>
</form>
