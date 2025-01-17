<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_devices';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("tracker")->create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('kind', 16)->index();
            $table->string('model', 64)->index();
            $table->string('platform', 64)->index();
            $table->string('platform_version', 16)->index();
            $table->boolean('is_mobile');

            $table->unique(['kind', 'model', 'platform', 'platform_version']);

            $table->timestamps();
            $table->index('created_at');
            $table->index('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
};
