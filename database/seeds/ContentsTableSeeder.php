<?php

use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $content = new Content;
        $content->unit_name = 'Small Enterprise Technology Upgrading Program';
        $content->unit_name_abbrev = 'SETUP';
        $content->links = serialize([
            'https://www.google.com/',
            'https://www.google.com/',
            'https://www.google.com/',
            'https://www.google.com/'
        ]);
        $content->save();
    }
}
