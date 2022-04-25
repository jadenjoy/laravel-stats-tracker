<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_log';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection("tracker")->table(
            $this->table,
            function (Blueprint $table) {
                $table->integer('referer_id')->unsigned()->nullable()->index();
            }
        );
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
