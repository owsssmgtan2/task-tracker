$("#mAddTask").on('show.bs.modal', function(event) {
		let anchorTag = $(event.relatedTarget);
        $("#task_type").val(anchorTag.data("type")); 
});

$('#addTask').submit(function(e) {

	e.preventDefault();

	showspinner("addTask");
	$.post(globalUrl + '/tasks/create', 
		{
			_token: globalToken,
			_method: 'POST',
			name: $("#name").val(),
			description: $("#description").val(),
			type: $("#task_type").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("tasks_mit_dtb");
				refresh_datatable("tasks_qa_dtb");
				refresh_datatable("tasks_gd_dtb");
				hidespinner("addTask");
				show_alertbox('You added a new task.','mAddTask','add');

	});
});

$('#editTask').submit(function(e) {

	e.preventDefault();

	showspinner("editTask");
	$.post(globalUrl + '/tasks/update/' + $("#e_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			name: $("#e_name").val(),
			description: $("#e_description").val()

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("tasks_mit_dtb");
				refresh_datatable("tasks_qa_dtb");
				refresh_datatable("tasks_gd_dtb");
				hidespinner("editTask");
				show_alertbox('You edited a task.','mEditTask','edit');

	});
});

$('#deleteTask').submit(function(e) {

	e.preventDefault();

	showspinner("deleteTask");
	$.post(globalUrl + '/tasks/delete/' + $("#d_id").val(), 
		{
			_token: globalToken,
			_method: 'PATCH'

		}, function(data, textStatus, xhr) {
				
				refresh_datatable("tasks_mit_dtb");
				refresh_datatable("tasks_qa_dtb");
				refresh_datatable("tasks_gd_dtb");
				hidespinner("deleteTask");
				show_alertbox('You removed a task.','mDeleteTask','delete');
				$("#mit_subtask").hide(500);
				$("#qa_subtask").hide(500);
				$("#mit_outcome").hide(500);
				$("#mit_saletype").hide(500);


	});
});

function show_qa_summary(){
	showspinner_summary("qa_sum");
	$.post(globalUrl + '/tasks/qasummary', 
		{
			_token: globalToken,
			_method: 'POST'
		}, function(data, textStatus, xhr) {
			removeChild("qa_summary_table");
			$("#qa_summary_table").append(data);
			hidespinner_summary("qa_sum");

	});
}

function show_mit_summary(){
	showspinner_summary("mit_sum");
	$.post(globalUrl + '/tasks/mitsummary', 
			{
				_token: globalToken,
				_method: 'POST'
			}, function(data, textStatus, xhr) {
				removeChild("mit_summary_table");
				$("#mit_summary_table").append(data);
				hidespinner_summary("mit_sum");

		});
}