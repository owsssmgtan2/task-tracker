$('#addUser').submit(function(e) {

	e.preventDefault();

	showspinner("addUser");
	$.post(globalUrl + '/users/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#name").val(),
			username: $("#username").val(),
			password: $("#password").val(),
			email: $("#email").val(),
			team_id: $("#team_id").val(),
			site: $("#site").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("users_dtb");
				hidespinner("addUser");
				show_alertbox('You added a new user.','mAddUser','add');

	});
});


$('#editUser').submit(function(e) {

	e.preventDefault();

	showspinner("editUser");
	$.post(globalUrl + '/users/update/' + $("#e_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_name").val(),
			username: $("#e_username").val(),
			password: $("#e_password").val(),
			email: $("#e_email").val(),
			team_id: $("#e_team_id").val(),
			site: $("#e_site").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("users_dtb");
				hidespinner("editUser");
				show_alertbox('You modified the info of an user.','mEditUser','edit');

	});
});

$('#deleteUser').submit(function(e) {

	e.preventDefault();

	showspinner("deleteUser");
	$.post(globalUrl + '/users/delete/' + $("#d_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("users_dtb");
				hidespinner("deleteUser");
				show_alertbox('You deactivated a user.','mDeleteUser','delete');

	});
});