<?php

# membuat class Animal
class Animal
{
    # property animals
    public $animals;

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($animals)
    {
        $this->animals = $animals;
    }

    # method index - menampilkan data animals
    public function index()
    {
        foreach($this->animals as $x) {
            echo $x;
            echo "<br/>";
        }
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($hewan)
    {
        # gunakan method array_push untuk menambahkan data 
        array_push($this->animals, $hewan);
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $hewan)
    {
        $this->animals[$index] = $hewan;
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        # gunakan method unset atau array_splice untuk menghapus data array
        unset($this->animals[$index]);
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(["Kucing", "Buaya", "Kecebong"]);

echo "<b>Index - Menampilkan seluruh hewan <br></b>";
$animal->index();
echo "<br>";

echo "<b>Store - Menambahkan hewan baru <br></b>";
$animal->store('Burung');
$animal->index();
echo "<br>";

echo "<b>Update - Mengupdate hewan <br></b>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "<b>Destroy - Menghapus hewan <br></b>";
$animal->destroy(1);
$animal->index();
echo "<br>";


?>