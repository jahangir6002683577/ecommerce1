@extends('layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90  p-4">
                    <div class="card-body">
                        <h4>Log In</h4>
                        <br />
                        <input id="mobile" placeholder="Mobile No" class="form-control" type="mobile" />
                        <br />
                        <input id="password" placeholder="Password" class="form-control" type="password" />
                        <br />
                        <button onclick="SubmitLogin()" class="btn w-100 bg-gradient-primary">Proceed</button>
                        <hr />
                        <div class="float-end mt-3">
                            <span>
                                <a class="text-center ms-3 h6" href="{{ url('/userRegistration') }}">Sign Up </a>
                                <span class="ms-1">|</span>
                                <a class="text-center ms-3 h6" href="{{ url('/sendOtp') }}">Forget Password</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        async function SubmitLogin() {
            let mobile = document.getElementById('mobile').value;
            let password = document.getElementById('password').value;

            if (mobile.length === 0) {
                alert('Mobile no is required');
            } else if (password.length === 0) {
                alert('password is required');
            } else {
                let res = await axios.post("/userLogin", {
                    mobile: mobile,
                    password: password
                });
                if (res.status === 200) {
                    // window.location.href = '/dashboard';
                    setTimeout(function() {
                        window.location.href = '/dashboard'
                    }, 2000)
                } else {
                    alert('log in failled');
                }
            }
        }
    </script>
@endsection
