# Kriptosistem Affine Cipher

Program aplikasi berbasis web (GUI) ini dibangun untuk mengimplementasikan algoritma **Affine Cipher** dalam melakukan enkripsi dan dekripsi pesan. Proyek ini dikembangkan menggunakan bahasa pemrograman PHP, tata letak antarmuka dengan Tailwind CSS, dan dikonfigurasi menggunakan Docker untuk kemudahan pengembangan kolaboratif. Program ini merupakan bagian dari pemenuhan Tugas Kriptografi di Program Studi Informatika, Universitas Sebelas Maret.

## Tentang Affine Cipher

Affine Cipher adalah salah satu jenis kriptografi substitusi abjad-tunggal (*monoalphabetic substitution*). Algoritma ini mengenkripsi huruf dengan mengonversinya menjadi angka (A=0, B=1, ..., Z=25), lalu menerapkan fungsi matematika linier dasar yang menggabungkan metode perkalian (*Multiplicative*) dan pergeseran (*Shift/Caesar*).

Metode ini beroperasi dalam ruang $m = 26$ (jumlah huruf alfabet) dan membutuhkan dua buah kunci:
*   **Kunci a (Multiplier):** Angka pengali yang berfungsi mengacak urutan huruf. Syarat mutlak pemakaian kunci ini adalah nilainya harus **relatif prima** dengan 26 (KPK/GCD = 1). Angka yang valid digunakan adalah bilangan ganjil selain 13 (contoh: 1, 3, 5, 7, 9, 11, 15, 17, 19, 21, 23, 25).
*   **Kunci b (Shift):** Angka pergeseran yang berfungsi menggeser posisi huruf setelah dikalikan. Nilainya bebas dari 0 hingga 25.

### Rumus Matematis
Proses enkripsi dan dekripsi menggunakan perhitungan *modulo* 26.

*   **Enkripsi:** 
    $C = (a \cdot P + b) \pmod{26}$
*   **Dekripsi:** 
    $P = a^{-1} \cdot (C - b) \pmod{26}$
    
*(Keterangan: C = Cipherteks, P = Plainteks, dan a^-1 = modular multiplicative inverse dari kunci a)*.

## Cara Menjalankan Program (Instalasi)

Aplikasi ini berjalan di atas *container* sehingga tidak memerlukan konfigurasi XAMPP atau PHP lokal. Pastikan **Git** dan **Docker Desktop** sudah terinstal dan berjalan di komputer.

1.  **Clone Repositori**
    Buka terminal dan unduh repositori ini ke dalam direktori lokal:
    ```bash
    git clone [https://github.com/](https://github.com/)[username-github-kamu]/Kriptografi-Affine-Chiper.git
    ```

2.  **Masuk ke Direktori Proyek**
    ```bash
    cd Kriptografi-Affine-Chiper
    ```

3.  **Jalankan Docker Container**
    Eksekusi perintah berikut untuk mengunduh *image* server PHP bawaan Apache dan menyalakan *container*:
    ```bash
    docker-compose up -d
    ```

4.  **Akses Aplikasi**
    Buka *web browser* dan akses alamat berikut:
    `http://localhost:8080`
    *(Jika terjadi error 403 Forbidden atau 404 Not Found, pastikan path mounting volume di file docker-compose.yml sudah benar dan restart container dengan docker-compose down lalu up -d).*

## Panduan Penggunaan Program

1.  **Input Pesan:** Masukkan teks yang ingin dienkripsi (plainteks) atau didekripsi (cipherteks) ke dalam kotak teks yang tersedia. Karakter selain huruf alfabet (angka, spasi, tanda baca) akan diabaikan dan dibiarkan seperti aslinya.
2.  **Masukkan Kunci:**
    *   Tentukan nilai **Kunci a** (pastikan ganjil dan bukan 13). Program akan memberikan peringatan jika angka tidak memenuhi syarat relatif prima.
    *   Tentukan nilai **Kunci b** (bebas dari 0 - 25).
3.  **Pilih Format Output:** (Khusus untuk proses enkripsi). Pilih apakah hasil cipherteks ingin ditampilkan secara normal (mempertahankan spasi asli), tanpa spasi, atau dikelompokkan menjadi 5-huruf per blok.
4.  **Eksekusi:** Klik tombol **Enkripsi Teks** atau **Dekripsi Teks**. Hasilnya akan langsung muncul di kotak output teks di bagian bawah.