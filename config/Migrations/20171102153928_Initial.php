<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {

        $this->table('food_types')
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('flag', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'name',
                ]
            )
            ->create();

        $this->table('reservations')
            ->addColumn('spot_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('stall_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('reservation_date', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'spot_id',
                ]
            )
            ->addIndex(
                [
                    'stall_id',
                ]
            )
            ->addIndex(
                [
                    'reservation_date',
                ]
            )
            ->create();

        $this->table('spots')
            ->addColumn('lat', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 10,
                'scale' => 8,
            ])
            ->addColumn('lng', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 11,
                'scale' => 8,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $this->table('stalls')
            ->addColumn('food_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('rating', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 2,
                'scale' => 1,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'food_type_id',
                ]
            )
            ->addIndex(
                [
                    'name',
                ]
            )
            ->create();
    }

    public function down()
    {
        $this->dropTable('food_types');
        $this->dropTable('reservations');
        $this->dropTable('spots');
        $this->dropTable('stalls');
    }
}
