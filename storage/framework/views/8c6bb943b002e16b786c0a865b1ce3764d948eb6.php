<!-- Create a new Team -->
<div class="modal fade" id="mEditTrackGD" tabindex="-1" role="dialog" aria-labelledby="mEditTrackQA_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editTrackGD">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('edit'); ?> EDIT TRACK</div>
                    <div class="panel-body">
                        <input type="hidden" id="editTrackGD_edit">
                        <div class="form-group">
                            <label>Task</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('clipboard'); ?></span>
                                <select class="form-control" id="e_task_select_gd" required>
                                    <option value="">-- Please Select --</option>
                                    <?php $__currentLoopData = $gtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gt->id); ?>"><?php echo e($gt->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Image*</label>
                            <select class="form-control" id="e_image_select_gd" required="true">
                                <option value="">-- Please Select --</option>
                                <?php $__currentLoopData = $imgts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($imgt->id); ?>"><?php echo e($imgt->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Difficulty*</label>
                            <select class="form-control" id="e_difficulty_select_gd" required="true">
                                <option value="">-- Please Select --</option>
                                <?php $__currentLoopData = $diffts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $difft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($difft->id); ?>"><?php echo e($difft->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                         <div class="form-group">
                            <label class="control-label">Ticket #*</label>
                            <input type="text" class="form-control" id="e_ticket_text_gd" required="true"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">SKU #*</label>
                            <input type="text" class="form-control" id="e_sku_text_gd" required="true" />
                        </div>
                        <div class="form-group">
                            <label>Note*</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('comment'); ?></span>
                                <textarea class="form-control" rows="4" id="e_notes_gd"></textarea>
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