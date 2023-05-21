<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Member;
use App\Models\MemberTag;

class MemberTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // // Create tags
        // $tags = [
        //     'Tag 1',
        //     'Tag 2',
        //     'Tag 3',
        //     'Tag 4',
        //     'Tag 5',
        // ];

        // foreach ($tags as $tag) {
        //     MemberTag::create(['tag' => $tag]);
        // }

        // $members = Member::all();

        // foreach ($members as $member) {
        //     $member->tags()->create(['tag' => 'prvni']);
        //     $member->tags()->create(['tag' => 'druhy']);
        // }
    }
}
