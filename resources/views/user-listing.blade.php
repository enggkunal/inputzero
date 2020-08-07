@extends('layouts.master')
@section('content')
	<h1>Users</h1>
	<hr/>
	<a class="btn btn-primary" id="createUser"> Create User</a>
	<hr/>
	<div  id="users">
		@include('table')
	</div>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-success hide" id="successMessage"></div>
      	<form id="userForm" action="/user">
      		@csrf
      		<input type="hidden" name="id" id="editUserId">
        <div class="form-group">
        	<label>Name</label>
        	<input type="text" name="name" id="editUserName" class="form-control">
        	<p id="name_error" class="error"></p>
        </div>

        <div class="form-group">
        	<label>Email</label>
        	<input type="email" name="email" id="editUserEmail" class="form-control">
        	<p id="email_error" class="error"></p>
        </div>

        <div class="form-group">
        	<label>Phone</label>
        	<input type="phone" name="phone" id="editUserPhone" class="form-control">
        	<p id="phone_error" class="error"></p>
        </div>


        <div class="form-group">
        	<label>City</label>
        	<input type="city" name="city" id="editUserCity" class="form-control">

        	<p id="city_error" class="error"></p>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" type="submit" id="userUpdate">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop