$('#addSaleType').submit(function(e) {

	e.preventDefault();

	showspinner("addSaleType");
	$.post(globalUrl + '/saletypes/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#saletype_name").val(),
			description: $("#saletype_description").val(),
			type: "mit",
			task_id: $("#t_id").val(),
			subtask_id: $("#st_id").val(),
			outcome_id: $("#o_id").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("saletypes_mit_dtb");
				hidespinner("addSaleType");
				show_alertbox('You added a new sale type.','mAddSaleType','add');

	});
});

$('#editSaleType').submit(function(e) {

	e.preventDefault();

	showspinner("editSaleType");
	$.post(globalUrl + '/saletypes/update/' + $("#e_saletype_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_saletype_name").val(),
			description: $("#e_saletype_description").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("saletypes_mit_dtb");
				hidespinner("editSaleType");
				show_alertbox('You edited a sale type.','mEditSaleType','edit');

	});
});

$('#deleteSaleType').submit(function(e) {

	e.preventDefault();

	showspinner("deleteSaleType");
	$.post(globalUrl + '/saletypes/delete/' + $("#d_saletype_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("saletypes_mit_dtb");
				hidespinner("deleteSaleType");
				show_alertbox('You deleted a saletype.','mDeleteSaleType','delete');

	});
});