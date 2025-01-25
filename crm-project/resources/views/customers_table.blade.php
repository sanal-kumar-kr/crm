


        <!-- Customer Table -->
        <table class="table text-white mt-4" id="customer-table">
            <thead>
                
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
   
    
    

