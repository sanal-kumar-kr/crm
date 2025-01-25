<?php

namespace App\Http\Controllers;

use App\Models\CustomersModel;
use App\Models\User;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = CustomersModel::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                      ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
           
        }
        if ($request->has('group') && $request->group != '') {
            $query->where('group', $request->group);
        }
        if ($request->has('created_by') && $request->created_by != '') {
            $query->where('created_by', $request->created_by);
        }
        $customers= $query->get();
        $users = User::all();

        if ($request->ajax()) {
            $html = view('customers_table', compact('customers','users'))->render();
            return response()->json($html, 200);
        }
        if ( $request->wantsJson()) {
            return response()->json($customers, 200);
        }
        return view('customers', compact('customers','users'));
    }
 

    public function show(Request $request, $id)
    {
        $customer = CustomersModel::find($id);

        if (!$customer) {
            return $this->responseNotFound();
        }

        if ($request->wantsJson()) {
            return response()->json($customer, 200);
        }

        return view('customer-edit', compact('customer'));
    }

    public function storeCustomer(Request $request)
    {
        if($request->isMethod('get')){
              return view('customer-form');
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:customers,name',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|min:12|max:15|regex:/^\+91\d{10}$/|unique:customers,phone',
            'address' => 'required',
            'group' => 'required'
        ]);
        $user = $request->user();
        if ($user->role == 'manager') {
            if (!in_array($validatedData['group'], ['Individual', 'Company'])) {
                return response()->json(['message' => 'Managers can only create customers in "Individual" or "Company" groups.'], 403);
            }
        }
        $validatedData['created_by'] = $user->id;
        $customer = CustomersModel::create($validatedData);
        if ($request->wantsJson()) {
            return response()->json($customer, 201);
        }
        return redirect()->route('customers_view');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:customers,name,' . $id,
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'required|min:12|max:15|regex:/^\+91\d{10}$/|unique:customers,phone,' . $id,
            'address' =>'required|string',
            'group' => 'required|string'
        ]);
        
        $customer = CustomersModel::find($id);

        if (!$customer) {
            return $this->responseNotFound();
        }
        $user = $request->user();
        $validatedData['created_by'] = $user->id;
        $customer->update($validatedData);
        if ($request->wantsJson()) {
            return response()->json($customer, 200);
        }
        return redirect()->route('customers_view');
    }

    public function destroy(Request $request,$id)
    {
        if(auth()->user()->role !== "admin")
        {
            return response()->json(['message' => 'Access Denied'], 403);   
        }

        $customer = CustomersModel::find($id);
        if (!$customer) {
            return $this->responseNotFound();
        }
        $customer->delete();
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Customer deleted'], 200);
        }
        return redirect()->route('customers_view');
    }
  
    public function getCustomerGroups(Request $request)
    {
        
        $result = [
            'Individual' => CustomersModel::where('group', 'Individual')->count(),
            'Company' => CustomersModel::where('group', 'Company')->count(),
            'VIP' => CustomersModel::where('group', 'VIP')->count(),
        ];
    
        return response()->json($result);
    }

    public function exportToPDF()
    {
        $customers = CustomersModel::all();
    
        $pdf = app('dompdf.wrapper');
        
        $pdf->loadView('pdf', compact('customers'));
    
        return $pdf->download('customers_list.pdf');
    }
    private function responseNotFound()
    {
        return response()->json(['message' => 'Customer not found'], 404);
    }
}
