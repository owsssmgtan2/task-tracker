<!-- Create a new Team -->
<div class="modal fade" id="mDeleteOutcome" tabindex="-1" role="dialog" aria-labelledby="mDeleteOutcome_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="deleteOutcome">
            <div class="modal-content">

                <input type="hidden" id="d_outcome_id">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('trash'); ?> REMOVE OUTCOME</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Are you sure you want to remove the outcome: <span id="outcome_account_name"></span> ?</label>
                        </div>

                        <div class="form-group pull-right">
                            <?php echo FontAwesome::icon('spinner', ['class' => 'fa-spin']); ?>
                            <input id="d_at-save" class="btn btn-primary btn-outline" type="submit" value="REMOVE">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>