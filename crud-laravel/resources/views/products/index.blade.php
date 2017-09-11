@extends('layout')
@section('content')
	<div class="col-sm-8">
		<h2>
			Listado de productos
			<a href="{{ route('products.create') }}" class="btn btn-primary pull-right" > nuevo</a>
			<table>
				<thead>
					<tr>
						<th width="20px">ID</th>
						<th>Nombre del producto</th>
						<th colspan="3">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td>{{ $product->id }}</td>
						<td>
							<strong> {{ $product->name }} </strong>
							{{$product->short}}
						</td>
            <td>
              <a href="{{ route('products.show',$product->id)}}"class="btn btn-link"> Ver </a>
            </td>
						<td>
              <a href="{{ route('products.edit',$product->id) }}" class="btn btn-link"> Editar</a>
            </td>
            <td>
              <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-link">Borrar </button>
              </from>
            </td>
					</tr> 
					@endforeach
				</tbody>
			</table>
			{!! $products->render()!!}
		</h2>	
	</div>
	<div class="col-sm-4">
		mensaje
	</div>
@endsection
