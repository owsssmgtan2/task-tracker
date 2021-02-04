<!-- Create a new Team -->
<div class="modal fade" id="mAddUser" tabindex="-1" role="dialog" aria-labelledby="mAddUser_Label" aria-hidden="true">
    
    <div class="modal-dialog">

        <!-- Modal content-->
        <form id="addUser">
            <div class="modal-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">@fa('user-plus') ADD NEW USER</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('user')</span>
                                <input class="form-control" id="name" type="text" placeholder="enter the name of the staff" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('user-lock')</span>
                                <input class="form-control" id="username" type="text" placeholder="enter the username of the staff" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('key')</span>
                                <input class="form-control" id="password" type="password" placeholder="enter the password of the staff" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('envelope')</span>
                                <input class="form-control" id="email" type="email" placeholder="enter the email of the staff" required="true">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Team</label>
                            <div class="input-group">
                                <span class="input-group-addon">@fa('briefcase')</span>
                                <select class="form-control" id="team_id" required="true">
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
                                <span class="input-group-addon">@fa('map-marker')</span>
                                <select class="form-control" id="site" required="true">
                                    <option value="PH">PH</option>
                                    <option value="AU">AU</option>
                                </select>
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