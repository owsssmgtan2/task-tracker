$(document).on('change','#task_select_qa',function(){
    $.post(globalUrl + '/tracks/subtaskchange', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		id: $("#task_select_qa").val()

    	}, function(data, textStatus, xhr) {
    			removeChild("subtask_select_qa");
    			$("#subtask_select_qa").append(data);

    });
});

$(document).on('change','#e_task_select_qa',function(){
    $.post(globalUrl + '/tracks/subtaskchange', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		id: $("#e_task_select_qa").val()

    	}, function(data, textStatus, xhr) {
    			removeChild("e_subtask_select_qa");
    			$("#e_subtask_select_qa").append(data);

    });
});

$(document).on('change','#choosedate',function(){
    $.post(globalUrl + '/tracks/changedate', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		newdate: $("#choosedate").val()

    	}, function(data, textStatus, xhr) {
    		refresh_datatable("qa_tracks_dtb");
    });
});

$('#addTransactionQA').submit(function(e) {

	e.preventDefault();

	let st = "";

	if($("#subtask_select_qa").val()){
		st = $("#subtask_select_qa").val();
	}else{
		st = 0;
	}

	showspinner("addTransactionQA");
	$.post(globalUrl + '/tracks/saveqatransaction', 
		{
			_token: globalToken,
			_method: 'POST',
			task_id: $("#task_select_qa").val(),
			subtask_id: st,
			trans_stamp: $("#stamp_qa").val(),
			notes: $("#notes_qa").val()

		}, function(data, textStatus, xhr) {
			refresh_datatable("qa_tracks_dtb");
			hidespinner("addTransactionQA");
			show_alertbox('You added a new transaction.','','add');

	});
});

$('#editTrackQA').submit(function(e) {

	e.preventDefault();

	let st = "";

	if($("#e_subtask_select_qa").val()){
		st = $("#e_subtask_select_qa").val();
	}else{
		st = 0;
	}

	showspinner("editTrackQA");
	$.post(globalUrl + '/tracks/editqatransaction/' + $("#editTrackQA_edit").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			task_id: $("#e_task_select_qa").val(),
			subtask_id: st,
			trans_stamp: $("#e_stamp_qa").val(),
			notes: $("#e_notes_qa").val()

		}, function(data, textStatus, xhr) {
			refresh_datatable("qa_tracks_dtb");
			hidespinner("editTrackQA");
			show_alertbox('You edited a transaction.','mEditTrackQA','edit');

	});
});