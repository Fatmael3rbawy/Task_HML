@extends('layouts.admin')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!--start section profile-->
        <section class="profile">
            <div class="overlay"></div>
            <div class="container">


                <div class="row justify-content-md-center">
                    <div class="col-sm-9">
                        <div class="profile-content">

                            <center>
                                <form action="{{route('product.store')}}" validate method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ csrf_field() }}

                                    <table class="table table-border table-striped" style="margin:25px;width:75%">

                                        <h1 class="username">Add New Product </h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h6>Product Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="name" required placeholder="Enter the product name" style="width:500px "></h5>
                                                    @error('name')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Price</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="price" required placeholder="Enter the product price" style="width:500px "></h5>
                                                    @error('price')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Description</h6>
                                                </td>
                                                <td>
                                                    <h5><textarea class="form-control" name="description" rows="4" cols="50"> </textarea></h5>
                                                    @error('desc')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </div>
                                        <div class="name">
                                            <tr>
                                                <td>
                                                    <h6>Category</h6>
                                                </td>
                                                <td>
                                                    <h5> <select class="form-control" type="text" name="category_id"  style="width:500px "></h5>
                                                        <option value=""> Null </option>

                                                        @foreach($categories as $value)
                                                    <option value="{{$value->id}}"> {{$value->name}} </option>
                                                    @endforeach

                                                    </select>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </div>


                                        <tr>
                                            <td> Upload Product Images </td>
                                            <td><input type="file" name="image" multiple class="form-control-file border" required style="width:500px " /> </td>
                                        </tr>


                                        <tr>
                                            <td>
                                                <div class="submit">
                                                    <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="btnadd" value="ADD"></div>
                                            </td>
                                        </tr>


                                    </table>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
