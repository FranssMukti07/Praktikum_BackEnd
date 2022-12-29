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
            db.query(sql, id ,(err, results) => {
                const [student] = results;
                resolve(student);
            });
        });
    };

    static create(ar_value) {
        return new Promise((resolve, reject) => {
            const data = [...Object.values(ar_value), new Date(), new Date()];
            const sql = `INSERT INTO students (nama, nim, rombel, jurusan, peminatan, created_at, updated_at) VALUES (?)`;
            db.query(sql, [data], (err, results) => {
                if (err) {
                    reject(err);
                } else {
                    resolve(results);
                };
            });
        });
    };

    static async update(id, data) {
        return new Promise((resolve, reject) => {
            const sql = `UPDATE students SET ?, created_at=?, updated_at=? WHERE id=?`;
            db.query(sql, [data, new Date(), new Date(), id], (err, results) => {
                resolve(results);
            });
        });
    };

    static delete(id) {
        return new Promise((resolve, reject) => {
            const sql = `DELETE FROM students WHERE id = ?`;
            db.query(sql, id, (err, results) => {
                resolve(results);
            });
        });
    };
}

// export class
module.exports = Student;