<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'name'      => $faker->name(),
                'content'      => $faker->realText(rand(50, 200)),
            ];
        }

        $this->table('widgets')->truncate();
        $this->table('widgets')->insert($data)->saveData();
    }
}
