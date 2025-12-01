<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('user_data', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('email')->unique();
$table->string('mobile',10);
$table->string('profile_pic')->nullable();
$table->string('password');
$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('user_data');
}
};
?>
