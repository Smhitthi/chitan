<?php
use Migrations\AbstractMigration;

class ChangeNullToUserid extends AbstractMigration
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
        $table->changeColumn('user_id', 'integer', [
            'null' => true,
        ]);
        $table->update();
    }

    public function down()
    {
        $table = $this->table('items');
        $table->changeColumn('user_id', 'integer', [
            'null' => false,
        ]);
        $table->update();
    }
}
