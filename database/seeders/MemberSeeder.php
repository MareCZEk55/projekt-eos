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
        $tags = MemberTag::all();

        foreach (range(1, 10) as $index) {
            $member = Member::factory()->create();
            $userTags = $tags->random(rand(0, 3))->pluck('id')->toArray();

            foreach ($userTags as $tagId){
                $member->memberTags()->attach($tagId);
            }
        }
    }
}
