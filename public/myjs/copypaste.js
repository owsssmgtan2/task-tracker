$('#addCopyPaste').submit(function(e) {

	e.preventDefault();

	showspinner("addCopyPaste");
	$.post(globalUrl + '/outcomes/paste', 
		{
			_token: globalToken,
			_method: 'POST',
			o_list: $("#o_list").val(),
			t_id: $("#t_id").val(),
			st_id: $("#st_id").val()

		}, function(data, textStatus, xhr) {

				refresh_datatable("outcomes_mit_dtb");
				hidespinner("addCopyPaste");
				show_alertbox('New outcomes save from the clipboard.','mAddCopyPaste','add');

	});
});

$('#addCopyPaste2').submit(function(e) {

	e.preventDefault();

	showspinner("addCopyPaste2");
	$.post(globalUrl + '/saletypes/paste', 
		{
			_token: globalToken,
			_method: 'POST',
			s_list: $("#s_list").val(),
			t_id: $("#t_id").val(),
			st_id: $("#st_id").val(),
			o_id: $("#o_id").val()

		}, function(data, textStatus, xhr) {

				refresh_datatable("saletypes_mit_dtb");
				hidespinner("addCopyPaste2");
				show_alertbox('New sale types save from the clipboard.','mAddCopyPaste2','add');

	});
});

$("#mAddCopyPaste").on('show.bs.modal', function(event) {

	$.post(globalUrl + '/outcomes/show', 
		{
			_token: globalToken,
			_method: 'POST',
			o_list: $("#o_list").val()

		}, function(data, textStatus, xhr) {
			removeChild("paste_table");
			$("#paste_table").append(data);

	});
});

$("#mAddCopyPaste2").on('show.bs.modal', function(event) {

	$.post(globalUrl + '/saletypes/show', 
		{
			_token: globalToken,
			_method: 'POST',
			s_list: $("#s_list").val()

		}, function(data, textStatus, xhr) {
			removeChild("paste_table2");
			$("#paste_table2").append(data);

	});
});