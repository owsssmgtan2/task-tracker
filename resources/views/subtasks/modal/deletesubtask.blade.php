<!-- Create a new Team -->
<div class="modal fade" id="mDeleteSubTask" tabindex="-1" role="dialog" aria-labelledby="mDeleteSubTask_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="deleteSubTask">
            <div class="modal-content">

                <input type="hidden" id="d_subtask_id">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('trash') REMOVE SUBTASK</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Are you sure you want to remove the subtask: <span id="subtask_account_name"></span> ?</label>
                        </div>

                        <div class="form-group pull-right">
                            @fa('spinner', ['class' => 'fa-spin'])
                            <input id="d_at-save" class="btn btn-primary btn-outline" type="submit" value="REMOVE">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>