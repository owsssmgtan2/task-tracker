<!-- Create a new Team -->
<div class="modal fade" id="mAddTask" tabindex="-1" role="dialog" aria-labelledby="mAddTask_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="addTask">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('plus') ADD NEW TASK</div>
                    <div class="panel-body">
                        <input type="hidden" id="task_type">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('user')</span>
                                <input class="form-control" id="name" type="text" placeholder="enter the name of the task" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('comment')</span>
                                <input class="form-control" id="description" type="text" placeholder="enter some description of the task">
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            @fa('spinner', ['class' => 'fa-spin'])
                            <input id="at-save" class="btn btn-primary btn-outline" type="submit" value="Save">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>