@extends('frontend.auth.authentication_page')
@section('page_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 center-screen">
                <div class="card animated fadeIn w-100 p-3">
                    <div class="card-body">
                        <h4>Sign Up</h4>
                        <hr />
                        <div class="container-fluid m-0 p-0">
                            <div class="row m-0 p-0">
                                <div class="col-md-6 p-2">
                                    <label>Name</label>
                                    <input id="name" placeholder="Full Name" class="form-control" type="text" />
                                </div>
                                <div class="col-md-6 p-2">
                                    <label>Mobile Number</label>
                                    <input id="mobile" placeholder="Mobile" class="form-control" type="mobile" />
                                </div>
                                <div class="col-md-6 p-2">
                                    <label>Password</label>
                                    <input id="password" placeholder="User Password" class="form-control"
                                        type="password" />
                                </div>
                                <div class="col-md-6 p-2">
                                    <label>Role</label>
                                    <select id="role" class="form-control">
                                        <option value="customer">Customer</option>
                                        <option value="vendor">Vendor</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-4 p-2">
                                    <button onclick="onRegistration()"
                                        class="btn mt-3 w-100 bg-gradient-primary">Complete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //     < script src = "https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" >
        // </>
        async function onRegistration() {
            let name = document.getElementById('name').value;
            let mobile = document.getElementById('mobile').value;
            let password = document.getElementById('password').value;
            let role = document.getElementById('role').value;
            if (name.length === 0) {
                return 'Name is required'
            } else if (mobile.length === 0) {
                return 'Mobile is required'
            } else if (password.length === 0) {
                return 'Password is required'
            } else {
                let res = await axios.post("/user-registration", {
                    name: name,
                    mobile: mobile,
                    password: password,
                    role: role
                })
                if (res.status === 200 && res.data['status'] === 'success') {
                    setTimeout(function() {
                        window.location.href = '/login'
                    }, 2000)
                } else {
                    return 'Registration fail'
                }
            }
        }
    </script>
@endsection
