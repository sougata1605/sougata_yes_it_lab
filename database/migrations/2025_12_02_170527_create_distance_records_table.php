<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
Schema::create('distance_records', function (Blueprint $table) {
$table->id();
$table->double('lat1');
$table->double('lng1');
$table->double('lat2');
$table->double('lng2');
$table->double('distance_km');
$table->timestamps();
});
}


public function down()
{
Schema::dropIfExists('distance_records');
}
};
