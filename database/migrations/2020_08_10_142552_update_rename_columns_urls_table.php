<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRenameColumnsUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Work around for SQLite can only rename 1 column  */
        collect ([
            ['long_url', 'external'],
            ['url_token', 'token']
            ])->map(function ($column) {
            Schema::table('urls', function (Blueprint $table) use ($column) {
                $table->renameColumn($column[0], $column[1]);
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** Work around for SQLite can only rename 1 column  */
        collect ([
            ['external', 'long_url'],
            ['token', 'url_token']
        ])->map(function ($column) {
            Schema::table('urls', function (Blueprint $table) use ($column) {
                $table->renameColumn($column[0], $column[1]);
            });
        });
    }
}
