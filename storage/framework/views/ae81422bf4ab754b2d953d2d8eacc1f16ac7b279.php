<?php $__env->startSection('main-content'); ?>
	<div class="white-box">

            <!-- Nav tabs -->
            <ul class="nav customtab nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#mittask1" aria-controls="mittask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> MIT Transactions</span></a></li>
                <li role="presentation" class=""><a href="#mittask2" aria-controls="mittask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Summary</span></a></li>
                <li role="presentation" class=""><a href="#qatask1" aria-controls="qatask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">QA Transactions</span></a></li>
                <li role="presentation" class=""><a href="#qatask2" aria-controls="qatask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Summary</span></a></li>
                <li role="presentation" class=""><a href="#gdtask1" aria-controls="gdtask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">GD Transactions</span></a></li>
                <li role="presentation" class=""><a href="#gdtask2" aria-controls="gdtask" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Summary</span></a></li>
                
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="mittask1">

                	<input type="hidden" id="t_id">
                	<input type="hidden" id="t_name">
                	<input type="hidden" id="st_id">
                	<input type="hidden" id="st_name">
                	<input type="hidden" id="o_id">
                	<input type="hidden" id="o_name">
                	<input type="hidden" id="o_list">
                	<input type="hidden" id="s_list">


                	<h3><?php echo FontAwesome::icon('clipboard'); ?> MIT TASKS</h3>
					<button data-toggle='modal' data-type="mit" data-target="#mAddTask" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD MIT TASK</button>

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

		            	<h3><?php echo FontAwesome::icon('clipboard-list'); ?> SUBTASKS FOR <span id="mit_subtask_text" class="blue-text"></span> </h3>
			            <button id="btn_mit_subtask" data-toggle='modal' data-type="mit" data-target="#mAddSubTask" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD MIT SUBTASK</button>

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

		            	<h3><?php echo FontAwesome::icon('clipboard-check'); ?> OUTCOMES FOR <span id="mit_outcome_task_text" class="blue-text"> </span><?php echo FontAwesome::icon('caret-right', ['class' => 'blue-text']); ?> <span id="mit_outcome_subtask_text" class="blue-text"></span> </h3>
			            <button id="btn_mit_outcome" data-toggle='modal' data-type="mit" data-target="#mAddOutcome" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD MIT OUTCOME</button>

						<button id="btn_mit_outcome_paste" data-toggle='modal' data-target="#mAddCopyPaste" class="btn btn-default btn-add pull-right"><?php echo FontAwesome::icon('paste'); ?> PASTE</button>
			            <button id="btn_mit_outcome_copy"  onclick="loop_table('outcomes_mit_dtb','o_list','Outcomes copied to clipboard.');" class="btn btn-default btn-add pull-right"><?php echo FontAwesome::icon('copy'); ?> COPY</button>


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

		            	<h3><?php echo FontAwesome::icon('tags'); ?> SALE TYPES FOR <span id="mit_saletype_task_text" class="blue-text"></span><?php echo FontAwesome::icon('caret-right', ['class' => 'blue-text']); ?> <span id="mit_saletype_subtask_text" class="blue-text"></span><?php echo FontAwesome::icon('caret-right', ['class' => 'blue-text']); ?> <span id="mit_saletype_outcome_text" class="blue-text"></span> </h3>
			            <button id="btn_mit_saletype" data-toggle='modal' data-type="mit" data-target="#mAddSaleType" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD MIT SALETYPE</button>

			            <button id="btn_mit_outcome_paste2" data-toggle='modal' data-target="#mAddCopyPaste2" class="btn btn-default btn-add pull-right"><?php echo FontAwesome::icon('paste'); ?> PASTE</button>
			            <button id="btn_mit_outcome_copy2"  onclick="loop_table('saletypes_mit_dtb','s_list','Sale types copied to clipboard.');" class="btn btn-default btn-add pull-right"><?php echo FontAwesome::icon('copy'); ?> COPY</button>

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
                <div role="tabpanel" class="tab-pane fade" id="qatask1">

					<h3><?php echo FontAwesome::icon('clipboard'); ?> QA TASKS</h3>
					<button data-toggle='modal' data-type="qa" data-target="#mAddTask" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD QA TASK</button>

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
						<h3><?php echo FontAwesome::icon('clipboard-list'); ?> QA SUBTASKS FOR <span id="qa_subtask_text" class="blue-text"></span> </h3>
						<button id="btn_qa_subtask" data-toggle='modal' data-type="qa" data-target="#mAddSubTask" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD QA SUBTASK</button>

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
                <div role="tabpanel" class="tab-pane fade" id="gdtask1">

					<h3><?php echo FontAwesome::icon('clipboard'); ?> GD TASKS</h3>
					<button data-toggle='modal' data-type="gd" data-target="#mAddTask" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD GD TASK</button>

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
    	                    <h3><?php echo FontAwesome::icon('images'); ?> IMAGES</h3>
    						<button id="btn_gd_image" data-toggle='modal' data-type="gd" data-target="#mAddImage" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD IMAGE</button>

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
    	                    <h3><?php echo FontAwesome::icon('tachometer-alt'); ?> DIFFICULTIES</h3>
    						<button id="btn_gd_difficulty" data-toggle='modal' data-type="gd" data-target="#mAddDifficulty" class="btn btn-default btn-add"><?php echo FontAwesome::icon('plus'); ?> ADD DIFFICULTY</button>

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

<?php echo $__env->make('tasks.modal.addtask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('tasks.modal.edittask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('tasks.modal.deletetask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('subtasks.modal.addsubtask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('subtasks.modal.editsubtask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('subtasks.modal.deletesubtask', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('images.modal.addimage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('images.modal.editimage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('images.modal.deleteimage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('difficulties.modal.adddifficulty', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('difficulties.modal.editdifficulty', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('difficulties.modal.deletedifficulty', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('outcomes.modal.addoutcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('outcomes.modal.editoutcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('outcomes.modal.deleteoutcome', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('saletypes.modal.addsaletype', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('saletypes.modal.editsaletype', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('saletypes.modal.deletesaletype', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('copypaste.modal.copypaste', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('copypaste.modal.copypaste2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>