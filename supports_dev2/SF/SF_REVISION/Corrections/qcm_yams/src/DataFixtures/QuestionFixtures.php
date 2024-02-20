<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture 
{
    public function load(ObjectManager $manager)
    {
        $questions = [
            [
                'question' => "What's your favorite type of pastry and why?",
                'choices' => ['Croissant', 'Chocolate Éclair', 'Fruit Tart'],
            ],
            [
                'question' => 'Can you recommend a bakery that makes amazing croissants?',
                'choices' => ['Bakery A', 'Bakery B', 'Bakery C'],
            ],
            [
                'question' => 'How do you like your éclairs—chocolate or coffee-flavored?',
                'choices' => ['Chocolate', 'Coffee', 'Both'],
            ],
            [
                'question' => 'Have you ever tried baking your own pastries at home? Any tips to share?',
                'choices' => ['Yes', 'No'],
            ],
            [
                'question' => 'Do you prefer sweet or savory pastries for breakfast?',
                'choices' => ['Sweet', 'Savory', 'Both'],
            ],
            [
                'question' => "What's the most unique pastry you've ever tasted?",
                'choices' => ['Cronut', 'Matcha Mille-Feuille', 'Saffron Pistachio Baklava'],
            ],
            [
                'question' => 'If you had to choose between a classic French macaron and a traditional American cupcake, which one would you go for?',
                'choices' => ['Macaron', 'Cupcake'],
            ],
            [
                'question' => 'Are there any pastries from a specific region or country that you\'d love to try?',
                'choices' => ['French Croissant', 'Italian Cannoli', 'Japanese Wagashi'],
            ],
            [
                'question' => "What's your go-to pastry to satisfy a sweet craving?",
                'choices' => ['Chocolate Cake', 'Lemon Tart', 'Almond Croissant'],
            ],
            [
                'question' => 'Do you enjoy experimenting with different pastry flavors, or do you stick to your favorites?',
                'choices' => ['Enjoy experimenting', 'Stick to favorites'],
            ],
        ];

        foreach ($questions as $question) {
            $q = new Question();
            $q->setContent($question['question'])
                ->setChoices($question['choices'])
                ->setCreatedAt(new \DateTimeImmutable());
            $manager->persist($q);
        }

        $manager->flush();
    }

  
}
