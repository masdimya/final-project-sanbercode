<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerQuestionPointsDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER question_points_ad AFTER DELETE ON `question_points` FOR EACH ROW
                        BEGIN
                                UPDATE users
                                    SET reputasi = users.reputasi + IF(old.vote, -10, 1)
                                WHERE users.id IN (SELECT questions.user_id 
                                                        FROM questions WHERE questions.id = old.question_id);

                                
                                UPDATE questions
                                    SET total_vote = questions.total_vote + IF(old.vote, -1, 1)
                                WHERE questions.id = old.question_id;

                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `question_points_ad`');
    }
}
