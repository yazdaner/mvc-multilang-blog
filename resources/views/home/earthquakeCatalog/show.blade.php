@extends('home.layouts.home')
@section('title', __('Earthquake catalog search'))

@section('script')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>

    <script src="{{ asset('js/earth/excel.js') }}"></script>
    <script src="{{ asset('js/earth/earthquake.js') }}"></script>
    <script src="{{ asset('js/earth/ui.js') }}"></script>
    <script src="{{ asset('js/earth/storage.js') }}"></script>
    <script src="{{ asset('js/earth/app.js') }}"></script>

@endsection
@section('style')
    <style>
        .card-body {
            background-color: #002147d9;
            color: white;
        }
        .table{
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <div class="card bg-light text-center mb-5">
                    <div class="card-body">
                        <div class="">
                            <h3 class="font-weight-bold my-4">{{ __('Earthquake catalog search') }}</h3>
                        </div>
                        <form id="w-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="state">{{ __('Start date') }}</label>
                                        <input type="text" id="starttime" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city">{{ __('End date') }}</label>
                                        <input type="text" id="endtime" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="state">{{ __('Minimum depth') }}</label>
                                        <input type="text" id="mindepth" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city">{{ __('Maximum depth') }}</label>
                                        <input type="text" id="maxdepth" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="state">{{ __('Minimum magnitude') }}</label>
                                        <input type="text" id="minmagnitude" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city">{{ __('Maximum magnitude') }}</label>
                                        <input type="text" id="maxmagnitude" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="state">{{ __('Minimum latitude') }}</label>
                                        <input type="text" id="minlatitude" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city">{{ __('Maximum latitude') }}</label>
                                        <input type="text" id="maxlatitude" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="state">{{ __('Minimum longitude') }}</label>
                                        <input type="text" id="minlongitude" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city">{{ __('Maximum longitude') }}</label>
                                        <input type="text" id="maxlongitude" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <select class="form-control my-3" id="orderby">
                                <option value="time" selected>{{ __('order by') }}</option>
                                <option value="time">{{ __('descending time') }}</option>
                                <option value="time-asc">{{ __('ascending time') }}</option>
                                <option value="magnitude">{{ __('descending magnitude') }}</option>
                                <option value="magnitude-asc">{{ __('ascending magnitude') }}</option>
                            </select>

                            <div id="btn-box">

                                <button type="button" class="btn btn-secondary mt-4 ml-2"
                                    id="w-change-btn">{{ __('submit') }}</button>
                                <button id="excel_btn" class="btn btn-success mt-4">{{ __('Excel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto mt-5">
                <div class="card bg-light text-center mb-5">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('longitude') }}</th>
                                        <th scope="col">{{ __('latitude') }}</th>
                                        <th scope="col">{{ __('depth') }}</th>
                                        <th scope="col">{{ __('magnitude') }}</th>
                                        <th scope="col">{{ __('date') }}</th>
                                        <th scope="col">{{ __('hour') }}</th>
                                        <th scope="col">{{ __('map') }}</th>
                                        <th scope="col">{{ __('source') }}</th>
                                    </tr>
                                </thead>
                                <tbody id="TableBody">

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
