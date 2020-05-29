@extends('layouts.app')

@section('content')
    <div style="position: fixed; background-size: cover; width: 100%; display: flex; flex-flow: column; height: 100%; background-image: url('{{ asset('uploads/img/wood-background.jpg') }}'); padding-top: 30px">
        <div style="background-color: transparent; width: 100%; height: 35%">

        </div>
        <div style="background-color: #FEDDCA; background-size: cover; width: 100%; display: flex; flex-flow: column; height: 100%;">
            <div class="container" style="background-color: white; display: flex; flex-flow: column; height: 100%;">
                <div class="row">
                    <div class="col-sm-6 col-md-4 offset-md-4 offset-md-3">
                        <form action="/add-formule-to-cart/{{$formule->codeFormule}}" method="post">
                            @csrf

                            <select class="form-control" name="pizza1">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'pizza')
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <select class="form-control" name="pizza2">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'pizza')
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <select class="form-control" name="pizza3">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'pizza')
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <select class="form-control" name="vin">
                                @foreach ($produits as $produit)
                                    @if ($produit->categories->nomCat == 'vin' && (
                                        $produit->nom == 'rouge' ||
                                        $produit->nom == 'rose' ||
                                        $produit->nom == 'blanc'
                                    ))
                                        <option>{{$produit->nom}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
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
    <script src="{{ asset('js/form_add.js')}}"></script>
@endsection


