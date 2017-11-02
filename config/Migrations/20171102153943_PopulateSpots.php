<?php
use Migrations\AbstractMigration;

class PopulateSpots extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $Spots = \Cake\ORM\TableRegistry::get('Spots');
        $spots = $Spots->newEntities([
            [
                'lat' => -33.784809,
                'lng' => 151.125559,
            ],
            [
                'lat' => -33.78473406791186,
                'lng' => 151.12545266747475,
            ],
            [
                'lat' => -33.784892346042966,
                'lng' => 151.12565383315086,
            ],
            [
                'lat' => -33.78497148499881,
                'lng' => 151.12575575709343,
            ],
            [
                'lat' => -33.784656043373396,
                'lng' => 151.12535074353218,
            ],
            [
                'lat' => -33.78458024803937,
                'lng' => 151.1252447962761,
            ],
            [
                'lat' => -33.78457578948824,
                'lng' => 151.12556532025337,
            ],
            [
                'lat' => -33.78449999408319,
                'lng' => 151.1254620552063,
            ],
            [
                'lat' => -33.78442196933145,
                'lng' => 151.1253561079502,
            ],
            [
                'lat' => -33.78448661841651,
                'lng' => 51.1256605386734,
            ],
            [
                'lat' => -33.78469505565152,
                'lng' => 151.12572893500328,
            ],
            [
                'lat' => -33.78477642406011,
                'lng' => 151.12583354115486,
            ],
            [
                'lat' => -33.78460699934139,
                'lng' => 151.12582683563232,
            ],
            [
                'lat' => -33.78440190581237,
                'lng' => 151.12575709819794,
            ],
            [
                'lat' => -33.78486002165967,
                'lng' => 151.12593814730644,
            ],
            [
                'lat' => -33.784483274499514,
                'lng' => 151.12565651535988,
            ],
        ]);
        $Spots->saveMany($spots);
    }
}
