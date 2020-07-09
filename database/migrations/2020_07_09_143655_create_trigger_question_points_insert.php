<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerQuestionPointsInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER question_points_ai AFTER INSERT ON `question_points` FOR EACH ROW
                        BEGIN
                                UPDATE users
                                    SET reputasi = users.reputasi + IF(new.vote, 10, -1)
                                WHERE users.id IN (SELECT questions.user_id 
                                                        FROM questions WHERE questions.id = new.question_id);


                                
                                UPDATE questions
                                    SET total_vote = questions.total_vote + IF(new.vote, 1, -1)
                                WHERE questions.id = new.question_id;

                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `question_points_ai`');
    }
}
