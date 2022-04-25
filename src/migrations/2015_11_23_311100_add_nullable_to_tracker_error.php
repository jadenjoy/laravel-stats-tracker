<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_errors';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection("tracker")->table(
            $this->table,
            function ($table) {
                $table->string('code')->nullable()->change();
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
