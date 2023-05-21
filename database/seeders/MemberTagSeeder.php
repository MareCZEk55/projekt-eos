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
        $members = Member::all();

        foreach ($members as $member) {
            $member->tags()->create(['tag' => 'Tag 1']);
            $member->tags()->create(['tag' => 'Tag 2']);
        }
    }
}
