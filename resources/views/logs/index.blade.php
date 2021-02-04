@extends('layouts.app')

@section('main-content')
	<div class="row">
	    <div class="col-md-12 col-lg-12 col-sm-12">
	        <div class="white-box">
	            
	            <h3 class="box-title">Transaction Logs</h3>

	            <div class="table-responsive">
	                <table class="table table-hover" id="logs_dtb">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>TRACKER</th>
	                            <th>ACTION</th>
	                            <th>DETAILS</th>
	                            <th>NAME</th>
	                            <th>DESCRIPTION</th>
	                            <th>PERSON INVOLVED</th>
	                            <th>DATE</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        
	                    </tbody>
	                </table>
	            </div>

	            
	        </div>
	    </div>
	</div>
@endsection