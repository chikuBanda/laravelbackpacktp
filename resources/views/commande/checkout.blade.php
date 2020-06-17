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
            min-height: 70vh
        ">
            <div class="container" style="margin-top: 0px; margin-bottom: 100px; padding-right: 50px; padding-left: 50px">
                <div class="row">
                    <div class="col-sm-6 col-md-4 offset-md-4 offset-md-3">
                        <h1>checkout</h1>
                        <h4>Total: ${{$total}}</h4>
                        <div id="charge-error" class="alert alert-danger" {{ !Session::has('error') ? 'hidden': ''}}>
                            {{Session::get('error')}}
                        </div>
                        <form action="{{route('checkout')}}" method="post" id="checkout-form">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="address">Adress</label>
                                        <input type="text" id="address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-name">Card holder name</label>
                                        <input type="text" id="card-name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-number">Card holder number</label>
                                        <input type="text" id="card-number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="card-expiry-month">Expiration Month</label>
                                                <input type="text" id="card-expiry-month" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label for="card-expiry-year">Expiration Year</label>
                                                <input type="text" id="card-expiry-month" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-cvc">CVC</label>
                                        <input type="text" id="card-cvc" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Buy now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/checkout.js')}}"></script>
@endsection

@section('styles')

@endsection
