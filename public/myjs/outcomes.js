$('#addOutcome').submit(function(e) {

	e.preventDefault();

	showspinner("addOutcome");
	$.post(globalUrl + '/outcomes/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#outcome_name").val(),
			description: $("#outcome_description").val(),
			type: "mit",
			task_id: $("#t_id").val(),
			subtask_id: $("#outcome_subtask_id").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("outcomes_mit_dtb");
				hidespinner("addOutcome");
				show_alertbox('You added a new outcome.','mAddOutcome','add');

	});
});

$('#editOutcome').submit(function(e) {

	e.preventDefault();

	showspinner("editOutcome");
	$.post(globalUrl + '/outcomes/update/' + $("#e_outcome_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_outcome_name").val(),
			description: $("#e_outcome_description").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("outcomes_mit_dtb");
				hidespinner("editOutcome");
				show_alertbox('You edited an outcome.','mEditOutcome','edit');

	});
});

$('#deleteOutcome').submit(function(e) {

	e.preventDefault();

	showspinner("deleteOutcome");
	$.post(globalUrl + '/outcomes/delete/' + $("#d_outcome_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("outcomes_mit_dtb");
				hidespinner("deleteOutcome");
				show_alertbox('You deleted an outcome.','mDeleteOutcome','delete');
				$("#mit_saletype").hide(500);

	});
});