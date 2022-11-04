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

        return response($students, 200);
    }

    public function store(Request $request)
    {
        // Tangkap Inputan
        $input = [
            "nama" => $request->nama,
            "nim" => $request->nim,
            "rombel" => $request->rombel,
            "jurusan" => $request->jurusan,
            "peminatan" => $request->peminatan
        ];

        $student = Student::create($input);

        $response = [
            "Msg" => "Created Student Resource Successfully"
            // "data" => $student
        ];

        return response($response, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::where('id', $id)->update(
            [
                "nama" => $request->nama,
                "nim" => $request->nim,
                "rombel" => $request->rombel,
                "jurusan" => $request->jurusan,
                "peminatan" => $request->peminatan
            ]
        );

        $response = [
            "Message" => "Resource Updated Successfully!!"
            // "Data" => $student
        ];

        return response($response, 200);
    }

    public function destroy($id)
    {
        $student = Student::where('id', $id)->delete();

        $response = [
            "Message" => "Resource Has Been Destroyed!!"
            // "Data" => $student
        ];

        return response($response, 200);
    }
}
