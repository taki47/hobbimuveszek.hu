<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

use App\Models\Blog;
use App\Models\Blog_tag;

class Blog_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
            $name = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $url = Str::slug($name);

            $blog = new Blog();
            $blog->name = $name;
            $blog->user_id = '1';
            $blog->lead = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $blog->content = $faker->paragraph($nbSentences = 30, $variableNbSentences = true);
            $blog->image = $faker->image($dir = 'public/blogs', $width = 640, $height = 480);
            $blog->image_title = $faker->word;
            $blog->image_alt = $faker->word;
            $blog->meta_keywords = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $blog->meta_descriptions = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $blog->url = $url;
            $blog->save();

            $blogId = $blog->id;

            foreach (range(1,2) as $index) {
                Blog_tag::create([
                    'blog_id' => $blogId,
                    'tag_id' => $faker->numberBetween($min=1, $max=5)
                ]);
            }
	    }
    }
}
