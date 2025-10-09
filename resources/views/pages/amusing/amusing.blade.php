@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-11">

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h2 class="card-title mb-3" style="color: #ffdc91;"> مشاهير <i
                                class="fa-solid fa-people-group fa-xl"></i>
                        </h2>

                      
 @include('pages.components.diverse', ['posts' => $data['famous']])



                    </div>
                </div>
            </div>

        </div>



        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h2 class="card-title mb-3" style="color: #ffdc91;"> حياتي <i
                                class="fa-solid fa-people-group fa-xl"></i>
                        </h2>
                     @include('pages.components.diverse', ['posts' => $data['life']])

                </div>
            </div>
        </div>


        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h2 class="card-title mb-3" style="color: #ffdc91;"> مغربي <i
                                class="fa-solid fa-people-group fa-xl"></i>
                        </h2>
                   @include('pages.components.diverse', ['posts' => $data['moroccan']])

                </div>
            </div>

        </div>

        <div class="row p-4">
            <div class="col-sm-12">
                <div class="card text-white text-end  bg-transparent">
                    <div class="card-body" style="background-color: #171616 ;border-radius: 30px;">
                        <h2 class="card-title mb-3" style="color: #ffdc91;"> صحتي <i
                                class="fa-solid fa-heart-pulse fa-xl"></i></i>
                        </h2>

                        @include('pages.components.diverse', ['posts' => $data['health']])

                </div>
            </div>
        </div>



    </div>
@endsection
