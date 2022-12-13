<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $capteurs = Note::factory()->count(20)->make();

        foreach ($capteurs as $capteur) {
            repeat:
            try {
                $capteur->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $capteur = Note::factory()->make();
                goto repeat;
            }
        }
    }
}
