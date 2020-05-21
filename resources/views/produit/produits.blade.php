@extends('layouts.app')

@section('content')
    <div style="background-attachment: fixed; background-size: cover; width: 100%; display: flex; flex-flow: column; min-height: 100%; background-image: url('{{ asset('uploads/img/wood-background.jpg') }}'); padding-top: 30px">
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

            <div class="row">
                @foreach ($produits as $produit)
                    <div class="col-md-4" style="margin-bottom: 60px">
                        <div style="background-color: white; border-radius: 15px; width: 250px; height: 370px;">
                            <div style="padding-top: 20px; height: 50%;">
                                <img src="{{ asset('uploads/img/pizza-food-pepperoni-made-removebg-preview.png') }}" style="width: 250px; height: 100%" alt="{{$produit->nom}}">
                            </div>
                            <h3 style="text-align: center">{{$produit->nom}}</h3>
                            <p style="text-align: center">${{$produit->prix}}</p>
                            <a class="btn" style="background-color: #FEDDCA; display: block; margin-bottom: 10px; width: 70%; margin-left: auto; margin-right: auto; border-radius: 15px;" href="/produits/{{$produit->codeProduit}}/ingredients">ingredients</a>
                            <a class="btn" style="background-color: #FC955B; display: block; width: 70%; margin-left: auto; margin-right: auto; border-radius: 15px;" href="/add-produit-to-cart/{{$produit->codeProduit}}">add to cart</a> <br>
                            <br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

