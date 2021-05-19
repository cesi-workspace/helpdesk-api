<?php


use Phinx\Seed\AbstractSeed;

class AdminSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $this->table("users")
            ->insert([
                "username" => "lucas.mercier",
                "password" => password_hash("mdp", PASSWORD_BCRYPT),
                "rank" => 0
            ])
            ->save();
    }
}
