<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\Question;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {

        // toutes les questions
        $questions = $manager->getRepository(Question::class)->findAll();
        $nbQuestions = count($questions);

        $generate = function () use ($nbQuestions, $questions) {
            shuffle($questions);
            $m = random_int(1, $nbQuestions);
            $j = 0;
            $data = [];
            while ($j < $m) {
                $data[] = $questions[$j];
                $j++;
            }
            return $data;
        };

        $response = function($user) use ($nbQuestions, $questions, $manager){
            shuffle($questions);
            $m = random_int(1, $nbQuestions);
            $j = 0;
            while ($j < $m) {
                $answer =  new Answer();
                $answer->setUser($user);
                $question = $questions[0];
                $choices = $question->getChoices();
                shuffle( $choices ) ;
                $answer->setContent($choices[0]);
                $answer->addQuestion($question);
                $answer->setCreatedAt(new \DateTimeImmutable()) ;
                $manager->persist($answer);
                $j++;
            }
        };

        $alan = new User();
        $alan->setUsername('Alan');
        $alan->setEmail('alan@alan.fr');
        $alan->setScore(95);
        // pose une question 
        foreach ( $generate() as $q ) $alan->addAskedQuestion($q);

        // répond à une/des questions
        $response($alan);

        $manager->persist($alan);

        $alice = new User();
        $alice->setUsername('Alice');
        $alice->setEmail('alice@alice.fr');
        $alice->setScore(80);
        foreach ($generate() as $q) $alice->addAskedQuestion($q);
        $response($alice);

        $manager->persist($alice);

        $bob = new User();
        $bob->setUsername('Bob');
        $bob->setEmail('bob@bob.fr');
        $bob->setScore(70);
        foreach ($generate() as $q) $bob->addAskedQuestion($q);
        $response($bob);

        $manager->persist($bob);

        $manager->flush();
    }


   
}
