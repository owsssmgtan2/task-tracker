<!-- Create a new Team -->
<div class="modal fade" id="mDeleteTask" tabindex="-1" role="dialog" aria-labelledby="mDeleteTask_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="deleteTask">
            <div class="modal-content">

                <input type="hidden" id="d_id">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('trash') REMOVE TASK</div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label>Are you sure you want to remove the task: <span id="account_name"></span> ?</label>
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