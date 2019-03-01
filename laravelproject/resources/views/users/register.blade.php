@include('inc.header')
<a href="/" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<form method="POST" action="/users/register">
    @csrf
    <div class="card  mt-3 col-lg-8 offset-2">
        <h3 class="text-center mt-3">Register here</h3>
        <hr>
        <div class="form-group mt-3 ">
            <label for="name">Name</label>
            <input type="text" name="name"  class="form-control" id="name"  placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>

        <div class="form-group ">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control " id="confirm_password" placeholder="Confirm Password">
        </div>

        <button type="submit" name="submit" class="btn btn-outline-primary mb-3 form-control">Register</button>

    </div>
</form>

@include('inc.errors')