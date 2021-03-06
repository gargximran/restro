@extends('layout.app')

@section('body-content')
	<!-- main content start -->
<div class="main-content">
    <div class="container-fluid">
  

        <!-- add title row start -->
        <section class="add-row">
            <div class="row">
                <div class="col-md-12">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn add-table" data-toggle="modal" data-target="#exampleModal">
                    Add User +
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body add-table-form">
                                <form action="{{ route('user_post') }}" method="POST"> @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success">Add User</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn add-table" data-dismiss="modal">close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- add title row end -->


        <!-- table item end -->

        <!-- page indicator start -->
        <section class="page-indicator">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <i class="fas fa-user"></i>
                        </li>
                        <li>
                            User list
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page indicator end -->

        <!-- order list table start -->
        <section class="order-list">
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>SN</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)                            
                            
                                <tr>
                                    <th>{{$key+1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>User</td>
                                    <td class="action">
                                        <ul>
                                            <li class="edit">
                                                <i class="fas fa-edit" data-toggle="modal" data-target="#editUser{{$user->user_id}}"></i>
                                            </li>
                                            <li class="delete">
                                                <i class="fas fa-trash" data-toggle="modal" data-target="#deletUser{{$user->user_id}}"></i>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>


                                <!--delete user Modal -->
                                <div class="modal fade" id="deletUser{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Delete User</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body add-table-form">
                                                <form action="{{route('delete_user', [request()->user()->user_id, $user->user_id])}}" method="POST"> @csrf
                                                    @method('delete')

                                                    <div class="form-group text-right">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                           
                                    </div>
                                </div>



                                 <!--Edit user Modal -->
                                <div class="modal fade" id="editUser{{$user->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body add-table-form">
                                            <form action="{{route('update_user', [request()->user()->user_id, $user->user_id])}}" method="POST"> @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" value="{{$user->name}}" name="name">
                                                </div>

                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" value="{{$user->email}}" name="email">
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-success">Add User</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn add-table" data-dismiss="modal">close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- order list table end -->

    </div>
</div>
<!-- main content end -->
@endsection