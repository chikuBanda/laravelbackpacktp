@extends('layouts.app')

@section('content')
<div style="background-attachment: fixed; background-size: cover; width: 100%; display: flex; flex-flow: column; min-height: 100%; background-image: url('{{ asset('uploads/img/wood-background.jpg') }}'); padding-top: 30px">

    <div
        style="
            background-attachment: fixed;
            width: 100%;
            display: flex;
            flex-flow: column;
            height: 200px;
            background-image: url('{{ asset('uploads/img/pizza1.jpeg') }}');
            background-repeat: repeat-x;
            margin-top: 25px;
            text-align: center
            "
        >
    </div>
    <div class="container">
            @if (Session::has('success'))
                <div class="row">
                    <div class="col-sm-6 col-md-4 offset-md4 offset-sm-3">
                        <div id="charge-message" class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    </div>
                </div>
            @endif


                    <div class="row justify-content-center">
                        @foreach ($formules as $formule)
                            <div class="col-md-4" style="margin-bottom: 120px;">
                                <div style="background-color: white; border-radius: 15px; width: 300px; height: 370px;">
                                    <div style="padding-top: 20px; height: 50%; text-align: center;">
                                        <img src="{{ asset('uploads/img/pizza-combo.jpg') }}" style="width: 250px; height: 100%" alt="{{$formule->nomFormule}}">
                                    </div>
                                    <h3 style="text-align: center">{{$formule->nomFormule}}</h3>
                                    <h5 style="text-align: center">${{$formule->prix}}</h5>
                                    <p style="text-align: center">${{$formule->description}}</p>
                                    <a class="btn" style="background-color: #FC955B; display: block; width: 70%; margin-left: auto; margin-right: auto; border-radius: 15px;" href="/formules/{{$formule->codeFormule}}/{{$formule->nomFormule}}">Selectionnez</a> <br>
                                    <br>
                                </div>
                            </div>
                        @endforeach
                    </div>

        </div>
    </div>
@endsection

