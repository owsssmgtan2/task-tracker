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

			hidespinner("addTransactionQA");
			show_alertbox('You added a new transaction.','','add');

	});
});