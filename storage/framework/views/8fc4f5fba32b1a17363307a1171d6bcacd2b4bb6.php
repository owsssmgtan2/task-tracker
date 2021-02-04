<!-- Create a new Team -->
<div class="modal fade" id="mEditOutcome" tabindex="-1" role="dialog" aria-labelledby="mEditOutcome_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editOutcome">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('edit'); ?> EDIT OUTCOME</div>
                    <div class="panel-body">
                        <input type="hidden" id="e_outcome_id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('user'); ?></span>
                                <input class="form-control" id="e_outcome_name" type="text" placeholder="enter the name of the outcome" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('comment'); ?></span>
                                <input class="form-control" id="e_outcome_description" type="text" placeholder="enter some description of the outcome">
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