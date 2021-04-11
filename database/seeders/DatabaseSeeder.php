<?php

namespace Database\Seeders;



use App\Repositories\Repository;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();



        touch('database/database.sqlite');
        $repository = new Repository();
        $repository->createDatabase();
        $repository->remplissageBD();
        $repository->insertHeur();
        $repository->insertEtudiant(
                                    ['NomEtudiant' => 'BELKHOUS',
                                    'PrénomEtudiant' => 'Lyes',
                                    'Date_Naissance' => '1989-01-18',
                                    'Email_Etudiant' => 'lyes@hotmail.com',
                                    'Niveau_Etude' => 'Troisième_année',
                                    'NumTelephone'=> '06 14 62 33 44',
                                    'NomImage'=> 'imagesDefault.png']

                                    );

                                    $repository->insertEtudiant(
                                        ['NomEtudiant' => 'SIYOUCEF',
                                        'PrénomEtudiant' => 'Walid',
                                        'Date_Naissance' => '1992-01-18',
                                        'Email_Etudiant' => 'walid@hotmail.com',
                                        'Niveau_Etude' => 'Troisième_année',
                                        'NumTelephone'=> '06 20 20 20',
                                        'NomImage'=> 'imagesDefault.png']

                                        );
        $repository->insertEtudiant(
                                            ['NomEtudiant' => 'BABAAMMI',
                                            'PrénomEtudiant' => 'Nabil',
                                            'Date_Naissance' => '1992-01-18',
                                            'Email_Etudiant' => 'nabil@hotmail.com',
                                            'Niveau_Etude' => 'Troisième_année',
                                            'NumTelephone'=> '0751 19 77 12',
                                            'NomImage'=> 'imagesDefault.png']

                                            );

        $repository->insertEnseignant(
                                            ['NomEnseignant' => 'karim',
                                            'PrénomEnseignant' => 'nouioua',
                                            'Date_Naissance' => '1989-01-18',
                                            'Email_Enseignant' => 'karim@hotmail.com',
                                            'Matière' => 'Java']

                                            );
        $repository->insertEnseignant(
                                                ['NomEnseignant' => 'estellon',
                                                'PrénomEnseignant' => 'bertrand',
                                                'Date_Naissance' => '1989-01-18',
                                                'Email_Enseignant' => 'estellon@hotmail.com',
                                                'Matière' => 'PHP']

                                                );
        $repository->insertEnseignant(
                                                    ['NomEnseignant' => 'camille',
                                                    'PrénomEnseignant' => 'dinaz',
                                                    'Date_Naissance' => '1989-01-18',
                                                    'Email_Enseignant' => 'camille@hotmail.com',
                                                    'Matière' => 'Anglais']

                                                    );
        $repository->insertEnseignant(
                                                        ['NomEnseignant' => 'nadia',
                                                        'PrénomEnseignant' => 'creignou',
                                                        'Date_Naissance' => '1989-01-18',
                                                        'Email_Enseignant' => 'nadia@hotmail.com',
                                                        'Matière' => 'BD']

                                                        );

        $repository->addUser('lyes@hotmail.com','123456');
        $repository->addUser('walid@hotmail.com','123456');
        $repository->addUser('nabil@hotmail.com','123456');

        $repository->addTeacher('karim@hotmail.com','123456');
        $repository->addTeacher('estellon@hotmail.com','123456');
        $repository->addTeacher('camille@hotmail.com','123456');
        $repository->addTeacher('nadia@hotmail.com','123456');



    }
}
