@extends('layouts.app')


@section('content')

<div class="container mb-4">
    <p>{{ count(\Cart::session(Auth::user()->id)->getContent()) }} cours dans le panier</p>
    <div class="jumbotron">
        @if(count(\Cart::session(Auth::user()->id)->getContent()) > 0)
        @php 
            $tax = \Cart::getTotal() / 10;
            $roundedTax = round($tax, 2);
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                
                    <table class="table table-striped">
                        <tbody>
                            @foreach(\Cart::session(Auth::user()->id)->getContent() as $course)
                            <tr>
                                <td><img class="cart-img" src="/storage/courses/{{ $course->model->user_id }}/{{ $course->model->image }}" /> </td>
                                <td><p><b>{{ $course->name }}</b></p><p>Par {{ $course->model->user->name }}</p></td>
                                <td class="text-right">{{ $course->price }} €</td>
                                <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Sub-Total</td>
                                <td class="text-right">{{ \Cart::getSubTotal() }} €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>Shipping</td>
                                <td class="text-right">{{ $roundedTax }} €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong>{{ \Cart::getTotal() - $roundedTax }} €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="{{ route('courses.index') }}" class="btn btn-block btn-light">Continue Shopping</a href="{{ route('courses.index') }}">
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        @else  
        <div class="empty-cart text-center">
            <i class="fas fa-shopping-cart fa-7x"></i>
            <h4 class="my-5">Votre panier est vide. Continuez vos achats et trouvez un cours !</h4>
            <a href="{{ route('courses.index') }}" class="primary-btn">
                Continuer vos achats
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
        @endif
    </div>
</div>

@endsection