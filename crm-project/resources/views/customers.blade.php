@extends('layouts.layout')
@section('content')

   <div class="container mt-5">
        <a href="{{url('/add-customer')}}" class="btn btn-warning text-white">Add Customer</a>
        <a href="{{ route('customers.export.pdf') }}" class="text-white btn-warning"><Button>Export to PDF</Button></a>
        
        <div class="mt-4">
            <div class="container">
            <input type="text" id="search" class="form-control" placeholder="Search by name or email...">
            <select id="group-filter" class="form-control mt-2">
                <option value="">Filter by Group</option>
                <option value="Individual">Individual</option>
                <option value="Company">Company</option>
                <option value="VIP">VIP</option>
            </select>
            <select id="created-by-filter" class="form-control mt-2">
                <option value="">Filter by created_by</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            </div>
        </div>

        <table class="table text-white mt-4" id="customer-table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Group</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->group }}</td>
                        <td>{{ $customer->creator->name }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ url('/customers/'.$customer->id) }}" class="text-white btn-warning"><button>Edit</button></a>
                            <form action="{{ url('customers/'.$customer->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn-warning">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
@endsection


