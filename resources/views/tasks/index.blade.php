@extends('layouts.app')

@section('main-content')
	<div class="white-box">

            <!-- Nav tabs -->
            <ul class="nav customtab nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#mittask1" aria-controls="mittask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> MIT Transactions</span></a></li>
                <li role="presentation" class=""><a onclick="show_mit_summary();" href="#mittask2" aria-controls="mittask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Summary</span></a></li>
                <li role="presentation" class=""><a href="#qatask1" aria-controls="qatask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">QA Transactions</span></a></li>
                <li role="presentation" class=""><a href="#qatask2" aria-controls="qatask" role="tab" data-toggle="tab" aria-expanded="false" onclick="show_qa_summary();"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Summary</span></a></li>
                <li role="presentation" class=""><a href="#gdtask1" aria-controls="gdtask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">GD Transactions</span></a></li>
                
                
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="mittask1"> <!-- MIT -->

                	<input type="hidden" id="t_id">
                	<input type="hidden" id="t_name">
                	<input type="hidden" id="st_id">
                	<input type="hidden" id="st_name">
                	<input type="hidden" id="o_id">
                	<input type="hidden" id="o_name">
                	<input type="hidden" id="o_list">
                	<input type="hidden" id="s_list">


                	<h3>@fa('clipboard') MIT TASKS</h3>
					<button data-toggle='modal' data-type="mit" data-target="#mAddTask" class="btn btn-default btn-add">@fa('plus') ADD MIT TASK</button>

		            <div class="table-responsive">
		                <table class="table table-hover" id="tasks_mit_dtb">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>NAME</th>
		                            <th>DESCRIPTION</th>
		                            <th>ADDED BY</th>
		                            <th>LAST UPDATE BY</th>
		                            <th>LAST UPDATE DATE</th>
		                            <th>MODIFY?</th>
		                            <th>REMOVE?</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        
		                    </tbody>
		                </table>
		            </div>

		            <div id="mit_subtask" class="subtask">

		            	<h3>@fa('clipboard-list') SUBTASKS FOR <span id="mit_subtask_text" class="blue-text"></span> </h3>
			            <button id="btn_mit_subtask" data-toggle='modal' data-type="mit" data-target="#mAddSubTask" class="btn btn-default btn-add">@fa('plus') ADD MIT SUBTASK</button>

			            <div class="table-responsive">
			                <table class="table table-hover" id="subtasks_mit_dtb">
			                    <thead>
			                        <tr>
			                            <th>ID</th>
			                            <th>NAME</th>
			                            <th>DESCRIPTION</th>
			                            <th>ADDED BY</th>
			                            <th>LAST UPDATE BY</th>
			                            <th>LAST UPDATE DATE</th>
			                            <th>MODIFY?</th>
			                            <th>REMOVE?</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        
			                    </tbody>
			                </table>
			            </div>
		            </div>

		            <div id="mit_outcome" class="subtask">

		            	<h3>@fa('clipboard-check') OUTCOMES FOR <span id="mit_outcome_task_text" class="blue-text"> </span>@fa('caret-right', ['class' => 'blue-text']) <span id="mit_outcome_subtask_text" class="blue-text"></span> </h3>
			            <button id="btn_mit_outcome" data-toggle='modal' data-type="mit" data-target="#mAddOutcome" class="btn btn-default btn-add">@fa('plus') ADD MIT OUTCOME</button>

						<button id="btn_mit_outcome_paste" data-toggle='modal' data-target="#mAddCopyPaste" class="btn btn-default btn-add pull-right">@fa('paste') PASTE</button>
			            <button id="btn_mit_outcome_copy"  onclick="loop_table('outcomes_mit_dtb','o_list','Outcomes copied to clipboard.');" class="btn btn-default btn-add pull-right">@fa('copy') COPY</button>


			            <div class="table-responsive">
			                <table class="table table-hover" id="outcomes_mit_dtb">
			                    <thead>
			                        <tr>
			                            <th>ID</th>
			                            <th>NAME</th>
			                            <th>DESCRIPTION</th>
			                            <th>ADDED BY</th>
			                            <th>LAST UPDATE BY</th>
			                            <th>LAST UPDATE DATE</th>
			                            <th>MODIFY?</th>
			                            <th>REMOVE?</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        
			                    </tbody>
			                </table>
			            </div>
		            </div>

		            <div id="mit_saletype" class="subtask">

		            	<h3>@fa('tags') SALE TYPES FOR <span id="mit_saletype_task_text" class="blue-text"></span>@fa('caret-right', ['class' => 'blue-text']) <span id="mit_saletype_subtask_text" class="blue-text"></span>@fa('caret-right', ['class' => 'blue-text']) <span id="mit_saletype_outcome_text" class="blue-text"></span> </h3>
			            <button id="btn_mit_saletype" data-toggle='modal' data-type="mit" data-target="#mAddSaleType" class="btn btn-default btn-add">@fa('plus') ADD MIT SALETYPE</button>

			            <button id="btn_mit_outcome_paste2" data-toggle='modal' data-target="#mAddCopyPaste2" class="btn btn-default btn-add pull-right">@fa('paste') PASTE</button>
			            <button id="btn_mit_outcome_copy2"  onclick="loop_table('saletypes_mit_dtb','s_list','Sale types copied to clipboard.');" class="btn btn-default btn-add pull-right">@fa('copy') COPY</button>

			            <div class="table-responsive">
			                <table class="table table-hover" id="saletypes_mit_dtb">
			                    <thead>
			                        <tr>
			                            <th>ID</th>
			                            <th>NAME</th>
			                            <th>DESCRIPTION</th>
			                            <th>ADDED BY</th>
			                            <th>LAST UPDATE BY</th>
			                            <th>LAST UPDATE DATE</th>
			                            <th>MODIFY?</th>
			                            <th>REMOVE?</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        
			                    </tbody>
			                </table>
			            </div>
		            </div>


                    <div class="clearfix"></div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="mittask2"> <!-- Summary for MIT -->

					<h3>@fa('list-ol') MIT TASK SUMMARY @fa('spinner', ['class' => 'fa-spin mit_sum'])</h3>

                	<div class="panel panel-primary">
	                    <div class="panel-body">

	                        <div style="">
	                            <table class="table table-hover color-table inverse-table">
	                                <thead>
	                                    <tr>
	                                        <th>Task</th>
	                                        <th>Subtask</th>
	                                        <th>Outcome</th>
	                                        <th>Sale Types</th>
	                                    </tr>
	                                </thead>

	                                <tbody id="mit_summary_table">
	                                </tbody>
	                                
	                            </table>
	                        </div>

	                        
	                    </div>
	                </div>

                    <div class="clearfix"></div>
                </div>


                <div role="tabpanel" class="tab-pane fade" id="qatask1"> <!-- QA -->

					<h3>@fa('clipboard') QA TASKS</h3>
					<button data-toggle='modal' data-type="qa" data-target="#mAddTask" class="btn btn-default btn-add">@fa('plus') ADD QA TASK</button>

                	<div class="table-responsive">
		                <table class="table table-hover" id="tasks_qa_dtb">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>NAME</th>
		                            <th>DESCRIPTION</th>
		                            <th>ADDED BY</th>
		                            <th>LAST UPDATE BY</th>
		                            <th>LAST UPDATE DATE</th>
		                            <th>MODIFY?</th>
	                            	<th>REMOVE?</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        
		                    </tbody>
		                </table>
		            </div>

		            <div id="qa_subtask" class="subtask">
						<h3>@fa('clipboard-list') QA SUBTASKS FOR <span id="qa_subtask_text" class="blue-text"></span> </h3>
						<button id="btn_qa_subtask" data-toggle='modal' data-type="qa" data-target="#mAddSubTask" class="btn btn-default btn-add">@fa('plus') ADD QA SUBTASK</button>

	                	<div class="table-responsive">
			                <table class="table table-hover" id="subtasks_qa_dtb">
			                    <thead>
			                        <tr>
			                            <th>ID</th>
			                            <th>NAME</th>
			                            <th>DESCRIPTION</th>
			                            <th>ADDED BY</th>
			                            <th>LAST UPDATE BY</th>
			                            <th>LAST UPDATE DATE</th>
			                            <th>MODIFY?</th>
		                            	<th>REMOVE?</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                        
			                    </tbody>
			                </table>
			            </div>
		            </div>

                    <div class="clearfix"></div>
                </div>

				<div role="tabpanel" class="tab-pane fade" id="qatask2"> <!-- Summary for QA -->

					<h3>@fa('list-ol') QA TASK SUMMARY @fa('spinner', ['class' => 'fa-spin qa_sum'])</h3>

                	<div class="panel panel-primary">
		                    <div class="panel-body">

		                        <div style="">
		                            <table class="table table-hover color-table inverse-table">
		                                <thead>
		                                    <tr>
		                                        <th>Task</th>
		                                        <th>Subtask</th>
		                                    </tr>
		                                </thead>

		                                <tbody id="qa_summary_table">
		                                </tbody>
		                                
		                            </table>
		                        </div>

		                        
		                    </div>
		                </div>

                    <div class="clearfix"></div>
                </div>


                <div role="tabpanel" class="tab-pane fade" id="gdtask1"> <!-- GD -->

					<h3>@fa('clipboard') GD TASKS</h3>
					<button data-toggle='modal' data-type="gd" data-target="#mAddTask" class="btn btn-default btn-add">@fa('plus') ADD GD TASK</button>

                	<div class="table-responsive">
		                <table class="table table-hover" id="tasks_gd_dtb">
		                    <thead>
		                        <tr>
		                            <th>ID</th>
		                            <th>NAME</th>
		                            <th>DESCRIPTION</th>
		                            <th>ADDED BY</th>
		                            <th>LAST UPDATE BY</th>
		                            <th>LAST UPDATE DATE</th>
		                            <th>MODIFY?</th>
		                            <th>REMOVE?</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        
		                    </tbody>
		                </table>
		            </div>

                    <div id="gd_image" class="subtask_visible">
    	                    <h3>@fa('images') IMAGES</h3>
    						<button id="btn_gd_image" data-toggle='modal' data-type="gd" data-target="#mAddImage" class="btn btn-default btn-add">@fa('plus') ADD IMAGE</button>

	                    	<div class="table-responsive">
				                <table class="table table-hover" id="images_gd_dtb">
				                    <thead>
				                        <tr>
				                            <th>ID</th>
				                            <th>NAME</th>
				                            <th>DESCRIPTION</th>
				                            <th>ADDED BY</th>
				                            <th>LAST UPDATE BY</th>
				                            <th>LAST UPDATE DATE</th>
				                            <th>MODIFY?</th>
				                            <th>REMOVE?</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        
				                    </tbody>
				                </table>
				            </div>
                    </div>

                    <div id="gd_difficulty" class="subtask_visible">
    	                    <h3>@fa('tachometer-alt') DIFFICULTIES</h3>
    						<button id="btn_gd_difficulty" data-toggle='modal' data-type="gd" data-target="#mAddDifficulty" class="btn btn-default btn-add">@fa('plus') ADD DIFFICULTY</button>

	                    	<div class="table-responsive">
				                <table class="table table-hover" id="difficulties_gd_dtb">
				                    <thead>
				                        <tr>
				                            <th>ID</th>
				                            <th>NAME</th>
				                            <th>DESCRIPTION</th>
				                            <th>ADDED BY</th>
				                            <th>LAST UPDATE BY</th>
				                            <th>LAST UPDATE DATE</th>
				                            <th>MODIFY?</th>
				                            <th>REMOVE?</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                        
				                    </tbody>
				                </table>
				            </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
                
            </div>
        </div>

@include('tasks.modal.addtask')
@include('tasks.modal.edittask')
@include('tasks.modal.deletetask')
@include('subtasks.modal.addsubtask')
@include('subtasks.modal.editsubtask')
@include('subtasks.modal.deletesubtask')
@include('images.modal.addimage')
@include('images.modal.editimage')
@include('images.modal.deleteimage')
@include('difficulties.modal.adddifficulty')
@include('difficulties.modal.editdifficulty')
@include('difficulties.modal.deletedifficulty')
@include('outcomes.modal.addoutcome')
@include('outcomes.modal.editoutcome')
@include('outcomes.modal.deleteoutcome')
@include('saletypes.modal.addsaletype')
@include('saletypes.modal.editsaletype')
@include('saletypes.modal.deletesaletype')
@include('copypaste.modal.copypaste')
@include('copypaste.modal.copypaste2')

@endsection