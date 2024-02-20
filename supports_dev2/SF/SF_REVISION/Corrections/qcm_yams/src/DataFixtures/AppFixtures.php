<?php

// Dans AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Question;
use App\Entity\Answer;
use App\Entity\Pastry;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $john = new User();
        $john->setUsername('john_doe')
            ->setEmail('john.doe@example.com')
            ->setScore(80);
        $manager->persist($john);

        $jane = new User();
        $jane->setUsername('jane_doe')
            ->setEmail('jane.doe@example.com')
            ->setScore(95);
        $manager->persist($jane);
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

        $pastries = [
            'Velvet Vortex Pastries',
            'Crispy Cloud Confections',
            'Enchanted Eclairs',
            'Golden Glaze Bakery',
            'Whimsical Whisk Patisserie',
            'SugarShine Delights',
            'Floral Fusion Treats',
            'Sweet Symphony Sweets',
            'Heavenly Harmony Pastries',
            'Divine Decadence Desserts',
        ];

        $manager->flush();
    }
}
