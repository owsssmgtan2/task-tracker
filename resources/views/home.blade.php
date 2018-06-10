@extends('layouts.app')

@section('main-content') <!-- 3 boxes at the top -->
        <div class="row">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Track for this day</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">659</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Total Track yesterday</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">869</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Most Tracked Transaction for this day</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <label for="">Email</label>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">911</span></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading"> Quality Tracker</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form id="addTransactionQA">
                                <div class="form-body">
                                    <h3 class="box-title">{{ $name }}</h3>
                                    
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Task*</label>
                                                <select class="form-control" id="task_select_qa" required>
                                                    <option value="">-- Please Select --</option>
                                                    @foreach($qtasks as $qt)
                                                        <option value="{{$qt->id}}">{{$qt->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Subtask*</label>
                                                <select class="form-control" id="subtask_select_qa">
                                                    
                                                </select>
                                            </div>
                                        <!--/span-->
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Stamp*</label>
                                                <select class="form-control" id="stamp_qa">
                                                    <option value="Start">Start</option>
                                                    <option value="End">End</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Note</label>
                                                <textarea id="notes_qa" rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions pull-right">
                                    @fa('spinner', ['class' => 'fa-spin'])
                                    <input type="submit" class="btn btn-success" value="Save">
                                    <button type="button" class="btn btn-default">Clear</button>
                                </div>
                            </form>
                        </div>

                        <div class="panel-body">
                            <div class="table-responsive">
                                <label>Choose Date:</label> <input id="choosedate" type="date" class="btn-choosedate" value="<?php echo date('Y-m-d');?>">
                                <table class="table table-hover" id="qa_tracks_dtb">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>AGENT NAME</th>
                                            <th>DATE</th>
                                            <th>TIME</th>
                                            <th>TASK</th>
                                            <th>SUBTASK</th>
                                            <th>STAMP</th>
                                            <th>NOTES</th>
                                            <th>MODIFY?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>

@include ('trackers.modal.edittrackqa')

@endsection
