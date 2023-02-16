<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Publisher::create([
            'name' => 'Penguin Random House',
            'description' => 'Penguin Random House is a leading global trade book publisher. It was formed on July 1, 2013, upon the completion of an agreement between Bertelsmann and Pearson to merge their respective trade publishing companies, Random House and Penguin, with the parent companies themselves merging to form a new company, Penguin Random House.'
        ]);
        Publisher::create([
            'name' => 'HarperCollins',
            'description' => 'HarperCollins is a major publisher of books, e-books, and audio books in the United States. It is a subsidiary of News Corp, and is headquartered in New York City.'
        ]);
        Publisher::create([
            'name' => 'Simon & Schuster',
            'description' => 'Simon & Schuster, Inc. is an American publishing company founded in New York City in 1924 by Richard L. Simon and Max Schuster. It is a subsidiary of CBS Corporation.'
        ]);
        Publisher::create([
            'name' => 'Hachette Livre',
            'description' => 'Hachette Livre is a French publishing company, the largest in the world in terms of sales. It is a subsidiary of the Lagardère Group. It was founded in 1826 by Jean Léopold Hachette.'
        ]);
        Publisher::create([
            'name' => 'Macmillan Publishers',
            'description' => 'Macmillan Publishers Limited is a British multinational publishing company headquartered in London. It is a wholly owned subsidiary of Holtzbrinck Publishing Group, a German publishing company.'
        ]);

    }
}
