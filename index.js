const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const multer = require('multer');
const path = require('path');

const app = express();
const port = 3200;

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Konfigurasi koneksi ke database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'kerjaprojek2'
});

const cors = require('cors');
app.use(cors());

// Set up the static folder for serving files
app.use(express.static(path.join(__dirname, 'Gambar')));

app.use(function(req, res, next) {
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE');
  res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type, Authorization');
  next();
});

// Koneksi ke database
connection.connect((err) => {
  if (err) throw err;
  console.log('Database terkoneksi!');
});

const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    cb(null, 'Gambar/');
  },
  filename: (req, file, cb) => {
    cb(null, Date.now() + '-' + file.originalname);
  }
});

const upload = multer({ storage: storage });

// Menangani proses upload file
app.post('/Gambar', upload.fields([{ name: 'visitorPhotos', maxCount: 1 }]), (req, res) => {
  if (req.files) {
    console.log('Files berhasil diupload:', req.files);
    res.send('Files berhasil diupload');
  } else {
    console.log('Files gagal diupload');
    res.send('Files gagal diupload');
  }
});

app.get('/visitor', (req, res) => {
  const sql = `SELECT visitorhead.idVisitor, visitorhead.visitorName, visitorhead.companyName, visitorhead.visitorPhotos, visitorvisit.visitDate, visitorvisit.visitPurpose, visitorvisit.whosVisited ,visitorvisit.clockIn, visitorvisit.clockOut, visitorvisit.aktif FROM visitorhead INNER JOIN visitorvisit ON visitorhead.idVisitor = visitorvisit.idVisitor`;

  connection.query(sql, (err, result) => {
    if (err) {
      console.error(err);
      res.status(500).send('Terjadi kesalahan saat mengambil data dari database');
      return;
    }
    res.send(result);
  });
});

app.post('/visitor', upload.fields([{ name: 'visitorPhotos', maxCount: 1 }]), (req, res) => {
  const { visitorName, companyName, visitDate, visitPurpose, whosVisited, Devisi ,clockIn, clockOut, Bulan, Tahun ,aktif } = req.body;
   const visitorPhotos = req.files && req.files['visitorPhotos'] && req.files['visitorPhotos'][0] ? req.files['visitorPhotos'][0].filename : null;

  if (!visitorPhotos ) {
    res.status(400).send('File tidak ditemukan');
    return;
  }

  const sql1 = `INSERT INTO visitorhead (visitorName, companyName,  visitorPhotos) VALUES (?, ?, ?)`;

  const sql2 = `INSERT INTO visitorvisit (idVisitor, visitDate, visitPurpose, whosVisited, Devisi ,clockIn, clockOut, Bulan, Tahun, aktif) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;
  
  connection.query(sql1, [visitorName, companyName,  visitorPhotos], (err, result) => {
    if (err) {
      console.error(err);
      res.status(500).send('Terjadi kesalahan saat menyimpan data ke database');
      return;
    }
    console.log(`Data visitorhead berhasil disimpan dengan ID ${result.insertId}`);
    const idVisitor = result.insertId;
    connection.query(sql2, [idVisitor, visitDate, visitPurpose, whosVisited, Devisi ,clockIn, clockOut, Bulan, Tahun ,aktif], (err, result) => {
      if (err) {
        console.error(err);
        res.status(500).send('Terjadi kesalahan saat menyimpan data ke database');
        return;
      }
      console.log(`Data visitorvisit berhasil disimpan dengan ID ${result.insertId}`);
      res.send('Data berhasil disimpan ke database');  });
  });
  });
  
  app.get('/visitor', (req, res) => {
    const sql = `
      SELECT visitorhead.idVisitor, visitorhead.visitorName, visitorhead.companyName,
             visitorhead.visitorPhotos, visitorvisit.visitDate, visitorvisit.visitPurpose,
             visitorvisit.whosVisited, karyawan.Devisi, visitorvisit.clockIn,
             visitorvisit.clockOut, visitorvisit.aktif
      FROM visitorhead
      INNER JOIN visitorvisit ON visitorhead.idVisitor = visitorvisit.idVisitor
      INNER JOIN karyawan ON visitorvisit.whosVisited = karyawan.Nama_Karyawan
    `;
  
    connection.query(sql, (err, result) => {
      if (err) {
        console.error(err);
        res.status(500).send('Terjadi kesalahan saat mengambil data dari database');
        return;
      }
      res.send(result);
    });
  });
  
  app.get('/Devisi/:nama', (req, res) => {
    const nama = req.params.nama;
    const sql = `SELECT Devisi FROM karyawan WHERE Nama_Karyawan = ?`;
  
    connection.query(sql, [nama], (err, result) => {
      if (err) {
        console.error(err);
        res.status(500).send('Terjadi kesalahan saat mengambil data dari database');
        return;
      }
  
      if (result.length === 0) {
        res.status(404).send('Nama karyawan tidak ditemukan');
        return;
      }
  
      const devisi = result[0].Devisi;
      res.send({ devisi });
    });
  });

  app.get('/whosvisited-options', (req, res) => {
    const sql = 'SELECT Nama_Karyawan AS name FROM karyawan';
  
    connection.query(sql, (err, result) => {
      if (err) {
        console.error(err);
        res.status(500).send('Terjadi kesalahan saat mengambil data dari database');
        return;
      }
  
      res.send({ options: result });
    });
  });


  app.listen(port, () => {
  console.log(`Server berjalan pada http://localhost:${port}`);
  });