@extends('layouts.app')

@section('content')
    <div style="background-attachment: fixed; background-size: cover; width: 100%; display: flex; flex-flow: column; min-height: 100%; background-image: url('{{ asset('uploads/img/wood-background.jpg') }}'); padding-top: 30px">
        <div style="background-color: transparent; width: 100%; height: 35%">
        </div>
        <div style="background-color: #FEDDCA; background-size: cover; width: 100%; display: flex; flex-flow: column; height: 100%;">
            <div class="container" style="background-color: white; display: flex; flex-flow: column; height: 100%;">
                @if (Session::has('cart'))
                    <!-- Shopping cart table -->
                    <form action="{{route('updateCart')}}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Item</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Prix</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantite</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Totale</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Soupprimer</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $id => $item)
                                    @if ($id[0] == 'p')
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Timex Unisex Originals</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                                                </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong class="prix">{{$item['item']->prix}}</strong></td>
                                            <td class="border-0 align-middle">
                                                <div class="def-number-input number-input mb-0 w-100">
                                                    <button type="button" onclick="subtract(this)"
                                                    class="minus">-</button>
                                                    <input
                                                        class="quantity"
                                                        min="0"
                                                        name="{{$id}}"
                                                        value="{{$item['quantity']}}"
                                                        type="number"
                                                        onchange="myfunc(this)">
                                                    <button type="button" onclick="add(this)"
                                                    class="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="border-0 align-middle"><strong class="totale">{{$item['item']->prix * $item['quantity']}}</strong></td>
                                            <td class="border-0 align-middle"><a href="#" onclick="removeElem(event, this)" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
                                    @if ($id[0] == 'f')
                                        <tr>
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Formule {{$item['item']->nomFormule}}</a></h5>
                                                    <div>
                                                        @foreach (($item['produits']) as $prod)
                                                            <span class="text-muted font-weight-normal font-italic">{{$prod->nom}}, </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle"><strong class="prix">{{$item['item']->prix}}</strong></td>
                                            <td class="border-0 align-middle">
                                                <div class="def-number-input number-input mb-0 w-100">
                                                    <button type="button" onclick="subtract(this)"
                                                    class="minus">-</button>
                                                    <input
                                                        class="quantity"
                                                        min="0"
                                                        name="{{$id}}"
                                                        value="{{$item['quantity']}}"
                                                        type="number"
                                                        onchange="myfunc(this)">
                                                    <button type="button" onclick="add(this)"
                                                    class="plus">+</button>
                                                </div>
                                            </td>
                                            <td class="border-0 align-middle"><strong class="totale">{{$item['item']->prix * $item['quantity']}}</strong></td>
                                            <td class="border-0 align-middle"><a href="#" onclick="removeElem(event, this)" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <!-- End -->
                        <a href="/cart" class="btn btn-primary">reset</a>
                        <button type="submit">update cart</button>
                        <a href="/checkout" class="btn btn-primary">checkout</a>
                    </form>
                @else
                    <div class="row">
                        <div class="col-sm-6 col-md-4 offset-md-4 offset-md-3">
                            <h2>No items in Cart</h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
@endsection

@section('styles')

@endsection

