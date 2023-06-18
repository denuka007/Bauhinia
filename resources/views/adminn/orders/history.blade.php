@extends('layouts.admin')

@section('title')
    Orders
@endsection


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Order History
                        <a href="{{'orders'}}" class="btn btn-danger btn-sm float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                           <tr>
                               <th>Order Date</th>
                               <th>Tracking Number</th>
                               <th>Total Price</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($orders as $item)
                           <tr>
                               <td>{{ date('d.m.Y', strtotime($item->created_at)) }}</td>
                               <td>{{ $item->tracking_no }}</td>
                               <td>{{ $item->total_price }}</td>
                               <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                               <td>
                                   <a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-success">View</a>
                               </td>
                           </tr>
                        </tbody>
                        @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
