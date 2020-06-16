@extends('layouts.app')

@section('content')
    <div style="
        background-size: cover;
        width: 100%;
        display: flex;
        flex-flow: column;
        min-height: 100vh;
        background-color: pink;
    ">
        <div style="
            background-size: cover;
            width: 100%;
            height: 200px;
            background-color: black;
            position: relative;
        ">
            <div style="
                background-size: cover;
                position: absolute;
                bottom: 0px;
                background-color: transparent;
                top: 138px;
                left: 90px;
                right: 90px;
            ">
                    <div style="
                    background-size: cover;
                    height: 100%;
                    background-color: white;
                ">
                </div>
            </div>
        </div>
        <div style="
            margin-right: 90px;
            margin-left: 90px;
            display: flex;
            flex-flow: column;
            background-color: white;
        ">
            <div class="container" style="margin: 100px">
                <div class="row">
                    <div class="col-md-7">
                        <img
                            src="{{ asset('uploads/img/pizza2.jpg') }}"
                            alt=""
                            srcset=""
                            width="550"
                            height="350"
                            style="border-radius: 21px">
                        <h2 style="margin-top: 20px; margin-bottom: 20px"><strong>Pepperoni pizza</strong></h2>
                    </div>
                    <div class="col-md-5">
                        <div style="margin-bottom: 20px">
                            <h5>prix</h5>
                            <h3><strong>25</strong></h3>
                        </div>
                        <div style="margin-bottom: 20px">
                            <h5>category</h5>
                            <h3><strong>Pizza</strong></h3>
                        </div>
                        <div style="margin-bottom: 20px">
                            <h5>remise</h3>
                            <h3><strong>0</strong></h3>
                        </div>
                    </div>
                </div>
                <hr>

                <h4 style="margin-top: 40px; margin-bottom: 30px"><strong>Ingredients</strong></h4>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" style="margin-bottom: 40px">
                            <img src="{{ asset('uploads/img/pizza2.jpg') }}" alt="" width="100" height="100">
                            <h5 style="margin-top: 10px;"><strong>ingredient</strong></h3>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 40px">
                            <img src="{{ asset('uploads/img/pizza2.jpg') }}" alt="" width="100" height="100">
                            <h5 style="margin-top: 10px;"><strong>ingredient</strong></h3>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 40px">
                            <img src="{{ asset('uploads/img/pizza2.jpg') }}" alt="" width="100" height="100">
                            <h5 style="margin-top: 10px;"><strong>ingredient</strong></h3>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 40px">
                            <img src="{{ asset('uploads/img/pizza2.jpg') }}" alt="" width="100" height="100">
                            <h5 style="margin-top: 10px;"><strong>ingredient</strong></h3>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 40px">
                            <img src="{{ asset('uploads/img/pizza2.jpg') }}" alt="" width="100" height="100">
                            <h5 style="margin-top: 10px;"><strong>ingredient</strong></h3>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 40px">
                            <img src="{{ asset('uploads/img/pizza2.jpg') }}" alt="" width="100" height="100">
                            <h5 style="margin-top: 10px;"><strong>ingredient</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection

@section('styles')

@endsection
