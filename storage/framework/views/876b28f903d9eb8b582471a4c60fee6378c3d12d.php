<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo e(url('theme/plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(url('theme/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo e(url('theme/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')); ?>"></script>
<!--slimscroll JavaScript -->
<script src="<?php echo e(url('theme/js/jquery.slimscroll.js')); ?>"></script>
<!--Wave Effects -->
<script src="<?php echo e(url('theme/js/waves.js')); ?>"></script>
<!--Counter js -->
<script src="<?php echo e(url('theme/plugins/bower_components/waypoints/lib/jquery.waypoints.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/bower_components/counterup/jquery.counterup.min.js')); ?>"></script>
<!-- chartist chart -->
<script src="<?php echo e(url('theme/plugins/bower_components/chartist-js/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
<!-- Sparkline chart JavaScript -->
<script src="<?php echo e(url('theme/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo e(url('theme/js/custom.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/js/dashboard1.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/bower_components/toast-master/js/jquery.toast.js')); ?>"></script>

<!-- Plugins -->
<script src="<?php echo e(url('theme/plugins/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/datatable/datatables-buttons.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/datatable/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/datatable/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/fontawesome/js/fontawesome-all.min.js')); ?>"></script>

<script>
	var globalUrl = "<?php echo e(url('/')); ?>";
	var globalToken = "<?php echo e(csrf_token()); ?>";

  var current_date = new Date();

	var monthNames = [
      "January", "February", "March",
      "April", "May", "June", "July",
      "August", "September", "October",
      "November", "December"
    ];

	function team_name(access_level){
		if(access_level == 1){
			return "IT";
		}else if(access_level == 2){
			return "MIT - ADMIN";
		}else if(access_level == 3){
			return "MIT - STAFF";
		}else if(access_level == 4){
			return "QA - ADMIN";
		}else if(access_level == 5){
			return "QA - STAFF";
		}else if(access_level == 6){
			return "GD - ADMIN";
		}else if(access_level == 7){
			return "GD - STAFF";
		}else if(access_level == 8){
			return "REPORTS";
		}
	}

	function convertDate(created_at){
        var date = new Date(created_at);

        return monthNames[date.getMonth()] + " " + date.getDate() + ", " + date.getFullYear();
    }

    function showspinner(form_id){
    	$("#" + form_id + " .fa-spinner").css("visibility","visible");
    }

    function hidespinner(form_id){
    	$("#" + form_id + " .fa-spinner").css("visibility","hidden");
    	document.getElementById(form_id).reset();
    }

    function showspinner_summary(class_name){
      $("." + class_name).css("visibility","visible");
    }

    function hidespinner_summary(class_name){
      $("." + class_name).css("visibility","hidden");
    }

    function refresh_datatable(table_id){
    	$("#" + table_id).DataTable().ajax.reload();
    }

    function swal_success(str){
        swal('Good!', str, 'success');
    }

    function show_alertbox(str,str2,type){
      if(str2){
        $("#" + str2).modal('toggle');
      }
    	
      if(type == "add"){
          $("#panel_container_add").show();
          $("#panel_content_add").html(str);

          setTimeout(function(){ 
              $("#panel_container_add").fadeOut(1000);
           }, 3000);

      }else if(type == "edit"){
          $("#panel_container_edit").show();
          $("#panel_content_edit").html(str);

          setTimeout(function(){ 
              $("#panel_container_edit").fadeOut(1000);
           }, 3000);

      }else if(type == "delete"){
          $("#panel_container_delete").show();
          $("#panel_content_delete").html(str);

          setTimeout(function(){ 
              $("#panel_container_delete").fadeOut(1000);
           }, 3000);
      }
    	
    }

    function show_alertbox2(str){

            $("#panel_container_paste").show();
            $("#panel_content_paste").html(str);

            setTimeout(function(){ 
                $("#panel_container_paste").fadeOut(1000);
             }, 3000);

        
    }

    function loop_table(dtable,list,strz){
        tbl = $('#' + dtable).DataTable();

        let str = '';

        tbl.rows().every(function () {

          let t;

          if(list == "o_list"){
            t = mit_outcome_dtb.row(this).data();
          }
          
          else if(list == "s_list"){
            t = mit_saletype_dtb.row(this).data();
          }
          

          str = str + t.id + ",";
        });

        $("#" + list).val(str);
        show_alertbox2(strz);
    }

    function removeChild(str)
    {
      let tbody = document.getElementById(str);
      while(tbody.firstChild)
      {
        tbody.removeChild(tbody.firstChild);
      }
    }

    function splitDate(date,num){
      let split_result = date.split(" ");

      if(num == 0){
        return convertDate(split_result[num]);
      }else{
        return split_result[num];
      }
    }

    function clearTracker(id)
    {
      document.getElementById(id).reset();
      removeChild("subtask_select_qa");
    }

    // // jQuery plugin. Called on a jQuery object, not directly.
    // jQuery.fn.simulateKeyPress = function (character) {
    //   // Internally calls jQuery.event.trigger with arguments (Event, data, elem).
    //   // That last argument, 'elem', is very important!
    //   jQuery(this).trigger({ type: 'keypress', which: character.charCodeAt(0) });
    // };

    // jQuery(function ($) {
    //   // Bind event handler
    //   $('#notes_qa').keypress(function (e) {
    //   });
    //   // Simulate the key press
    //   $('#notes_qa').simulateKeyPress('o');
    //   $('#notes_qa').simulateKeyPress('s');
    //   $('#notes_qa').simulateKeyPress('e');
    // });


</script>

<script src="<?php echo e(url('myjs/main.js')); ?>"></script>
<script src="<?php echo e(url('myjs/users.js')); ?>"></script>
<script src="<?php echo e(url('myjs/tasks.js')); ?>"></script>
<script src="<?php echo e(url('myjs/subtasks.js')); ?>"></script>
<script src="<?php echo e(url('myjs/images.js')); ?>"></script>
<script src="<?php echo e(url('myjs/difficulties.js')); ?>"></script>
<script src="<?php echo e(url('myjs/outcomes.js')); ?>"></script>
<script src="<?php echo e(url('myjs/saletypes.js')); ?>"></script>
<script src="<?php echo e(url('myjs/copypaste.js')); ?>"></script>
<script src="<?php echo e(url('myjs/trackers.js')); ?>"></script>



