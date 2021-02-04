var users_dtb = $("#users_dtb").DataTable({ 
        ajax: globalUrl + "/json/users.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "username" },//2
            { "data": "email" },//3
            { "data": "access_level" },//4
            { "data": "site" },//5
            { "data": "created_at" },//6
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="DEACTIVATE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 4,
                "render": function ( data, type, full, meta ) {
                    return team_name(data);      
                }
            },
            {
                "targets": 6,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        pageLength: -1,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        ordering: true
    });

users_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (users_dtb.cell(this).index().column > 1) {
            let t = users_dtb.row(this).data();

            $("#e_id").val(t.id);
            $("#e_name").val(t.name);
            $("#e_username").val(t.username);
            $("#e_password").val(t.password);
            $("#e_email").val(t.email);
            $("#e_team_id").val(t.access_level);
            $("#e_site").val(t.site);
            
            $("#mEditUser").modal('toggle');
        }
        
    });

users_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (users_dtb.cell(this).index().column > 1) {
            let t = users_dtb.row(this).data();

            $("#d_id").val(t.id);
            $("#account_name").html(t.name);
            
            $("#mDeleteUser").modal('toggle');
        }
        
    });

var mit_task_dtb = $("#tasks_mit_dtb").DataTable({ 
        ajax: globalUrl + "/json/mit_task.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

mit_task_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (mit_task_dtb.cell(this).index().column > 1) {
            let t = mit_task_dtb.row(this).data();

            $("#e_id").val(t.id);
            $("#e_name").val(t.name);
            $("#e_description").val(t.description);
            
            $("#mEditTask").modal('toggle');
        }
        
    });

mit_task_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (mit_task_dtb.cell(this).index().column > 1) {
            let t = mit_task_dtb.row(this).data();

            $("#d_id").val(t.id);
            $("#account_name").html(t.name);
            
            $("#mDeleteTask").modal('toggle');
        }
        
    });

mit_task_dtb.on('dblclick', 'tbody tr', function() {
        
        let t = mit_task_dtb.row(this).data();

        $.post(globalUrl + '/subtasks/load', 
            {
                _token: globalToken,
                _method: 'POST',
                id: t.id,
                type: "mit"

            }, function(data, textStatus, xhr) {

                refresh_datatable("subtasks_mit_dtb");
        });

        $("#t_id").val(t.id);
        $("#t_name").val(t.name);
        $("#sub_task_id").val(t.id);
        $("#e_sub_task_id").val(t.id);
        $("#mit_subtask_text").html(t.name);
        $("#mit_subtask").show(500);
        $("#mit_outcome").hide(500);
        $("#mit_saletype").hide(500);
        
    });

var mit_subtask_dtb = $("#subtasks_mit_dtb").DataTable({ 
        ajax: globalUrl + "/json/mit_subtask.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

mit_subtask_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (mit_subtask_dtb.cell(this).index().column > 1) {
            let t = mit_subtask_dtb.row(this).data();

            $("#e_subtask_id").val(t.id);
            $("#e_subtask_name").val(t.name);
            $("#e_subtask_description").val(t.description);
            
            $("#mEditSubTask").modal('toggle');
        }
        
    });

mit_subtask_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (mit_subtask_dtb.cell(this).index().column > 1) {
            let t = mit_subtask_dtb.row(this).data();

            $("#d_subtask_id").val(t.id);
            $("#subtask_account_name").html(t.name);
            
            $("#mDeleteSubTask").modal('toggle');
        }
        
    });

mit_subtask_dtb.on('dblclick', 'tbody tr', function() {
        
        let t = mit_subtask_dtb.row(this).data();

        $.post(globalUrl + '/outcomes/load', 
            {
                _token: globalToken,
                _method: 'POST',
                task_id: $("#t_id").val(),
                subtask_id: t.id,
                type: "mit"

            }, function(data, textStatus, xhr) {

                refresh_datatable("outcomes_mit_dtb");
        });

        $("#outcome_subtask_id").val(t.id);

        $("#mit_outcome_task_text").html($("#t_name").val()+" ");
        $("#mit_outcome_subtask_text").html(t.name);
        $("#st_id").val(t.id);
        $("#st_name").val(t.name);
        $("#mit_outcome").show(500);
        $("#mit_saletype").hide(500);
        
    });

var mit_outcome_dtb = $("#outcomes_mit_dtb").DataTable({ 
        ajax: globalUrl + "/json/mit_outcome.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

mit_outcome_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (mit_outcome_dtb.cell(this).index().column > 1) {
            let t = mit_outcome_dtb.row(this).data();

            $("#e_outcome_id").val(t.id);
            $("#e_outcome_name").val(t.name);
            $("#e_outcome_description").val(t.description);
            
            $("#mEditOutcome").modal('toggle');
        }
        
    });

mit_outcome_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (mit_outcome_dtb.cell(this).index().column > 1) {
            let t = mit_outcome_dtb.row(this).data();

            $("#d_outcome_id").val(t.id);
            $("#outcome_account_name").html(t.name);
            
            $("#mDeleteOutcome").modal('toggle');
        }
        
    });

mit_outcome_dtb.on('dblclick', 'tbody tr', function() {
        
        let t = mit_outcome_dtb.row(this).data();

        $.post(globalUrl + '/saletypes/load', 
            {
                _token: globalToken,
                _method: 'POST',
                task_id: $("#t_id").val(),
                subtask_id: $("#st_id").val(),
                outcome_id: t.id,
                type: "mit"

            }, function(data, textStatus, xhr) {

                refresh_datatable("saletypes_mit_dtb");
        });

        $("#mit_saletype_task_text").html($("#t_name").val()+" ");
        $("#mit_saletype_subtask_text").html($("#st_name").val()+" ");
        $("#mit_saletype_outcome_text").html(t.name);
        $("#o_id").val(t.id);
        $("#o_name").val(t.name);
        $("#mit_saletype").show(500);
        
    });

var mit_saletype_dtb = $("#saletypes_mit_dtb").DataTable({ 
        ajax: globalUrl + "/json/mit_saletype.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

mit_saletype_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (mit_saletype_dtb.cell(this).index().column > 1) {
            let t = mit_saletype_dtb.row(this).data();

            $("#e_saletype_id").val(t.id);
            $("#e_saletype_name").val(t.name);
            $("#e_saletype_description").val(t.description);
            
            $("#mEditSaleType").modal('toggle');
        }
        
    });

mit_saletype_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (mit_saletype_dtb.cell(this).index().column > 1) {
            let t = mit_saletype_dtb.row(this).data();

            $("#d_saletype_id").val(t.id);
            $("#saletype_account_name").html(t.name);
            
            $("#mDeleteSaleType").modal('toggle');
        }
        
    });

var qa_task_dtb = $("#tasks_qa_dtb").DataTable({ 
        ajax: globalUrl + "/json/qa_task.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

qa_task_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (qa_task_dtb.cell(this).index().column > 1) {
            let t = qa_task_dtb.row(this).data();

            $("#e_id").val(t.id);
            $("#e_name").val(t.name);
            $("#e_description").val(t.description);
            
            $("#mEditTask").modal('toggle');
        }
        
    });

qa_task_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (qa_task_dtb.cell(this).index().column > 1) {
            let t = qa_task_dtb.row(this).data();

            $("#d_id").val(t.id);
            $("#account_name").html(t.name);
            
            $("#mDeleteTask").modal('toggle');
        }
        
    });

qa_task_dtb.on('dblclick', 'tbody tr', function() {
        
        let t = qa_task_dtb.row(this).data();

        $.post(globalUrl + '/subtasks/load', 
            {
                _token: globalToken,
                _method: 'POST',
                id: t.id,
                type: "qa"

            }, function(data, textStatus, xhr) {

                refresh_datatable("subtasks_qa_dtb");
        });

        $("#sub_task_id").val(t.id);
        $("#e_sub_task_id").val(t.id);
        $("#qa_subtask_text").html(t.name);
        $("#qa_subtask").show(500);
        
    });

var qa_subtask_dtb = $("#subtasks_qa_dtb").DataTable({ 
        ajax: globalUrl + "/json/qa_subtask.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

qa_subtask_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (qa_subtask_dtb.cell(this).index().column > 1) {
            let t = qa_subtask_dtb.row(this).data();

            $("#e_subtask_id").val(t.id);
            $("#e_subtask_name").val(t.name);
            $("#e_subtask_description").val(t.description);
            
            $("#mEditSubTask").modal('toggle');
        }
        
    });

qa_subtask_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (qa_subtask_dtb.cell(this).index().column > 1) {
            let t = qa_subtask_dtb.row(this).data();

            $("#d_subtask_id").val(t.id);
            $("#subtask_account_name").html(t.name);
            
            $("#mDeleteSubTask").modal('toggle');
        }
        
    });

var gd_task_dtb = $("#tasks_gd_dtb").DataTable({ 
        ajax: globalUrl + "/json/gd_task.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

gd_task_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (gd_task_dtb.cell(this).index().column > 1) {
            let t = gd_task_dtb.row(this).data();

            $("#e_id").val(t.id);
            $("#e_name").val(t.name);
            $("#e_description").val(t.description);
            
            $("#mEditTask").modal('toggle');
        }
        
    });

gd_task_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (gd_task_dtb.cell(this).index().column > 1) {
            let t = gd_task_dtb.row(this).data();

            $("#d_id").val(t.id);
            $("#account_name").html(t.name);
            
            $("#mDeleteTask").modal('toggle');
        }
        
    });

var gd_image_dtb = $("#images_gd_dtb").DataTable({ 
        ajax: globalUrl + "/json/gd_image.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

gd_image_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (gd_image_dtb.cell(this).index().column > 1) {
            let t = gd_image_dtb.row(this).data();

            $("#e_image_id").val(t.id);
            $("#e_image_name").val(t.name);
            $("#e_image_description").val(t.description);
            
            $("#mEditImage").modal('toggle');
        }
        
    });

gd_image_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (gd_image_dtb.cell(this).index().column > 1) {
            let t = gd_image_dtb.row(this).data();

            $("#d_image_id").val(t.id);
            $("#image_account_name").html(t.name);
            
            $("#mDeleteImage").modal('toggle');
        }
        
    });

var gd_difficulty_dtb = $("#difficulties_gd_dtb").DataTable({ 
        ajax: globalUrl + "/json/gd_difficulty.json",
        columns: [
            { "data": "id"},//0
            { "data": "name" },//1
            { "data": "description" },//2
            { "data": "added_by" },//3
            { "data": "last_update" },//4
            { "data": "updated_at" },//5
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                }
            },
            { 
              "data": null,
              "className": "deleteBtn",
              "render": function ( data, type, full, meta ) {
                    return '<input type="button" class="btn btn-danger" value="REMOVE">';
                }
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    return convertDate(data);      
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

gd_difficulty_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (gd_difficulty_dtb.cell(this).index().column > 1) {
            let t = gd_difficulty_dtb.row(this).data();

            $("#e_difficulty_id").val(t.id);
            $("#e_difficulty_name").val(t.name);
            $("#e_difficulty_description").val(t.description);
            
            $("#mEditDifficulty").modal('toggle');
        }
        
    });

gd_difficulty_dtb.on('click', 'tbody tr td.deleteBtn', function() {
        
        if (gd_difficulty_dtb.cell(this).index().column > 1) {
            let t = gd_difficulty_dtb.row(this).data();

            $("#d_difficulty_id").val(t.id);
            $("#difficulty_account_name").html(t.name);
            
            $("#mDeleteDifficulty").modal('toggle');
        }
        
    });

var log_dtb = $("#logs_dtb").DataTable({ 
        ajax: globalUrl + "/json/log.json",
        columns: [
            { "data": "id"},//0
            { "data": "tracker_type" },//1
            { "data": "activity_type" },//2
            { "data": "log_details" },//3
            { "data": "name" },//4
            { "data": "description" },//5
            { "data": "added_by" },//6
            { "data": "created_at" },//7
            
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 1,
                "render": function ( data, type, full, meta ) {
                    if(data == "mit"){
                        return '<span class="label label-success label-rouded">MIT</span>';
                    }else if(data == "qa"){
                        return '<span class="label label-primary label-rouded">QA</span>';
                    }else if(data == "gd"){
                        return '<span class="label label-warning label-rouded">GD</span>';
                    }   
                }
            },
            {
                "targets": 2,
                "render": function ( data, type, full, meta ) {
                    if(data == "CREATE"){
                        return '<span class="label label-default label-rouded">CREATE</span>';
                    }else if(data == "MODIFY"){
                        return '<span class="label label-primary label-rouded">MODIFY</span>';
                    }else if(data == "REMOVE"){
                        return '<span class="label label-danger label-rouded">REMOVE</span>';
                    }   
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

var qa_tracks_dtb = $("#qa_tracks_dtb").DataTable({ 
        ajax: globalUrl + "/json/qa_tracker.json",
        columns: [
            { "data": "id"},//0
            { "data": "added_by" },//1
            { "data": "created_at" },//2
            { "data": "created_at" },//3
            { "data": "task" },//4
            { "data": "subtask" },//5
            { "data": "trans_stamp" },//6
            { "data": "notes" },//7
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    if (current_date.toDateString() == new Date().toDateString())
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                    else
                    return '';
                }
            },
            
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 2,
                "render": function ( data, type, full, meta ) {
                    return splitDate(data,0);
                }
            },
            {
                "targets": 3,
                "render": function ( data, type, full, meta ) {
                    return splitDate(data,1);
                }
            },
            {
                "targets": 4,
                "render": function ( data, type, full, meta ) {
                    return data.name;
                }
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    if(data){
                        return data.name;  
                    } else{
                        return "";
                    } 
                     
                }
            },
            {
                "targets": 6,
                "render": function ( data, type, full, meta ) {
                    if(data == "Start"){
                        return '<span class="label label-success label-rouded">Start</span>';
                    }else if(data == "End"){
                        return '<span class="label label-primary label-rouded">End</span>';
                    }
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

var gd_tracks_dtb = $("#gd_tracks_dtb").DataTable({ 
        ajax: globalUrl + "/json/gd_tracker.json",
        columns: [
            { "data": "id"},//0
            { "data": "added_by" },//1
            { "data": "created_at" },//2
            { "data": "created_at" },//3
            { "data": "task" },//4
            { "data": "image" },//5
            { "data": "difficulty" },//6
            { "data": "ticket_id" },//6
            { "data": "sku" },//6
            { "data": "notes" },//7
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    if (current_date.toDateString() == new Date().toDateString())
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                    else
                    return '';
                }
            },
            
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 2,
                "render": function ( data, type, full, meta ) {
                    return splitDate(data,0);
                }
            },
            {
                "targets": 3,
                "render": function ( data, type, full, meta ) {
                    return splitDate(data,1);
                }
            },
            {
                "targets": 4,
                "render": function ( data, type, full, meta ) {
                    return data.name;
                }
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    if(data){
                        return data.name;  
                    } else{
                        return "";
                    } 
                     
                }
            },
            {
                "targets": 6,
                "render": function ( data, type, full, meta ) {
                    if(data){
                        return data.name;  
                    } else{
                        return "";
                    } 
                     
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

var mit_tracks_dtb = $("#mit_tracks_dtb").DataTable({ 
        ajax: globalUrl + "/json/mit_tracker.json",
        columns: [
            { "data": "id"},//0
            { "data": "added_by" },//1
            { "data": "created_at" },//2
            { "data": "created_at" },//3
            { "data": "task" },//4
            { "data": "subtask" },//5
            { "data": "outcome" },//6
            { "data": "saletype" },//7
            { "data": "order_id" },//8
            { "data": "ticket_id" },//9
            { "data": "notes" },//10
            { 
              "data": null,
              "className": "editBtn",
              "render": function ( data, type, full, meta ) {
                    if (current_date.toDateString() == new Date().toDateString())
                    return '<input type="button" class="btn btn-info" value="EDIT">';
                    else
                    return '';
                }
            },
            
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": 2,
                "render": function ( data, type, full, meta ) {
                    return splitDate(data,0);
                }
            },
            {
                "targets": 3,
                "render": function ( data, type, full, meta ) {
                    return splitDate(data,1);
                }
            },
            {
                "targets": 4,
                "render": function ( data, type, full, meta ) {
                    return data.name;
                }
            },
            {
                "targets": 5,
                "render": function ( data, type, full, meta ) {
                    if(data){
                        return data.name;  
                    } else{
                        return "";
                    } 
                     
                }
            },
            {
                "targets": 6,
                "render": function ( data, type, full, meta ) {
                    if(data){
                        return data.name;  
                    } else{
                        return "";
                    } 
                     
                }
            },
            {
                "targets": 7,
                "render": function ( data, type, full, meta ) {
                    if(data){
                        return data.name;  
                    } else{
                        return "";
                    } 
                     
                }
            },
        ],
        deferRender: true,
        bPaginate: true,
        bLengthChange: true,
        info: true,
        order: [],
        ordering: true
    });

qa_tracks_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (qa_tracks_dtb.cell(this).index().column > 1) {
            let t = qa_tracks_dtb.row(this).data();
            $("#editTrackQA_edit").val(t.id);
            $("#e_task_select_qa").val(t.task_id).change();
            $("#e_stamp_qa").val(t.trans_stamp);
            $("#e_notes_qa").val(t.notes);

            setTimeout(function(){
                $("#e_subtask_select_qa").val(t.subtask_id);
            }, 1500);

            
            $("#mEditTrackQA").modal('toggle');
        }
        
    });

gd_tracks_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (gd_tracks_dtb.cell(this).index().column > 1) {
            let t = gd_tracks_dtb.row(this).data();
            $("#editTrackGD_edit").val(t.id);
            $("#e_task_select_gd").val(t.task_id);
            $("#e_image_select_gd").val(t.image_id);
            $("#e_difficulty_select_gd").val(t.difficulty_id);
            $("#e_ticket_text_gd").val(t.ticket_id);
            $("#e_sku_text_gd").val(t.sku);
            $("#e_notes_gd").val(t.notes);
            
            $("#mEditTrackGD").modal('toggle');
        }
        
    });

mit_tracks_dtb.on('click', 'tbody tr td.editBtn', function() {
        
        if (mit_tracks_dtb.cell(this).index().column > 1) {
            let t = mit_tracks_dtb.row(this).data();
            $("#editTrackGD_edit").val(t.id);
            $("#e_task_select_gd").val(t.task_id);
            $("#e_image_select_gd").val(t.image_id);
            $("#e_difficulty_select_gd").val(t.difficulty_id);
            $("#e_ticket_text_gd").val(t.ticket_id);
            $("#e_sku_text_gd").val(t.sku);
            $("#e_notes_gd").val(t.notes);
            
            $("#mEditTrackGD").modal('toggle');
        }
        
    });


$(".dataTables_filter").addClass('pull-right');
