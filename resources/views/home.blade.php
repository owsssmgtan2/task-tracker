@extends('layouts.app')

@section('main-content')
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
                    <div class="panel-heading"> With two column</div>
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form action="#">
                                <div class="form-body">
                                    <label class="pull-right">January 1, 2018 00:00:00</label>
                                    <h3 class="box-title">OSE MANGUILIMOTAN - MIT STAFF (PH)</h3>
                                    
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Task*</label>
                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="Category 1">Category 1</option>
                                                    <option value="Category 2">Category 2</option>
                                                    <option value="Category 3">Category 5</option>
                                                    <option value="Category 4">Category 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Subtask*</label>
                                                <select class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                    <option value="Category 1">Category 1</option>
                                                    <option value="Category 2">Category 2</option>
                                                    <option value="Category 3">Category 5</option>
                                                    <option value="Category 4">Category 4</option>
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
                                                <select class="form-control">
                                                    <option value="0">Start</option>
                                                    <option value="1">End</option>
                                                </select> <span class="help-block"> Select your gender </span> </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Note</label>
                                                <textarea rows="4" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="form-actions pull-right">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/.row -->
        <!--row -->
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- table -->
        <!-- ============================================================== -->
        <!-- <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                        <select class="form-control pull-right row b-none">
                            <option>March 2017</option>
                            <option>April 2017</option>
                            <option>May 2017</option>
                            <option>June 2017</option>
                            <option>July 2017</option>
                        </select>
                    </div>
                    <h3 class="box-title">Recent sales</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>PRICE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="txt-oflo">Elite admin</td>
                                    <td>SALE</td>
                                    <td class="txt-oflo">April 18, 2017</td>
                                    <td><span class="text-success">$24</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="txt-oflo">Real Homes WP Theme</td>
                                    <td>EXTENDED</td>
                                    <td class="txt-oflo">April 19, 2017</td>
                                    <td><span class="text-info">$1250</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="txt-oflo">Ample Admin</td>
                                    <td>EXTENDED</td>
                                    <td class="txt-oflo">April 19, 2017</td>
                                    <td><span class="text-info">$1250</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="txt-oflo">Medical Pro WP Theme</td>
                                    <td>TAX</td>
                                    <td class="txt-oflo">April 20, 2017</td>
                                    <td><span class="text-danger">-$24</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="txt-oflo">Hosting press html</td>
                                    <td>SALE</td>
                                    <td class="txt-oflo">April 21, 2017</td>
                                    <td><span class="text-success">$24</span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="txt-oflo">Digital Agency PSD</td>
                                    <td>SALE</td>
                                    <td class="txt-oflo">April 23, 2017</td>
                                    <td><span class="text-danger">-$14</span></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="txt-oflo">Helping Hands WP Theme</td>
                                    <td>MEMBER</td>
                                    <td class="txt-oflo">April 22, 2017</td>
                                    <td><span class="text-success">$64</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
   
    </div>
@endsection
