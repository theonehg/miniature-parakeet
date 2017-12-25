<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'position_id' => 1,
            'team_id' => 1,
            'username' => 'nvnam',
            'fullname' => 'Nguyễn Văn Nam',
            'email' => 'mannv@gmail.com',
            'avatar' => '',
            'password' => bcrypt('namnv1234'),
        ]);
    }

    public function testLogin()
    {
        $user = new User();
        $user->position_id = 1;
        $user->team_id = 1;
        $user->username = 'NVNam';
        $user->fullname = 'Nguyễn Văn Nam';
        $user->email = 'mannv@gmail.com';
        $user->avatar = '';
        $user->password = Hash::make('namnv1234');
        $user->save();

        $user = new User();
        $user->position_id = 1;
        $user->team_id = 1;
        $user->username = 'TVNam';
        $user->fullname = 'Trần Văn Nam';
        $user->email = 'namtv@gmail.com';
        $user->avatar = '';
        $user->password = Hash::make('namtv1234');
        $user->save();

        $user = new User();
        $user->position_id = 1;
        $user->team_id = 1;
        $user->username = 'TVLuyen';
        $user->fullname = 'Tần Văn Luyện';
        $user->email = 'luyentv@gmail.com';
        $user->avatar = '';
        $user->password = Hash::make('luyentv1234');
        $user->save();
    }
}
