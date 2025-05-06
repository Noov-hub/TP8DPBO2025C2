# TP8DPBO2025C2
isinya TP8 DPBO Sem 4

# Janji
Saya Ibnu Fadhilah dengan NIM 2300613 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.


# Sistem Manajemen Mahasiswa - Arsitektur MVC

## 📁 Struktur Proyek
```
student_mvc/
├── config/
│   └── database.php       # Konfigurasi database
├── controllers/
│   ├── StudentController.php  # Logika bisnis mahasiswa
│   ├── CourseController.php   # Logika bisnis mata kuliah
│   └── StudentCourseController.php # Logika enrollmen
├── models/
│   ├── Database.php       # Koneksi database
│   ├── Student.php        # Operasi data mahasiswa
│   ├── Course.php         # Operasi data mata kuliah
│   └── StudentCourse.php  # Operasi enrollmen
├── views/
│   ├── students/
│   │   ├── index.php      # Tampilan daftar mahasiswa
│   │   ├── create.php     # Form tambah mahasiswa
│   │   └── edit.php       # Form edit mahasiswa
│   ├── courses/           # Tampilan mata kuliah (struktur serupa)
│   └── layouts/
│       └── main.php       # Template HTML utama
├── public/
│   ├── assets/            # File CSS/JS
│   └── index.php          # Front controller
└── .htaccess              # URL rewriting
```

## 🌟 Fitur Utama
1. **CRUD Mahasiswa** (Buat, Baca, Update, Hapus)
2. **Manajemen Mata Kuliah**
3. **Enrollmen Mahasiswa-Mata Kuliah**
4. **Pemisahan Arsitektur MVC**

## 🔄 Alur Program

### 🚀 Titik Masuk
1. Semua request diarahkan melalui `public/index.php` (Front Controller)
2. Struktur URL: `index.php?action=[nama_action]&id=[optional_id]`

### 🔄 Alur CRUD Umum
1. **Tampilan Daftar** (`index` action):
   ```
   Pengguna → index.php?action=index → StudentController@index → StudentModel → TampilanDaftarMahasiswa
   ```

2. **Operasi Tambah**:
   ```
   GET create → Tampilkan form kosong
   POST create → Proses form → Simpan ke DB → Redirect ke daftar
   ```

3. **Operasi Edit**:
   ```
   GET edit?id=1 → Muat data mahasiswa → Tampilkan form terisi
   POST edit → Proses form → Update DB → Redirect ke daftar
   ```

4. **Operasi Hapus**:
   ```
   GET delete?id=1 → Hapus record → Redirect ke daftar
   ```

### 🛠️ Highlight Teknis
1. **Layer Database**:
   - Koneksi database singleton
   - Parameterized queries untuk mencegah SQL injection
   - Penanganan error terpusat

2. **Layer View**:
   - Template inheritance (`main.php` layout)
   - Output buffering untuk generasi HTML bersih
   - Validasi form di client dan server side

3. **Layer Controller**:
   - Pemisahan tanggung jawab yang ketat
   - Penanganan method GET vs POST
   - Pola redirect-after-POST

## 📚 Best Practices yang Diterapkan
1. **Keamanan**:
   - Sanitasi input
   - HTML escaping
   - Prepared statements

2. **Prinsip MVC**:
   - Model hanya menangani data
   - View hanya berisi presentasi
   - Controller hanya mengatur alur

3. **Organisasi Kode**:
   - Pemisahan tanggung jawab
   - Konvensi penamaan yang bermakna
   - Gaya kode yang konsisten
