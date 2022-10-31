@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sandėliai</div>

                    <div class="card-body">
                     <a href="{{ route('warehouse.create') }}" class="btn btn-success">Pridėti naują</a>

                      <table class="table">
                          <thead>
                            <tr>
                                <th>Pavadinimas</th>
                                <th>Adresas</th>
                                <th>Miestas</th>
                                <th></th>
                                <th colspan="2">Veiksmai</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($warehouses as $warehouse)
                                <tr>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->address }}</td>
                                    <td>{{ $warehouse->city }}</td>

                                    <td>
                                        <a href="{{ route('warehouseProducts',$warehouse->id) }}" class="btn btn-success">Prekės</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="btn btn-success">Redaguoti</a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('warehouse.destroy', $warehouse->id) }}">
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
