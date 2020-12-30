<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use App\Models\User;
use App\Models\User_billing_data;
use App\Models\User_social_media;

class UserSeeder extends Seeder
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
            $name = $faker->name;
            $slug = "";
            
            //slug előállítása
            $slug = Str::slug($name);
            $slugCount = User::whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->count();
            if ( $slugCount>0 )
                $slug = $slug."-".$slugCount;

            //könyvtár létrehozása
            $path = public_path()."/uploads/".$slug;
            File::makeDirectory($path);

            $avatar = $faker->numberBetween($min=0, $max=1);
            if ( $avatar ) {
                //avatar létrehozása
                $faker->image($dir = 'public/uploads/'.$slug, $width = 100, $height = 100);
            }

            $role = $faker->numberBetween($min=2, $max=3);


            $user = new User();
            $user->name = $name;
            $user->email = $faker->email;
            $user->password = Hash::make('12345678');
            $user->phone = $faker->phoneNumber;
            $user->description = $faker->text($maxNbChars = 200);
            $user->avatar = $avatar;
            $user->website = $faker->domainName;
            $user->province_id = $faker->numberBetween($min=1, $max=20);
            $user->locationCity = $faker->city;
            $user->slug = $slug;
            $user->user_status_id = "2";
            $user->user_role_id = $role;
            $user->save();
            
            if ( $role==3 ) {
                //számlázási adatok Kitöltése
                $billingTypeId = $faker->numberBetween($min=1, $max=2);

                $userBillingData = new User_billing_data();
                $userBillingData->user_id = $user->id;
                $userBillingData->billing_type_id = $billingTypeId;
                if ( $billingTypeId=="2" ) {
                    $userBillingData->company_name = $faker->company;
                    $userBillingData->tax_number = $faker->creditCardNumber;
                }
                $userBillingData->address = $faker->streetAddress;
                $userBillingData->city = $faker->city;
                $userBillingData->province_id = $faker->numberBetween($min=1, $max=20);
                $userBillingData->postcode = $faker->postcode;
                $userBillingData->save();

                //közösségi média
                $userSocialMedia = new User_social_media();
                $userSocialMedia->social_media_id = 1;
                $userSocialMedia->user_id = $user->id;
                $userSocialMedia->url = "facebook.com";
                $userSocialMedia->save();

                $userSocialMedia = new User_social_media();
                $userSocialMedia->social_media_id = 2;
                $userSocialMedia->user_id = $user->id;
                $userSocialMedia->url = "twitter.com";
                $userSocialMedia->save();

                $userSocialMedia = new User_social_media();
                $userSocialMedia->social_media_id = 3;
                $userSocialMedia->user_id = $user->id;
                $userSocialMedia->url = "pinteres.com";
                $userSocialMedia->save();

                $userSocialMedia = new User_social_media();
                $userSocialMedia->social_media_id = 4;
                $userSocialMedia->user_id = $user->id;
                $userSocialMedia->url = "youtube.com";
                $userSocialMedia->save();

                $userSocialMedia = new User_social_media();
                $userSocialMedia->social_media_id = 5;
                $userSocialMedia->user_id = $user->id;
                $userSocialMedia->url = "instagram.com";
                $userSocialMedia->save();

                $userSocialMedia = new User_social_media();
                $userSocialMedia->social_media_id = 1;
                $userSocialMedia->user_id = $user->id;
                $userSocialMedia->url = "linkedin.com";
                $userSocialMedia->save();
            }
	    }
    }
}
