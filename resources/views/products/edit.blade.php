@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Prekiė</div>

                    <div class="card-body">

                        <form method="POST" action="{{ isset($product)?route('products.update',$product->id):route('products.store') }}">
                            @csrf

                            @if (isset($product))
                                @method('put')
                            @endif

                            <div class="mb-3">
                                <label class="form-label">Pavadinimas</label>
                                <input type="text" name="name" class="form-control" value="{{ isset($product)?$product->name:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kiekis</label>
                                <input type="text" name="quantity" class="form-control"  value="{{ isset($product)?$product->quantity:'' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kaina</label>
                                <input type="text" name="price" class="form-control"  value="{{ isset($product)?$product->price:'' }}">
                            </div>
                            <div class="mb-3">
                                <select name="warehouse_id" class="form-select">
                                    @foreach($warehouses as $warehouse)
                                        <option  value="{{$warehouse->id}}" {{ isset($product)&&($warehouse->id==$product->warehouse_id)?'selected':'' }}> {{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">{{ isset($product)?'Išsaugoti':'Pridėti' }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
