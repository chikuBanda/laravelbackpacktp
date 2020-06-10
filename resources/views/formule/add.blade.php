@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: white; height: 100vh; padding-top: 10%">

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
@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/form_add.js')}}"></script>
@endsection


