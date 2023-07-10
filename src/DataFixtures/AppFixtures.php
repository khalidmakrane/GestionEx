<?php

namespace App\DataFixtures;

use App\Factory\EtudiantFactory as FactoryEtudiantFactory;
use App\Factory\FiliereFactory as FactoryFiliereFactory;
use App\Factory\ModuleFactory as FactoryModuleFactory;
use App\Factory\NoteFactory as FactoryNoteFactory;
use App\Factory\ProfesseurFactory as FactoryProfesseurFactory;
use App\Factory\SemestreFactory as FactorySemestreFactory;
use App\Factory\UserFactory as FactoryUserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Factory\EtudiantFactory;
use Doctrine\Factory\FiliereFactory;
use Doctrine\Factory\ModuleFactory;
use Doctrine\Factory\NoteFactory;
use Doctrine\Factory\ProfesseurFactory;
use Doctrine\Factory\SemestreFactory;
use Doctrine\Factory\UserFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

    
        FactoryEtudiantFactory::createMany(10);
        FactoryModuleFactory::createMany(10);
        FactoryFiliereFactory::createMany(10);
        FactoryNoteFactory::createMany(10);
        FactoryProfesseurFactory::createMany(10);
        FactorySemestreFactory::createMany(10);
        FactoryUserFactory::createMany(1);


        $manager->flush();
    }
}
