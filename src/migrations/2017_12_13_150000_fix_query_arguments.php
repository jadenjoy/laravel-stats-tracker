<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_query_arguments';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        try {
            Schema::connection("tracker")->table(
                $this->table,
                function ($table) {
                    $table->string('value')->nullable()->change();
                }
            );
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
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
