<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\MemberTag;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Member::factory()
        //     ->count(5)
        //     ->create()
        //     ->each(function ($member) {
        //         $member->tags()->create(["tag" => "Prvni"]);
        //         $member->tags()->create(["tag" => "Druhy"]);
        //     });

        $tags = [
            'Tag 1',
            'Tag 2',
            'Tag 3',
            'Tag 4',
            'Tag 5',
        ];

        Member::factory()
            ->count(10)
            ->create()
            ->each(function ($member) use ($tags) {
                $randomTags = collect($tags)->random(rand(0, 3))->toArray();
                $member->tags()->createMany(
                    array_map(function ($tag) {
                        return ['tag' => $tag];
                    }, $randomTags)
                );
            });

        // // Get all tags
        // $tags = MemberTag::all();

        // // Create members and assign random tags
        // Member::factory()
        //     ->count(10)
        //     ->create()
        //     ->each(function ($member) use ($tags) {
        //         $randomTags = $tags->random(rand(1, 3))->pluck('id');
        //         $member->tags()->attach($randomTags);
        //     });
    }
}
