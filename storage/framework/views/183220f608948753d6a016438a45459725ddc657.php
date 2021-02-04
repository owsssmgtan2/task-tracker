<!-- Create a new Team -->
<div class="modal fade" id="mEditUser" tabindex="-1" role="dialog" aria-labelledby="mEditUser_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="editUser">
            <div class="modal-content">

                <input type="hidden" id="e_id">

                <div class="panel panel-primary">
                    <div class="panel-heading"><?php echo FontAwesome::icon('user-edit'); ?> EDIT USER</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('user'); ?></span>
                                <input class="form-control" id="e_name" type="text" placeholder="enter the name of the staff" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('user-lock'); ?></span>
                                <input class="form-control" id="e_username" type="text" placeholder="enter the username of the staff" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('key'); ?></span>
                                <input class="form-control" id="e_password" type="password" placeholder="enter the password of the staff">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('envelope'); ?></span>
                                <input class="form-control" id="e_email" type="email" placeholder="enter the email of the staff" required="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Team</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('briefcase'); ?></span>
                                <select class="form-control" id="e_team_id" required="true">
                                    <option value="1">IT</option>
                                    <option value="2">MIT - ADMIN</option>
                                    <option value="3">MIT - STAFF</option>
                                    <option value="4">QA - ADMIN</option>
                                    <option value="5">QA - STAFF</option>
                                    <option value="6">GD - ADMIN</option>
                                    <option value="7">GD - STAFF</option>
                                    <option value="8">REPORTS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>SITE</label>
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo FontAwesome::icon('map-marker'); ?></span>
                                <select class="form-control" id="e_site" required="true">
                                    <option value="PH">PH</option>
                                    <option value="AU">AU</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group pull-right">
                            <?php echo FontAwesome::icon('spinner', ['class' => 'fa-spin']); ?>
                            <input id="e_at-save" class="btn btn-primary btn-outline" type="submit" value="Save">
                            <button type="button" class="btn btn-default btn-outline" data-dismiss="modal">Cancel</button>
                        </div>

                        
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>