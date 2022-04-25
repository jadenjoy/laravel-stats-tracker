<?php

use PragmaRX\Tracker\Vendor\Laravel\Models\Agent;
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

                    $table->string('name_hash', 65)->nullable();
                }
            );

            Agent::all()->each(function ($agent) {
                $agent->name_hash = hash('sha256', $agent->name);

                $agent->save();
            });

            Schema::connection("tracker")->table(
                $this->table,
                function ($table) {
                    $table->unique('name_hash');
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
