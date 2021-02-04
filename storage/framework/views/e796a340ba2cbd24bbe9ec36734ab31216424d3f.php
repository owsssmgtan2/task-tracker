<!-- Create a new Team -->
<div class="modal fade" id="mAddDifficulty" tabindex="-1" role="dialog" aria-labelledby="mAddDifficulty_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="addDifficulty">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('plus'); ?> ADD NEW DIFFICULTY</div>
                    <div class="panel-body">
                        <input type="hidden" id="task_type">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('image'); ?></span>
                                <input class="form-control" id="gd_difficulty_name" type="text" placeholder="enter the name of the difficulty" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('comment'); ?></span>
                                <input class="form-control" id="gd_difficulty_description" type="text" placeholder="enter some description of the difficulty">
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