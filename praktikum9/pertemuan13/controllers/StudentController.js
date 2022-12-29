// Import Student Model
const StudentModel = require("../models/Student.js");

// Membuat Class StudentController
class StudentController {
  async index(req, res) {
    const student_all = await StudentModel.all();

    if (student_all.length > 0) {
      const data = {
        message: "Menampilkan semua students",
        data: student_all
      };
  
      res.status(200).json(data);
    } else {
      const data = {
        message: "Data tidak ada!"
      };

      res.status(404).json(data);
    };
  };

  async show(req, res) {
    const { id } = req.params;

    const student_find = await StudentModel.find(id);

    if (student_find) {
      const data = {
        message: `Menampilkan Data Student id: ${id}`,
        data: student_find
      };
      
      res.status(200).json(data);
    } else {
      const data = {
        Message: "Data not found!"
      };
  
      res.status(404).json(data);
    };
  };

  async store(req, res) {
    const {
      nama,
      nim,
      rombel,
      jurusan,
      peminatan
    } = req.body;

    const ar_value = [nama,nim,rombel,jurusan,peminatan];

    if (!nama || !nim || !rombel || !jurusan || !peminatan) {
      const data = {
        message: "Semua data harus dibuat!"
      };

      res.status(422).json(data);
    } else {
      const student_create = await StudentModel.create(ar_value);
  
      const data = {
        message: `Menambahkan data student: ${nama}`,
        data: ar_value
      };
  
      res.status(201).json(data);
    };
  };

  async update(req, res) {
    const { id } = req.params;
    const {
      nama,
      nim,
      rombel,
      jurusan,
      peminatan
    } = req.body;
    
    const ar_value = [nama,nim,rombel,jurusan,peminatan];

    const find_id = await StudentModel.find(id);

    if (find_id) {
      const student_update = await StudentModel.update(id, req.body);

      const data = {
        message : `Mengupdate student id ${id}`,
        data : ar_value
      };

      res.json(data);
    } else {
      const data = {
        message : "Data tidak ada!"
      };

      res.status(404).json(data);
    };
  };
  
  async destroy(req, res) {
    const { id } = req.params;
    
    const student_find = await StudentModel.find(id);

    if (student_find) {
      const student_delete = await StudentModel.delete(id);

      const data = {
        message: `Menghapus student id ${id}`
      };
      
      res.status(200).json(data);
    } else {
      const data = {
        message : "Data tidak ada!"
      };

      res.status(404).json(data);
    };
  };
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
