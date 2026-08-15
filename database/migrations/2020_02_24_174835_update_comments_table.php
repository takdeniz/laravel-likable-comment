<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(): void
	{
		Schema::table($this->getTable(), function (Blueprint $table) {
			$table->string('like')->default(0);
			$table->string('dislike')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(): void
	{
		Schema::table($this->getTable(), function (Blueprint $table) {
			$table->dropColumn('like');
			$table->dropColumn('dislike');
		});
	}

	protected function getTable(): string
	{
		$model = config('comment.model');

		return (new $model())->getTable();
	}
}
