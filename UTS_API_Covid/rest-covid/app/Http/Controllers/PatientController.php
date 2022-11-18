<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    // Method Get All Resource
    public function index()
    {
        $get_all_data = Patient::all();

        
        if ($get_all_data) {
            $data = [
                'Message' => "Get All Resource",
                'result' => $get_all_data
            ];
            
            return response($data, 200);
        } else {
            $data = [
                'Message' => "Data is empty!!"
            ]; 

            return response($data, 404);
        }
    }

    // Method Get Detail Resource
    public function show($id)
    {
        $get_detail_data = Patient::find($id);

        if ($get_detail_data) {
            $data = [
                'Message' => "Get Detail Resource",
                'Result' => $get_detail_data
            ];

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found"
            ];
            
            return response($data, 404);
        }
    }

    // Method Add Resource
    public function store(Request $request)
    {
        // Membuat validasi untuk data request
        $validateData = $request->validate([
            'name' => "required",
            'phone' => "required|numeric",
            'address' => "required",
            'status' => "required",
            'in_date_at' => "required|date",
            'out_date_at' => "required|date"
        ]);

        // Insert/Append data ke database
        $insertPatient = Patient::create($validateData);

        // Set data yang akan ditampilkan dalam bentuk array
        $data = [
            'Message' => "Resource is added successfully",
            'Result' => $insertPatient
        ];

        return response($data, 201);

    }

    // Method Update Resource
    public function update(Request $request, $id)
    {
        // Cari data di database berdasarkan id
        $patient = Patient::find($id);

        // Tangkap request data dan update
        if ($patient) {
            $input = [
                'name' => $request->name ?? $patient->name,
                'phone' => $request->phone ?? $patient->phone,
                'address' => $request->address ?? $patient->address,
                'status' => $request->status ?? $patient->status,
                'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
                'out_date_at' => $request->out_date_at ?? $patient->out_date_at
            ];

            // Update data di database
            $updateData = $patient->update($input);
            
            // Set data yang ditampilkan
            $data = [
                'Message' => "Resource is update successfully",
                'Result' => $patient
            ]; 

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found!!"
            ]; 

            return response($data, 404);
        }
    }

    // Method Delete Resource
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $destroyData = $patient->delete();

        if ($patient) {
            $destroyData;

            $data = [
                'Message' => "Resource is delete successfully"
            ];

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found"
            ];

            return response($data, 404);
        }
    }

    // Method Search Resource by name
    public function search($name)
    {
        $patient = Patient::where('name', 'like', '%'.$name.'%');
        $searchedPatient = $patient->get();

        if ($patient) {
            $data = [
                'Message' => "Get Searched Resource",
                'Result' => $searchedPatient
            ];

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found"
            ];

            return response($data, 404);
        }
    }

    // Method Positive Resource
    public function positive()
    {
        $patient = Patient::where('status', 'like', '%positive%');
        $searchedPatient = $patient->get();

        // Menghitung total data
        // $totalData = count($patient->get());
        $totalData = $patient->count();

        if ($totalData != null) {
            $data = [
                'Message' => "Get Positive Resource",
                'Total' => $totalData,
                'Result' => $searchedPatient
            ];

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found"
            ];

            return response($data, 404);

        }
        
    }

    // Method Recovered Resource
    public function recovered()
    {
        $patient = Patient::where('status', 'like', '%recovered%');
        $searchedPatient = $patient->get();

        // Menghitung total data
        // $totalData = count($patient->get());
        $totalData = $patient->count();

        if ($totalData != null) {
            $data = [
                'Message' => "Get Recovered Resource",
                'Total' => $totalData,
                'Result' => $searchedPatient
            ];

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found"
            ];

            return response($data, 404);
        }
        
    }

    // Method Dead Resource
    public function dead()
    {
        $patient = Patient::where('status', 'like', '%dead%');
        $searchedPatient = $patient->get();

        // Menghitung total data
        // $totalData = count($patient->get());
        $totalData = $patient->count();

        if ($totalData != null) {
            $data = [
                'Message' => "Get Dead Resource",
                'Total' => $totalData,
                'Result' => $searchedPatient
            ];

            return response($data, 200);
        } else {
            $data = [
                'Message' => "Resource not found"
            ];

            return response($data, 404);
        }
    }
}
