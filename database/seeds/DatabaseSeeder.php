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
            [
                'position_id' => 1,
                'team_id' => 1,
                'username' => 'nvnam',
                'fullname' => 'Nguyễn Văn Nam',
                'email' => 'mannv@gmail.com',
                'avatar' => '',
                'password' => bcrypt('namnv1234'),
            ],
            [
                'position_id' => 1,
                'team_id' => 2,
                'username' => 'TVNam',
                'fullname' => 'Trần Văn Nam',
                'email' => 'namtv@gmail.com',
                'avatar' => '',
                'password' => bcrypt('namtv1234'),
            ],
            [
                'position_id' => 1,
                'team_id' => 3,
                'username' => 'TVLuyen',
                'fullname' => 'Tân Văn Luyện',
                'email' => 'luyentv@gmail.com',
                'avatar' => '',
                'password' => bcrypt('luyentv1234'),
            ],
            [
                'position_id' => 1,
                'team_id' => 4,
                'username' => 'TQMinh',
                'fullname' => 'Trần Quang Minh',
                'email' => 'minhtq@gmail.com',
                'avatar' => '',
                'password' => bcrypt('minhtq1234'),
            ],
            [
                'position_id' => 2,
                'team_id' => 1,
                'username' => 'NVMinh',
                'fullname' => 'Ngô Văn Minh',
                'email' => 'minhnv@gmail.com',
                'avatar' => '',
                'password' => bcrypt('minhnv1234'),
            ],
            [
                'position_id' => 2,
                'team_id' => 2,
                'username' => 'GVBao',
                'fullname' => 'Giang Văn Bảo',
                'email' => 'baogv@gmail.com',
                'avatar' => '',
                'password' => bcrypt('baogv1234'),
            ],
            [
                'position_id' => 2,
                'team_id' => 3,
                'username' => 'NTBay',
                'fullname' => 'Nguyễn Thị Bảy',
                'email' => 'baynt@gmail.com',
                'avatar' => '',
                'password' => bcrypt('baynt1234'),
            ],
            [
                'position_id' => 2,
                'team_id' => 4,
                'username' => 'PNNgan',
                'fullname' => 'Phạm Ngọc Ngân',
                'email' => 'nganpn@gmail.com',
                'avatar' => '',
                'password' => bcrypt('nganpn1234'),
            ],

            [
                'position_id' => 3,
                'team_id' => 1,
                'username' => 'TTMinh',
                'fullname' => 'Trần Thu Minh',
                'email' => 'minhtt@gmail.com',
                'avatar' => '',
                'password' => bcrypt('minhtt1234'),
            ],
            [
                'position_id' => 3,
                'team_id' => 2,
                'username' => 'NMHanh',
                'fullname' => 'Nguyễn Minh Hạnh',
                'email' => 'hanhnm@gmail.com',
                'avatar' => '',
                'password' => bcrypt('hanhnm1234'),
            ],
            [
                'position_id' => 3,
                'team_id' => 3,
                'username' => 'TNNam',
                'fullname' => 'Tăng Nhật Nam',
                'email' => 'namtn@gmail.com',
                'avatar' => '',
                'password' => bcrypt('namtn1234'),
            ],
            [
                'position_id' => 3,
                'team_id' => 4,
                'username' => 'NTBao',
                'fullname' => 'Nguyễn Thế Bảo',
                'email' => 'baont@gmail.com',
                'avatar' => '',
                'password' => bcrypt('baont1234'),
            ]
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
        $user->password = Hash::make('namnv1234namnv1234');
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
