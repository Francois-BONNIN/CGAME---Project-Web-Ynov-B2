@extends('layouts.app')
  
  <!-- Navbar -->

@section('content')  
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="py-2 pb-3 h2 text-center">Commande</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <form class="card-body">
              <div class="row">
                <h2 class="col-md-12 mb-4 text-center"> Identité </h2>
                
                <div class="col-md-6 mb-2">
                  <div class="md-form ">
                    <label for="firstName" class="">Prénom</label>
                    <input type="text" id="firstName" class="form-control" value="{{ $user -> firstname }}">
                  </div>
                </div>

                <div class="col-md-6 mb-2">
                  <div class="md-form">
                    <label for="lastName" class="">Nom</label>
                    <input type="text" id="lastName" class="form-control" value="{{ $user -> lastname }}">
                  </div>
                </div>
              </div>

              <!--email-->
              <div class="md-form mt-2 mb-5">
                <label for="email" class="">Email</label>
                <input type="text" id="email" class="form-control" value="{{ $user -> email }}">
              </div>

              <hr>
              <h2 class="text-center my-4 "> Paiement </h2>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Carte de crédit</label>
                </div>
                
                <div class="custom-control custom-radio">
                  <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">Paypal</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Nom de la carte</label>
                  <input type="text" class="form-control" id="cc-name" placeholder="" required>
                  <small class="text-muted">Nom complet indiqué sur la carte</small>
                  <div class="invalid-feedback">
                    Le nom sur la carte est requise
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Numéro de la carte de crédit</label>
                  <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  <div class="invalid-feedback">
                    Le numéro de la carte de crédit est requise
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="cc-expiration">Expiration</label>
                  <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  <div class="invalid-feedback">
                    EDate d'expiration requise
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  <div class="invalid-feedback">
                    Code de sécurité requis
                  </div>
                </div>
              </div>
              <hr class="mb-4">
              <a href="{{ route('purchases.create') }}" class="btn btn-outline-danger btn-lg btn-block" type="submit">Valider</a>

            </form>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="">Votre panier</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
            @foreach (Cart::content() as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{ $product -> name }}</h6>
                <form action="{{ route('carts.destroy', $product->rowId) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger fakebtn"><small>Supprimer</small></button>
                </form>
              </div>
              <h6 >{{ $product -> price}}</h6>
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (€)</span>
              <strong>{{ Cart::subtotal() }}</strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Bon de réduction" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-danger btn-md waves-effect m-0" type="button">Récupérer</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  <!--Main layout-->
@endsection
  