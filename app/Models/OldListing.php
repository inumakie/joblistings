<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'listing one',
                'description' => 'Suspendisse gravida elit vestibulum justo porta commodo. Fusce ultricies, dui ut dictum sagittis, sapien nisl molestie ligula, id sollicitudin eros lacus eget tortor. Phasellus lacus enim, ullamcorper ut lectus eu, posuere convallis tellus. Suspendisse id rutrum felis, vitae maximus lacus. Suspendisse hendrerit elit nisi. '
            ],
            [
                'id' => 2,
                'title' => 'listing two',
                'description' => 'Phasellus non leo id sapien pulvinar suscipit eget aliquet neque. Morbi consectetur orci eget orci lacinia, nec venenatis turpis pretium. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam viverra finibus turpis vel feugiat. Integer et malesuada eros.'
            ]
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }
}
