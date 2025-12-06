<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Add profile columns to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('address')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address');
            $table->string('country')->nullable()->after('city');
            $table->text('bio')->nullable()->after('country');
            $table->string('avatar_path')->nullable()->after('bio');
        });

        // Migrate existing profiles data into users table
        if (Schema::hasTable('profiles')) {
            $profiles = DB::table('profiles')->get();
            foreach ($profiles as $p) {
                DB::table('users')->where('id', $p->user_id)->update([
                    'phone' => $p->phone,
                    'address' => $p->address,
                    'city' => $p->city,
                    'country' => $p->country,
                    'bio' => $p->bio,
                    'avatar_path' => $p->avatar_path,
                ]);
            }

            // Drop the profiles table
            Schema::dropIfExists('profiles');
        }
    }

    public function down()
    {
        // Recreate profiles table if not exists and move data back
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar_path')->nullable();
            $table->timestamps();
        });

        // Move data back from users to profiles
        $users = DB::table('users')->whereNotNull('id')->get();
        foreach ($users as $u) {
            // Only create profile rows for users that have any profile data
            if ($u->phone || $u->address || $u->city || $u->country || $u->bio || $u->avatar_path) {
                DB::table('profiles')->insert([
                    'user_id' => $u->id,
                    'phone' => $u->phone,
                    'address' => $u->address,
                    'city' => $u->city,
                    'country' => $u->country,
                    'bio' => $u->bio,
                    'avatar_path' => $u->avatar_path,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // Remove columns from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone','address','city','country','bio','avatar_path']);
        });
    }
};
