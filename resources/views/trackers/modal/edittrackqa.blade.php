<!-- Create a new Team -->
<div class="modal fade" id="mEditTrackQA" tabindex="-1" role="dialog" aria-labelledby="mEditTrackQA_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editTrackQA">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('edit') EDIT TRACK</div>
                    <div class="panel-body">
                        <input type="hidden" id="editTrackQA_edit">
                        <div class="form-group">
                            <label>Task</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('clipboard')</span>
                                <select class="form-control" id="e_task_select_qa" required>
                                    <option value="">-- Please Select --</option>
                                    @foreach($qtasks as $qt)
                                        <option value="{{$qt->id}}">{{$qt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Subtask*</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('clipboard-list')</span>
                                <select class="form-control" id="e_subtask_select_qa">
                                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stamp*</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('tag')</span>
                                <select class="form-control" id="e_stamp_qa">
                                    <option value="Start">Start</option>        
                                    <option value="End">End</option>        
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Note*</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('comment')</span>
                                <textarea class="form-control" rows="4" id="e_notes_qa"></textarea>
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