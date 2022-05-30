@extends('layouts.admin')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Category</li>
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
                                <form action="{{route('category.update',$category->id)}}" validate method="POST" >
                                    @csrf
                                    {{ csrf_field() }}

                                    <table class="table table-border table-striped" style="margin:25px;width:75%">

                                        <h1 class="username">Update {{$category->name}} Category </h1>
                                        <div>

                                            <tr>
                                                <td>
                                                    <h6>Category Name</h6>
                                                </td>
                                                <td>
                                                    <h5><input class="form-control" type="text" name="name" required value='{{$category->name}}' style="width:500px "></h5>
                                                    @error('name')
                                                    <div class="alert alert-danger" >{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </div>
                                                      <tr>
                                            <td>
                                                <div class="submit">
                                                    <input style="padding:5px;width:350px ;height:40px" class="btn btn-info" type="submit" name="btnadd" value="Update">
                                                </div>
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
