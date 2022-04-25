<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_route_path_parameters';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("tracker")->create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('route_path_id')->unsigned()->index();
            $table->string('parameter')->index();
            $table->string('value')->index();

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
