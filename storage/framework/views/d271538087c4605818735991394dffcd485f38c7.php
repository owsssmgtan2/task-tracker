<!-- Create a new Team -->
<div class="modal fade" id="mAddCopyPaste" tabindex="-1" role="dialog" aria-labelledby="mAddCopyPaste_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="addCopyPaste">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('clipboard'); ?> CLIPBOARD</div>
                    <div class="panel-body">

                        <div style="">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>

                                <tbody id="paste_table">
                                    
                                </tbody>
                                
                            </table>
                        </div>
                        
                        <div class="form-group pull-right">
                            <?php echo FontAwesome::icon('spinner', ['class' => 'fa-spin']); ?>
                            <input id="at-save" class="btn btn-primary btn-outline" type="submit" value="PASTE">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>