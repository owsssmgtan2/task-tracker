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

$(document).on('change','#task_select_mit',function(){
    $.post(globalUrl + '/tracks/subtaskchange/mit', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		id: $("#task_select_mit").val()

    	}, function(data, textStatus, xhr) {
    			removeChild("subtask_select_mit");
    			removeChild("outcome_select_mit");
    			removeChild("saletype_select_mit");
    			$("#subtask_select_mit").append(data);

    });
});

$(document).on('change','#subtask_select_mit',function(){
    $.post(globalUrl + '/tracks/outcomechange/mit', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		task_id: $("#task_select_mit").val(),
    		subtask_id: $("#subtask_select_mit").val()

    	}, function(data, textStatus, xhr) {
    			removeChild("outcome_select_mit");
    			removeChild("saletype_select_mit");
    			$("#outcome_select_mit").append(data);

    });
});

$(document).on('change','#outcome_select_mit',function(){
    $.post(globalUrl + '/tracks/saletypechange/mit', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		task_id: $("#task_select_mit").val(),
    		subtask_id: $("#subtask_select_mit").val(),
    		outcome_id: $("#outcome_select_mit").val()

    	}, function(data, textStatus, xhr) {
    			removeChild("saletype_select_mit");
    			$("#saletype_select_mit").append(data);

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
	current_date = new Date($("#choosedate").val());
    $.post(globalUrl + '/tracks/changedate', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		newdate: $("#choosedate").val(),
    		type: 'qa'

    	}, function(data, textStatus, xhr) {
    		refresh_datatable("qa_tracks_dtb");
    });
});

$(document).on('change','#choosedate_gd',function(){
	current_date = new Date($("#choosedate_gd").val());
    $.post(globalUrl + '/tracks/changedate', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		newdate: $("#choosedate_gd").val(),
    		type: 'gd'

    	}, function(data, textStatus, xhr) {
    		refresh_datatable("gd_tracks_dtb");
    });
});

$(document).on('change','#choosedate_mit',function(){
	current_date = new Date($("#choosedate_mit").val());
    $.post(globalUrl + '/tracks/changedate', 
    	{
    		_token: globalToken,
    		_method: 'POST',
    		newdate: $("#choosedate_mit").val(),
    		type: 'mit'

    	}, function(data, textStatus, xhr) {
    		refresh_datatable("mit_tracks_dtb");
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
			removeChild("subtask_select_qa");
			show_alertbox('You added a new transaction.','','add');

	});
});

$('#addTransactionGD').submit(function(e) {

	showspinner("addTransactionGD");
	$.post(globalUrl + '/tracks/savegdtransaction', 
		{
			_token: globalToken,
			_method: 'POST',
			task_id: $("#task_select_gd").val(),
			image_id: $("#image_select_gd").val(),
			difficulty_id: $("#difficulty_select_gd").val(),
			sku_id: $("#sku_text_gd").val(),
			ticket_id: $("#ticket_text_gd").val(),
			notes: $("#notes_gd").val()

		}, function(data, textStatus, xhr) {
			refresh_datatable("gd_tracks_dtb");
			hidespinner("addTransactionGD");
			show_alertbox('You added a new transaction.','','add');

	});
});

$('#addTransactionMIT').submit(function(e) {

	e.preventDefault();

	let st = "";

	if($("#saletype_select_mit").val()){
		st = $("#saletype_select_mit").val();
	}else{
		st = 0;
	}

	showspinner("addTransactionMIT");
	$.post(globalUrl + '/tracks/savemittransaction', 
		{
			_token: globalToken,
			_method: 'POST',
			task_id: $("#task_select_mit").val(),
			subtask_id: $("#subtask_select_mit").val(),
			outcome_id: $("#outcome_select_mit").val(),
			saletype_id: st,
			order_id: $("#orderId_text_mit").val(),
			ticket_id: $("#phone_text_mit").val(),
			notes: $("#notes_mit").val()

		}, function(data, textStatus, xhr) {
			refresh_datatable("mit_tracks_dtb");
			hidespinner("addTransactionMIT");
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

$('#editTrackGD').submit(function(e) {

	e.preventDefault();

	showspinner("editTrackGD");
	$.post(globalUrl + '/tracks/editgdtransaction/' + $("#editTrackGD_edit").val(), 
		{
			_token: globalToken,
			_method: 'PATCH',
			task_id: $("#e_task_select_gd").val(),
			image_id: $("#e_image_select_gd").val(),
			difficulty_id: $("#e_difficulty_select_gd").val(),
			sku_id: $("#e_sku_text_gd").val(),
			ticket_id: $("#e_ticket_text_gd").val(),
			notes: $("#e_notes_gd").val()

		}, function(data, textStatus, xhr) {
			refresh_datatable("gd_tracks_dtb");
			hidespinner("editTrackGD");
			show_alertbox('You edited a transaction.','mEditTrackGD','edit');

	});
});