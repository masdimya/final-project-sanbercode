<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerAnswerPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER answer_points_ai AFTER INSERT ON `answer_points` FOR EACH ROW
                        BEGIN
                                UPDATE users
                                    SET reputasi = users.reputasi + IF(new.vote, 10, -1)
                                WHERE users.id IN (SELECT answers.user_id 
                                                        FROM answers WHERE answers.id = new.answer_id);

                                
                                UPDATE answers
                                    SET total_vote = answers.total_vote + IF(new.vote, 1, -1)
                                WHERE answers.id = new.answer_id;

                        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `answer_points_ai`');

    }
}
