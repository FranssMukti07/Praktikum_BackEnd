// Import Student Model
const StudentModel = require("../models/Student.js");

// Membuat Class StudentController
class StudentController {
  async index(req, res) {
    const student_all = await StudentModel.all();

    const data = {
      message: "Menampilkan semua students",
      data: student_all
    };

    res.json(data);
  };

  async show(req, res) {
    const { id } = req.params;

    const student_find = await StudentModel.find(id);

    if (student_find == "") {
      const data = {
        Message: "Data not found!"
      };

      res.json(404, data);
    } else {
      const data = {
        message: `Menampilkan Data Student id: ${id}`,
        data: student_find
      };
  
      res.json(data);
    }
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

    const student_create = await StudentModel.create(ar_value);

    const data = {
      message: `Menambahkan data student: ${nama}`,
      data: ar_value
    };

    res.json(data);
  };

  /** 
  * 
  *
  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;
    
    students[id] = nama;
    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: students,
    };
    
    res.json(data);
  };
  
  destroy(req, res) {
    const { id } = req.params;
    
    students.splice(id, 1);
    const data = {
      message: `Menghapus student id ${id}`,
      data: students,
    };
    
    res.json(data);
  };
  *
  *
  */
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
