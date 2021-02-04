<!-- Create a new Team -->
<div class="modal fade" id="mEditImage" tabindex="-1" role="dialog" aria-labelledby="mEditImage_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editImage">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('edit'); ?> EDIT IMAGE</div>
                    <div class="panel-body">

                        <input type="hidden" id="e_image_id">

                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('user'); ?></span>
                                <input class="form-control" id="e_image_name" type="text" placeholder="enter the name of the image" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('comment'); ?></span>
                                <input class="form-control" id="e_image_description" type="text" placeholder="enter some description of the image">
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