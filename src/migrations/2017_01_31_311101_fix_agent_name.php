<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_agents';

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
                    $table->dropUnique('tracker_agents_name_unique');
                }
            );

            Schema::connection("tracker")->table(
                $this->table,
                function ($table) {
                    $table->mediumText('name')->change();
                }
            );

            Schema::connection("tracker")->table(
                $this->table,
                function ($table) {
                    $table->unique('id', 'tracker_agents_name_unique'); // this is a dummy index
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
