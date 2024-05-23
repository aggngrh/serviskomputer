<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(): View
    {
        $dataCustomer = Customer::latest()->paginate(10);
        return view('customer.index', compact('dataCustomer'));
    }

    public function create(): View
    {
        return view('customer.create');
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'nama_customer'   => 'required',
            'alamat'          => 'required',
            'jenis_kelamin'   => 'required'
        ]);

        Customer::create([
            'nama_customer'    => $request->nama_customer,
            'alamat'          => $request->alamat,
            'jenis_kelamin'   => $request->jenis_kelamin,
        ]);
        //redirect to index
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id_customer): View
    {
        $dataCustomer = Customer::findOrFail($id_customer);
        return view('customer.edit', compact('dataCustomer'));
    }

    public function show($id_customer): View
    {
        $customer = Customer::findOrFail($id_customer);

        return view('customer.show', compact('customer'));
    }
    public function update(Request $request, $id_customer): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_customer'    => 'required',
            'alamat'          => 'required',
            'jenis_kelamin'           => 'required'
        ]);

        $customer = Customer::findOrFail($id_customer);
        $customer->update([
            'nama_customer'     => $request->nama_customer,
            'alamat'  => ($request->alamat),
            'jenis_kelamin'     => $request->jenis_kelamin
        ]);

        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_customer): RedirectResponse
    {
        $customer = Customer::findOrFail($id_customer);
        $customer->delete();
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
