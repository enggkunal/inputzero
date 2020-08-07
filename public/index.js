function clearValidation(){
	$('#name_error').html('');
	 $('#email_error').html('');
	 $('#phone_error').html('');
	 $('#city_error').html('');
}

$(document).on( "click", '.edit_button',function(e) {
	var user = JSON.parse($(this).attr('user'));
    $('#exampleModal').modal('show');
    $('#editUserName').val(user.name);
    $('#editUserEmail').val(user.email);
    $('#editUserPhone').val(user.phone);
    $('#editUserCity').val(user.city);
    $('#editUserId').val(user.id);
	$('#exampleModalLabel').html('Update User');
    $('#userUpdate').html('Update');
    clearValidation();
});

$(document).on( "click", '#createUser',function(e) {
	$('#exampleModal').modal('show');
	$('#editUserName').val('');
    $('#editUserEmail').val('');
    $('#editUserPhone').val('');
    $('#editUserCity').val('');
    $('#editUserId').val('');
    $('#exampleModalLabel').html('Create User');
    $('#userUpdate').html('Create');
    clearValidation();
});

$(document).on( "click", '#userDelete', function(e) {
	var user = JSON.parse($(this).attr('user'));
	if (confirm('Are you sure you want to delete '+ user.name +'?')) {
    	$.ajax({
			url: 'user/' + user.id,
			method: 'get',
			success: function(data){
				alert('User deleted');
				$('#users').html(data);
			}
		});    
    }
});

$(document).on( "click", '#userUpdate', function(e) {
	var name  = $('#editUserName');
	var email = $('#editUserEmail');
	var phone = $('#editUserPhone');
	var city  = $('#editUserCity');
	var id    = $('#editUserId');
	var token = $('input[name=_token]');

	var data = {
		name:  name.val(),
		email: email.val(),
		phone: phone.val(),
		city:  city.val(),
		id:  id.val(),
	};


	var url = '';
	if(data.id){
		url = '/' + data.id;
	}
	
	$.ajax({
		url: $('#userForm').attr('action') + url,
		method: 'post',
		headers: {
		    'X-CSRF-TOKEN': token.val()
		},
		data: data,
		error: function (data) {

		    if (data.status === 422) {
		    	 $('#name_error').html(data.responseJSON.errors.name);
		         $('#email_error').html(data.responseJSON.errors.email);
		         $('#phone_error').html(data.responseJSON.errors.phone);
		         $('#city_error').html(data.responseJSON.errors.city);
		    } 
		},
		success: function(data){
			$('#successMessage').removeClass('hide').html(url ? 'User Updated Successfully' : 'User Created Successfully');
			$('#users').html(data);
		         setTimeout(function(){ 
		         	$('#successMessage').addClass('hide');
		         	$('#exampleModal').modal('hide');
		         }, 1000);
		}
	});
});