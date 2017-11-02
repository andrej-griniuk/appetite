<?php
use Migrations\AbstractMigration;

class AddStallsLogoColumn extends AbstractMigration
{

    public function up()
    {

        $this->table('stalls')
            ->addColumn('logo', 'string', [
                'after' => 'food_type_id',
                'default' => null,
                'length' => 255,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('stalls')
            ->removeColumn('logo')
            ->update();
    }
}

