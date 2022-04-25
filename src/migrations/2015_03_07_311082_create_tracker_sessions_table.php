<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_sessions';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("tracker")->create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('uuid')->unique()->index();
            $table->bigInteger('user_id')->unsigned()->nullable()->index();
            $table->bigInteger('device_id')->unsigned()->nullable()->index();
            $table->bigInteger('agent_id')->unsigned()->nullable()->index();
            $table->string('client_ip')->index();
            $table->bigInteger('referer_id')->unsigned()->nullable()->index();
            $table->bigInteger('cookie_id')->unsigned()->nullable()->index();
            $table->bigInteger('geoip_id')->unsigned()->nullable()->index();
            $table->boolean('is_robot');

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
