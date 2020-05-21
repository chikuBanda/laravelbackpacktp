<p>hello</p>

@foreach ($formules as $formule)
    <a href="/formules/{{$formule->codeFormule}}/ajouter">{{$formule->nomFormule}}</a> <br>
    <a href="/add-formule-to-cart/{{$formule->codeFormule}}">add to cart</a> <br>
    <br>
@endforeach

<p>cart: {{Session::has('cart') ? Session::get('cart')->totalQuantity : null}}</p>
