

<?php $__env->startSection('main-content'); ?>
	<div class="row">
	    <div class="col-md-12 col-lg-12 col-sm-12">
	        <div class="white-box">
	            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
	                <select class="form-control pull-right row b-none" id="filter_users">
	                    <option value="0">ALL</option>
	                    <option value="1">IT</option>
	                    <option value="2">MIT - ADMIN</option>
	                    <option value="3">MIT - STAFF</option>
	                    <option value="4">QA - ADMIN</option>
	                    <option value="5">QA - STAFF</option>
	                    <option value="6">GD - ADMIN</option>
	                    <option value="7">GD - STAFF</option>
	                    <option value="8">REPORTS</option>
	                </select>
	            </div>
	            <h3 class="box-title">List of System Users</h3>

	            <button data-toggle='modal' data-target="#mAddUser" class="btn btn-default btn-add"><?php echo FontAwesome::icon('user-plus'); ?> ADD USER</button>

	            <div class="table-responsive">
	                <table class="table table-hover" id="users_dtb">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>NAME</th>
	                            <th>USERNAME</th>
	                            <th>EMAIL</th>
	                            <th>TEAM</th>
	                            <th>SITE</th>
	                            <th>DATE</th>
	                            <th>MODIFY?</th>
	                            <th>DEACTIVATE?</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        
	                    </tbody>
	                </table>
	            </div>

	            
	        </div>
	    </div>
	</div>

<?php echo $__env->make('users.modal.adduser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('users.modal.edituser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('users.modal.deleteuser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>