<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Model Student
use App\Http\Models;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // $students = [
        //     "Nama" => "Gigih Zhafrans",
        //     "Rombel" => "TI17",
        //     "NIM" => "0110221087",
        //     "Jurusan" => "Teknik Informatika"
        // ];

        $students = Student::all();

        $data = [
            "Msg" => "Menampilkan Semua Data dalam Table Student",
            "Result" => $students
        ];

        return response($data, 200);
    }

    public function show($id)
    {
        $student = Student::find($id);

        $data = [
            "Msg" => "Menampilkan Satu Data Berdasarkan Id",
            "Result" => $student == "" ? "Data not found" : $student
        ];

        return response($data, $student == "" ? 404 : 200);
    }

    public function store(Request $request)
    {
        // Membuat Validasi untuk Data Request
        $validateData = $request->validate([
            'nama' => "required",
            'nim' => "required|numeric",
            'rombel' => "required",
            'jurusan' => "required",
            'peminatan' => "required"
        ]);

        $student = Student::create($validateData);

        $response = [
            "Msg" => "Created Student Resource Successfully"
            // "data" => $student
        ];

        return response($response, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {

            $input = [
                "nama" => $request->nama ?? $student->nama,
                "nim" => $request->nim ?? $student->nim,
                "rombel" => $request->rombel ?? $student->rombel,
                "jurusan" => $request->jurusan ?? $student->jurusan,
                "peminatan" => $request->peminatan ?? $student->peminatan
            ];

            $student->update($input);

            $response = [
                "Message" => "Resource Updated Successfully!!"
                // "Data" => $student
            ];

            return response($response, 200);
        } else {
            $response = [
                "Message" => "Data not found!!"
                // "Data" => $student
            ];

            return response($response, 404);
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->delete();

            $response = [
                "Message" => "Resource Has Been Destroyed!!"
                // "Data" => $student
            ];

            return response($response, 200);
        } else {
            $response = [
                "Message" => "Data not found!!"
                // "Data" => $student
            ];

            return response($response, 404);
        }
    }
}
