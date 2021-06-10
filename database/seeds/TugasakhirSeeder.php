<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TugasakhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
                'mahasiswa_id'=> '1',
                'judul' => 'Perancangan Perangkat Lunak Tender untuk Jasa Konsultan'
                ],
                [
                'mahasiswa_id'=> '2',
                'judul' => 'Perangkat Lunak Pemenuhan Kebutuhan Gizi pada Orang Sakit'
                ],
                [
                'mahasiswa_id'=> '3',
                'judul' => 'Membangun Aplikasi Pustaka (Pusat Data Informatika) Berbasis Web'
                ],
                [
                'mahasiswa_id'=> '4',
                'judul' => 'Aplikasi Algoritma Minimax pada Permainan Checkers'
                ]
            ];
            foreach($data as $d){
                DB::table('tugasakhirs')->insert([
                    'mahasiswa_id' => $d['mahasiswa_id'],
                    'judul' => $d['judul']
                ]);
            }
    }
}
