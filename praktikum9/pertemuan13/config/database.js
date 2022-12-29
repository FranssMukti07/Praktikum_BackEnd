const mysql = require("mysql");

// import dotenv
const dotenv = require("dotenv");
dotenv.config();

// Destructing object process.env
const {
    DB_HOST,
    DB_DATABASE,
    DB_PASSWORD,
    DB_USER
} = process.env;

// buat koneksi
const db  = mysql.createConnection({
    host: DB_HOST,
    user: DB_USER,
    password: DB_PASSWORD,
    database: DB_DATABASE,
});

// konekkan ke database
db.connect(function(err){
    if (err) {
        console.log(`Koneksi Error: ${err}`);
        return;
    } else {
        console.log(`Koneksi berhasil`);
        return;
    }
});

// export db
module.exports = db;