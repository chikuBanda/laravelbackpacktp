@if (Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 offset-md4 offset-sm-3">
            <div id="charge-message" class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
@endif

@foreach ($produits as $produit)
    <a href="/produits/{{$produit->codeProduit}}/ingredients">{{$produit->nom}}</a>
    <a href="/add-produit-to-cart/{{$produit->codeProduit}}">add to cart</a> <br>
    <br>
@endforeach

<p>cart: {{Session::has('cart') ? Session::get('cart')->totalQuantity : null}}</p>
