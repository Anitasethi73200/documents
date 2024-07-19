<?php

namespace App\Http\Controllers;

use App\DataTables\InboxDataTable;
use App\DataTables\ReceiptDataTable;
use App\DataTables\SentDataTable;
use App\Models\Category;
use App\Models\Communication;
use App\Models\Country;
use App\Models\Deliverymode;
use App\Models\Department;
use App\Models\Receipt;
use App\Models\Receiptshare;
use App\Models\Sendertype;
use App\Models\State;
use App\Models\Subcategory;
use App\Models\Vip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    public function index(ReceiptDataTable $table)
    {
        return $table->render('receipt.index');
    }

    public function create()
    {
        $communication = Communication::all();
        $deliverymode = Deliverymode::all();
        $sendertype = Sendertype::all();
        $vip = Vip::all();
        $department = Department::all();
        $country = Country::all();
        $state = State::all();
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('receipt.create', compact('communication', 'deliverymode', 'sendertype', 'vip', 'department', 'country', 'state', 'category', 'subcategory'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'form_of_communication' => 'required',
            'receved_date' => 'required',
            'delivery_mode' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'address' => 'required',
            'subject' => 'required',
        ]);
        $receipt = new Receipt();
        $receipt->receipt_status = $request->input('receipt_status');
        $receipt->receipt_file = $request->input('receipt_file');
        $receipt->dairy_date = $request->input('dairy_date');
        $receipt->form_of_communication = $request->input('form_of_communication');
        $receipt->language = $request->input('language');
        $receipt->receved_date = $request->input('receved_date');
        $receipt->letter_ref_no = $request->input('letter_ref_no');
        $receipt->letter_date = $request->input('letter_date');
        $receipt->delivery_mode = $request->input('delivery_mode');
        $receipt->mode_number = $request->input('mode_number');
        $receipt->sender_type = $request->input('sender_type');
        $receipt->vip = $request->input('vip');
        $receipt->name = $request->input('name');
        $receipt->department = $request->input('department');
        $receipt->designation = $request->input('designation');
        $receipt->organitation = $request->input('organitation');
        $receipt->email = $request->input('email');
        $receipt->address = $request->input('address');
        $receipt->pin_code = $request->input('pin_code');
        $receipt->phone_number = $request->input('phone_number');
        $receipt->country = $request->input('country');
        $receipt->state = $request->input('state');
        $receipt->city = $request->input('city');
        $receipt->category = $request->input('category');
        $receipt->subcategory = $request->input('subcategory');
        $receipt->subject = $request->input('subject');
        $receipt->remarks = $request->input('remarks');
        $receipt->save();

        return redirect()->route('receipt.index');
    }

    public function edit(Receipt $receipt)
    {
        $communication = Communication::all();
        $deliverymode = Deliverymode::all();
        $sendertype = Sendertype::all();
        $vip = Vip::all();
        $department = Department::all();
        $country = Country::all();
        $state = State::all();
        $category = Category::all();
        $subcategory = Subcategory::all();

        return view('receipt.edit', compact('receipt', 'communication', 'deliverymode', 'sendertype', 'vip', 'department', 'country', 'state', 'category', 'subcategory'));
    }

    public function update(Request $request, Receipt $receipt)
    {

        $receipt = Receipt::findOrFail($receipt['id']);

        $this->validate(
            $request,
            [
                'form_of_communication' => 'required',
                'receved_date' => 'required',
                'delivery_mode' => 'required',
                'name' => 'required',
                'designation' => 'required',
                'address' => 'required',
                'subject' => 'required',

            ]
        );
        $input = $request->all();
        $receipt->receipt_file = $request->input('receipt_file');
        $receipt->fill($input)->save();

        return redirect()->route('receipt.index')->with(
            'success',
            'receipt ' . $receipt->receipt . 'updated!'
        );
    }

    public function destroy($id)
    {

        $receipt = Receipt::where('id', $id)->firstorfail()->delete();
        return redirect()->route('receipt.index')->with('success', __('sendertype deleted successfully.'));
    }
    public function receiptshare($id)
    {

        $department = Department::all();
        $receipt = Receipt::find($id);
        return view('receipt.share', compact('department', 'receipt'));

    }
    public function receiptshare_store(Request $request)
    {

        $request->validate([
            'department_id' => 'required',
            'section_id' => 'required',
        ]);
        $userId = Auth::id();
        $receiptshare = new Receiptshare();
        $receiptshare->receipt_id = $request->input('receipt_id');
        $receiptshare->recever_id = $request->input('user');
        $receiptshare->sender_id = $userId;
        $receiptshare->department_id = $request->input('department_id');
        $receiptshare->section_id = $request->input('section_id');
        $receiptshare->save();

        return redirect()->route('receipt.index');

    }

    public function inbox(InboxDataTable $table)
    {
        return $table->render('receipt.inbox');
    }
    public function sent(SentDataTable $table)
    {
        return $table->render('receipt.sent');
    }
    public function search(ReceiptDataTable $table)
    {
        return $table->render('receipt.sent');
    }

}
