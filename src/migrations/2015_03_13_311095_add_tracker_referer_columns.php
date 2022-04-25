<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private string $table = 'tracker_referers';

    private string $foreign = 'tracker_referers_search_terms';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::connection("tracker")->table($this->table, function (Blueprint $table) {
                $table->string('medium')->nullable()->index();
                $table->string('source')->nullable()->index();
                $table->string('search_terms_hash')->nullable()->index();
            }
        );

        Schema::connection("tracker")->table($this->foreign, function (Blueprint $table) {
            $table->foreign('referer_id', 'tracker_referers_referer_id_fk')
                ->references('id')
                ->on('tracker_referers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
