@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">


            <div class="panel panel-default">
                <div class="panel-heading"><span class="pull-right"><a href="#" class="btn btn-info btn-sm">View All Orders</a></span></div>

                <div class="panel-body">

                    <h3> Your Orders </h3>
                    <hr/>

                 @if(count($orders) > 0)
                        <table class="table table-striped table-responsive">
                            <tr>
                                <th>User</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Actions</th>
                                <th></th>
                            </tr>

                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->user->name}}</td>

                                    @foreach($order->products as $product)
                                        <td>{{$product->name }}</td>
                                        <td>{{$product->price }}</td>
                                    @endforeach

                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->total}} eur</td>
                                    <td>{{$order->created_at}}</td>
                                    <td><a href="/orderx/orders/{{$order->id}}/edit" class="btn btn-sm btn-primary">Edit</a>

                                        
                                    </td>
                                    <td>

                                     {!! Form::open(['action' => ['OrdersController@destroy', $order->id], 'method' => 'POST', 'onsubmit' => 'return ConfirmDelete()']) !!}
                                           
                                            {{Form::hidden('_method', 'DELETE')}}


                                            {{Form::submit('Del', ['class' => 'btn btn-sm btn-danger']) }}
                                        
                        
                                         {!! Form::close() !!}

                                         <script>

                                              function ConfirmDelete()
                                              {
                                              var x = confirm("Are you sure you want to delete?");
                                              if (x)
                                                return true;
                                              else
                                                return false;
                                              }

                                            </script>
                                        

                                    </td>
                                </tr>



                            @endforeach




                        </table>
                    @else 
                        <p>You have no orders yet </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection