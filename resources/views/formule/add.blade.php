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
                <form action="/add-formule-to-cart/{{$formule->codeFormule}}" method="post">
                    @csrf

                    <div class="row" style="padding-left: 140px">
                        <div class="col-md-6 form-group" style="margin-bottom: 40px">
                            <label for="pizza1">Pizza 1</label>
                            <select style="width: 70%" id="pizza1" class="form-control" name="pizza1">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'pizza')
                                        <option style="background-image: url('{{ asset('uploads/img/wood-background.jpg') }}')">
                                            {{$produit->nom}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input checked class="form-check-input" type="radio" name="choix" id="radio_salade" value="option1">
                                <label class="form-check-label" for="radio_salade">Salade vert</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="choix" id="radio_wings" value="option2">
                                <label class="form-check-label" for="radio_wings">6 chicken wings</label>
                            </div>

                            <select style="width: 70%; margin-top: 7px" class="form-control" name="salade_verte" id="salade_verte">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'salade verte')
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <div class="form-group">
                                <input value="6 chicken wings" name="chicken_wings" class="form-control" id="chicken_wings" hidden>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="boisson">Boisson</label>
                            <select style="width: 70%" class="form-control" id="boisson" name="boisson">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'boisson'
                                        && (
                                            $produit->nom == 'coca' ||
                                            $produit->nom == 'coca zero' ||
                                            $produit->nom == 'the froid' ||
                                            $produit->nom == 'fanta'))
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <hr />

                        <div class="col-md-3 offset-md-9 form-group">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/form_add.js')}}"></script>
@endsection

@section('styles')

@endsection



