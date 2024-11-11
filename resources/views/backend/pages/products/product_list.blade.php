@extends('backend.layouts.master')
@section('page_content')

    <body>
        <section>
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-2">
                    <div class="sidebar">
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="#">Orders</a></li>
                            <li><a href="#">Customers</a></li>
                        </ul>
                    </div>
                </div> --}}
                    <div class="col-md-10">
                        <div class="content">
                            <h1>Product List</h1>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Vendor Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($products as $product) --}}
                                    <tr>
                                        {{-- <td>{{ $product->name }}</td> --}}
                                        <td>name</td>
                                        <td>Image</td>
                                        <td>price</td>
                                        <td>quantity</td>
                                        <td>category</td>
                                        <td>vendor->name</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a href="#" class="btn btn-sm btn-primary">Add Products</a>
        <br>
        <br>
        <br>
    </body>
@endsection
