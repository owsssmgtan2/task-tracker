$('#addDifficulty').submit(function(e) {

	e.preventDefault();

	showspinner("addDifficulty");
	$.post(globalUrl + '/difficulties/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#gd_difficulty_name").val(),
			description: $("#gd_difficulty_description").val(),

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("difficulties_gd_dtb");
				hidespinner("addDifficulty");
				show_alertbox('You added a new difficulty.','mAddDifficulty','add');

	});
});

$('#editDifficulty').submit(function(e) {

	e.preventDefault();

	showspinner("editDifficulty");
	$.post(globalUrl + '/difficulties/update/' + $("#e_difficulty_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_difficulty_name").val(),
			description: $("#e_difficulty_description").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("difficulties_gd_dtb");
				hidespinner("editDifficulty");
				show_alertbox('You edited a difficulty.','mEditDifficulty','edit');

	});
});

$('#deleteDifficulty').submit(function(e) {

	e.preventDefault();

	showspinner("deleteDifficulty");
	$.post(globalUrl + '/difficulties/delete/' + $("#d_difficulty_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("difficulties_gd_dtb");
				hidespinner("deleteDifficulty");
				show_alertbox('You removed a difficulty.','mDeleteDifficulty','delete');

	});
});