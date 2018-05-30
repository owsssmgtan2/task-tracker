$("#mAddSubTask").on('show.bs.modal', function(event) {
		let anchorTag = $(event.relatedTarget);
        $("#sub_task_type").val(anchorTag.data("type")); 
});

$('#addSubTask').submit(function(e) {

	e.preventDefault();

	showspinner("addSubTask");
	$.post(globalUrl + '/subtasks/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#sub_name").val(),
			description: $("#sub_description").val(),
			type: $("#sub_task_type").val(),
			id: $("#sub_task_id").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("subtasks_mit_dtb");
				refresh_datatable("subtasks_qa_dtb");
				hidespinner("addSubTask");
				show_alertbox('You added a new subtask.','mAddSubTask','add');

	});
});

$('#editSubTask').submit(function(e) {

	e.preventDefault();

	showspinner("editSubTask");
	$.post(globalUrl + '/subtasks/update/' + $("#e_subtask_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_subtask_name").val(),
			description: $("#e_subtask_description").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("subtasks_mit_dtb");
				refresh_datatable("subtasks_qa_dtb");
				hidespinner("editSubTask");
				show_alertbox('You edited a subtask.','mEditSubTask','edit');

	});
});

$('#deleteSubTask').submit(function(e) {

	e.preventDefault();

	showspinner("deleteSubTask");
	$.post(globalUrl + '/subtasks/delete/' + $("#d_subtask_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("subtasks_mit_dtb");
				refresh_datatable("subtasks_qa_dtb");
				hidespinner("deleteSubTask");
				show_alertbox('You deleted a subtask.','mDeleteSubTask','delete');
				$("#mit_outcome").hide(500);
				$("#mit_saletype").hide(500);

	});
});