<p>hello</p>

@foreach ($formules as $formule)
    <a href="/formules/{{$formule->codeFormule}}/ajouter">{{$formule->nomFormule}}</a> <br>
@endforeach
