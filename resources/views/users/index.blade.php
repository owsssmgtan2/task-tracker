@extends('layouts.app')

@section('main-content')
	<div class="row">
	    <div class="col-md-12 col-lg-12 col-sm-12">
	        <div class="white-box">
	            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
	                <select class="form-control pull-right row b-none">
	                    <option value="0">ALL</option>
	                    <option value="1">IT</option>
	                    <option value="2">MIT - ADMIN</option>
	                    <option value="3">MIT - STAFF</option>
	                    <option value="4">QA - ADMIN</option>
	                    <option value="5">QA - STAFF</option>
	                    <option value="6">GD - ADMIN</option>
	                    <option value="7">GD - STAFF</option>
	                    <option value="8">REPORTS</option>
	                </select>
	            </div>
	            <h3 class="box-title">List of System Users</h3>

	            <button data-toggle='modal' data-target="#mAddUser" class="btn btn-default btn-add">@fa('user-plus') ADD USER</button>

	            <div class="table-responsive">
	                <table class="table table-hover" id="users_dtb">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>NAME</th>
	                            <th>USERNAME</th>
	                            <th>EMAIL</th>
	                            <th>TEAM</th>
	                            <th>SITE</th>
	                            <th>DATE</th>
	                            <th>MODIFY?</th>
	                            <th>DEACTIVATE?</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        
	                    </tbody>
	                </table>
	            </div>

	            
	        </div>
	    </div>
	</div>

@include('users.modal.adduser')
@include('users.modal.edituser')
@include('users.modal.deleteuser')

@endsection