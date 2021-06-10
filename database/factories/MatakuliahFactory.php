<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Matakuliah;
use Faker\Generator as Faker;

$factory->define(Matakuliah::class, function (Faker $faker) {

    $daftar_matakuliah= [
        "Matematika","Fisika Dasar","Kimia Dasar","Pengantar Rekayasa & Desain",
        "Pengenalan Teknologi Informasi","Bahasa Inggris","Olah Raga",
        "Pengantar Rekayasa & Desain","Tata Tulis Karya Ilmiah",
        "Pengantar Analisis Rangkaian","Dasar Pemrograman","Algoritma & Struktur Data",
        "Matematika Diskrit","Logika Informatika","Probabilitas & Statistika",
        "Aljabar Geometri","Organisasi & Arsitektur Komputer",
        "Pemrograman Berorientasi Objek","Strategi Algoritma",
        "Teori Bahasa Formal dan Otomata","Sistem Operasi","Basis Data",
        "Dasar Rekayasa Perangkat Lunak","Pengembangan Aplikasi Berbasis Web",
        "Pengembangan Aplikasi pada Platform Khusus","Jaringan Komputer"];

    $jurusan_id = $faker->numberBetween(1, App\Jurusan::count());

    $array_dosen = App\Dosen::where('jurusan_id',$jurusan_id)->get('id');
    return [
        'kode' => strtoupper($faker->unique()->bothify('??###')),
        'nama' => $faker->randomElement($daftar_matakuliah),
        'jumlah_sks' => $faker->numberBetween(1,4),
        'jurusan_id' => $jurusan_id,
        'dosen_id' => $faker->randomElement($array_dosen),
    ];
});
