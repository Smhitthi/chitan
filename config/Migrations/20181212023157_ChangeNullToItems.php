<?php
use Migrations\AbstractMigration;

class ChangeNullToItems extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('items');
         $table->changeColumn('release', 'string', [
            'null' => true,
        ]);
        $table->changeColumn('comment', 'string', [
            'null' => true,
        ]);
        $table->changeColumn('match_date', 'datetime', [
            'null' => true,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('items');
         $table->changeColumn('release', 'string', [
            'null' => false,
        ]);
        $table->changeColumn('comment', 'string', [
            'null' => false,
        ]);
        $table->changeColumn('match_date', 'datetime', [
            'null' => false,
        ]);
        $table->update();
    }
}