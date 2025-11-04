@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white bg-transparent">
                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">

                        <div id="third-title">
                            <span> {{ __('Celebrities') }} <i class="fa-solid fa-people-group fa-xl"></i>
                            </span>
                        </div>

                        @include('pages.components.diverse', ['posts' => $data['famous']])

                    </div>
                </div>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white bg-transparent">
                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">


                        <div id="third-title">
                            <span> {{ __('My Life') }}<i class="fa-solid fa-heart fa-xl"></i>
                            </span>
                        </div>

                        @include('pages.components.diverse', ['posts' => $data['life']])

                    </div>
                </div>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white bg-transparent">
                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">


                        <div id="third-title">
                            <span> {{ __('Moroccan') }}<i class="fa-solid fa-flag fa-xl"></i>
                            </span>
                        </div>

                        @include('pages.components.diverse', ['posts' => $data['moroccan']])

                    </div>
                </div>
            </div>
        </div>

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white bg-transparent">
                    <div class="card-body" style="background-color: #171616; border-radius: 30px;">


                        <div id="third-title">
                            <span> {{ __('My Health') }} <i class="fa-solid fa-heart-pulse fa-xl"></i>
                            </span>
                        </div>

                       
                        

                        @include('pages.components.diverse', ['posts' => $data['health']])

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
