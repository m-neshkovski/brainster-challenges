@extends('layouts.app')

@section('content')
<div id="dashboard" class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Button trigger modal -->
            <button id="add-vehicle" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#vehicleModal" data-action="/api/vehicles" data-method="POST">
                Add vehicle
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="vehicleModal" tabindex="-1" role="dialog" aria-labelledby="vehicleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="vehicleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form id="modal-form">
                        <div id="modal-body" class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="submit_btn" type="submit" class="btn btn-danger"></button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h3>Table of vehicles</h3>
                    <table id="vehicle-table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Reg. number</th>
                                <th>Insurance date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5"> No data yet ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
