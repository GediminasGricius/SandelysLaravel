@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Produktai</div>

                    <div class="card-body">
                     <a href="{{ route('products.create') }}" class="btn btn-success">Pridėti naują</a>

                      <table class="table">
                          <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Kiekis</th>
                                <th>Kaina</th>
                                <th>Sandelys</th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->warehouse->name }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success">Redaguoti</a>


                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button  class="btn btn-danger">Ištrinti</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
