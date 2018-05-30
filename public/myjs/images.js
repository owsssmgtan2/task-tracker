$('#addImage').submit(function(e) {

	e.preventDefault();

	showspinner("addImage");
	$.post(globalUrl + '/images/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#gd_image_name").val(),
			description: $("#gd_image_description").val(),

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("images_gd_dtb");
				hidespinner("addImage");
				show_alertbox('You added a new image.','mAddImage','add');

	});
});

$('#editImage').submit(function(e) {

	e.preventDefault();

	showspinner("editImage");
	$.post(globalUrl + '/images/update/' + $("#e_image_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_image_name").val(),
			description: $("#e_image_description").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("images_gd_dtb");
				hidespinner("editImage");
				show_alertbox('You edited an image.','mEditImage','edit');

	});
});

$('#deleteImage').submit(function(e) {

	e.preventDefault();

	showspinner("deleteImage");
	$.post(globalUrl + '/images/delete/' + $("#d_image_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("images_gd_dtb");
				hidespinner("deleteImage");
				show_alertbox('You removed an image.','mDeleteImage','delete');

	});
});