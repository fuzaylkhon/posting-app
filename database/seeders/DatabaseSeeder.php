<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('👤 Seeding users…');
        $this->call(UserSeeder::class);

        $users = User::all();

        $this->command->info('📝 Seeding 1 000 posts across Nature, Poetry & Science…');

        foreach ([
            ['state' => 'nature',  'count' => 334],
            ['state' => 'poetry',  'count' => 333],
            ['state' => 'science', 'count' => 333],
        ] as ['state' => $state, 'count' => $count]) {

            $perUser  = intdiv($count, $users->count());
            $remainder = $count % $users->count();

            foreach ($users as $index => $user) {
                $batch = $perUser + ($index === 0 ? $remainder : 0);

                Post::factory()
                    ->count($batch)
                    ->$state()
                    ->for($user)
                    ->create();
            }

            $this->command->info("  ✓ {$state} posts seeded");
        }

        $this->command->info('✅ Done — ' . Post::count() . ' posts, ' . User::count() . ' users.');
    }
}
