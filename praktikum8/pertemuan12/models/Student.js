// import database
const db = require("../config/database.js");

// buat model student
class Student {
    static all() {
        // Menggunakan promise untuk menghandle proses asynchronus
        return new Promise((resolve, reject) => {
            // Melakukan query ke db untuk mengambil data
            const sql = "SELECT * FROM students";
            db.query(sql, (err, results) => {
                resolve(results);
            });
        });
    };

    static find(id) {
        return new Promise((resolve, reject) => {
            const sql = `SELECT * FROM students WHERE id=?`;
            db.query(sql, [id] ,(err, results) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(results);
                };
            });
        });
    };

    static create(ar_value) {
        return new Promise((resolve, reject) => {
            const sql = `INSERT INTO students (nama, nim, rombel, jurusan, peminatan) VALUES (?)`;
            db.query(sql, [ar_value], (err, results) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(results);
                };
            });
        });
    };
}

// export class
module.exports = Student;