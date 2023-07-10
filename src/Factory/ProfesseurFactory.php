<?php

namespace App\Factory;

use App\Entity\Professeur;
use App\Repository\ProfesseurRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Professeur>
 *
 * @method        Professeur|Proxy                     create(array|callable $attributes = [])
 * @method static Professeur|Proxy                     createOne(array $attributes = [])
 * @method static Professeur|Proxy                     find(object|array|mixed $criteria)
 * @method static Professeur|Proxy                     findOrCreate(array $attributes)
 * @method static Professeur|Proxy                     first(string $sortedField = 'id')
 * @method static Professeur|Proxy                     last(string $sortedField = 'id')
 * @method static Professeur|Proxy                     random(array $attributes = [])
 * @method static Professeur|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ProfesseurRepository|RepositoryProxy repository()
 * @method static Professeur[]|Proxy[]                 all()
 * @method static Professeur[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Professeur[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Professeur[]|Proxy[]                 findBy(array $attributes)
 * @method static Professeur[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Professeur[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ProfesseurFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'nom' => self::faker()->lastname(20),
            'prenom' => self::faker()->firstname(20),
            'cin' => self::faker()->realText(10),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Professeur $professeur): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Professeur::class;
    }
}
