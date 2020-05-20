@foreach ($produits as $produit)
    <a href="/produits/{{$produit->codeProduit}}/ingredients">{{$produit->nom}}</a> <br>
@endforeach
