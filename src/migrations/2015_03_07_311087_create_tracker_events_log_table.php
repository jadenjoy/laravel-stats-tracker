<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    private $table = 'tracker_events_log';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection("tracker")->create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('event_id')->unsigned()->index();
            $table->bigInteger('class_id')->unsigned()->nullable()->index();
            $table->bigInteger('log_id')->unsigned()->index();

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
