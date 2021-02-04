<!-- Create a new Team -->
<div class="modal fade" id="mEditSaleType" tabindex="-1" role="dialog" aria-labelledby="mEditOutcome_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editSaleType">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('edit') EDIT SALE TYPE</div>
                    <div class="panel-body">
                        <input type="hidden" id="e_saletype_id">
                        
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('user')</span>
                                <input class="form-control" id="e_saletype_name" type="text" placeholder="enter the name of the sale type" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('comment')</span>
                                <input class="form-control" id="e_saletype_description" type="text" placeholder="enter some description of the sale type">
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