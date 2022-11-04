<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    # property animals
    public $animals=["Kambing","Badak","Paus","Iguana"];
    // public $data;

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    # public function __construct($data)
    # {
    #     $this->data = $data;
    #     $this->animals = $this->data;
    # }

    # method index - menampilkan data animals
    public function index()
    {
        foreach ($this->animals as $x) {
            echo $x;
            echo "<br/>";
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store(Request $request)
    {
        # gunakan method array_push untuk menambahkan data 
        array_push($this->animals, $request->nama);
        echo "Hewan $request->nama berhasil di tambahkan!!<br/>";
        foreach ($this->animals as $x) {
            echo $x . "<br/>";
        }
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update(Request $request, $id)
    {
        $this->animals[$id] = $request->nama;
        echo "Hewan index ke - $id berhasil di update menjadi $request->nama <br/>";
        foreach ($this->animals as $x) {
            echo $x . "<br/>";
        }
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($id)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        unset($this->animals[$id]);
        echo "Hewan index ke - $id berhasil dihapus!!";
    }

}
