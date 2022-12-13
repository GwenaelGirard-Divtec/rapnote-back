<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;


class NoteFactory extends Factory
{
    /**
     * Le nom du modèle correspondant.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titre'         => $this->faker->numerify('Nouvelle note ###'), // Phrase avec texte aléatoire
            'contenu'       => json_decode('{"ops":[{"insert":"text normale : \n[MODIFY]\n\n"},{"attributes":{"bold":true},"insert":"text gras : "},{"insert":"\n"},{"attributes":{"bold":true},"insert":"[MODIFIY]"},{"insert":"\n"}]}'),
            'instrumental'  => 'https://www.youtube.com/watch?v=-3AfCwgcH5I'
        ];
    }
}
