<!-- Create a new Team -->
<div class="modal fade" id="mEditTrackQA" tabindex="-1" role="dialog" aria-labelledby="mEditTrackQA_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editTrackQA">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('edit'); ?> EDIT TRACK</div>
                    <div class="panel-body">
                        <input type="hidden" id="editTrackQA_edit">
                        <div class="form-group">
                            <label>Task</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('clipboard'); ?></span>
                                <select class="form-control" id="e_task_select_qa" required>
                                    <option value="">-- Please Select --</option>
                                    <?php $__currentLoopData = $qtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($qt->id); ?>"><?php echo e($qt->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subtask*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('clipboard-list'); ?></span>
                                <select class="form-control" id="e_subtask_select_qa">
                                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stamp*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('tag'); ?></span>
                                <select class="form-control" id="e_stamp_qa">
                                    <option value="Start">Start</option>        
                                    <option value="End">End</option>        
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Note*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('comment'); ?></span>
                                <textarea class="form-control" rows="4" id="e_notes_qa"></textarea>
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <?php echo FontAwesome::icon('spinner', ['class' => 'fa-spin']); ?>
                            <input id="at-save" class="btn btn-primary btn-outline" type="submit" value="Save">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>