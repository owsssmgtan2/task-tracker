<!-- Create a new Team -->
<div class="modal fade" id="mAddCopyPaste2" tabindex="-1" role="dialog" aria-labelledby="mAddCopyPaste2_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="addCopyPaste2">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('clipboard') CLIPBOARD</div>
                    <div class="panel-body">

                        <div style="">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody id="paste_table2">
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        
                        <div class="form-group pull-right">
                            @fa('spinner', ['class' => 'fa-spin'])
                            <input id="at-save" class="btn btn-primary btn-outline" type="submit" value="PASTE">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>