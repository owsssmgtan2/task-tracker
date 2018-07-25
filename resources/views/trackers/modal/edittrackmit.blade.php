<!-- Create a new Team -->
<div class="modal fade" id="mEditTrackGD" tabindex="-1" role="dialog" aria-labelledby="mEditTrackQA_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editTrackGD">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('edit') EDIT TRACK</div>
                    <div class="panel-body">
                        <input type="hidden" id="editTrackGD_edit">
                        <div class="form-group">
                            <label>Task</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('clipboard')</span>
                                <select class="form-control" id="e_task_select_gd" required>
                                    <option value="">-- Please Select --</option>
                                    @foreach($gtasks as $gt)
                                        <option value="{{$gt->id}}">{{$gt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Image*</label>
                            <select class="form-control" id="e_image_select_gd" required="true">
                                <option value="">-- Please Select --</option>
                                @foreach($imgts as $imgt)
                                    <option value="{{$imgt->id}}">{{$imgt->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Difficulty*</label>
                            <select class="form-control" id="e_difficulty_select_gd" required="true">
                                <option value="">-- Please Select --</option>
                                @foreach($diffts as $difft)
                                    <option value="{{$difft->id}}">{{$difft->name}}</option>
                                @endforeach
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
                                <span class="input-group-addon">@fa('comment')</span>
                                <textarea class="form-control" rows="4" id="e_notes_gd"></textarea>
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