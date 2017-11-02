<?php
use Migrations\AbstractMigration;

class PopulateFoodTypes extends AbstractMigration
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
        $FoodTypes = \Cake\ORM\TableRegistry::get('FoodTypes');
        $foodTypes = $FoodTypes->newEntities([
            [
                'name' => 'Vegetarian',
                'flag' => '',
            ],
            [
                'name' => 'Burgers',
                'flag' => 'usa',
            ],
            [
                'name' => 'Mexican',
                'flag' => 'mexico',
            ],
            [
                'name' => 'Thai',
                'flag' => 'thailand',
            ],
            [
                'name' => 'Italian',
                'flag' => 'italy',
            ],
            [
                'name' => 'Spanish',
                'flag' => 'spain',
            ],
            [
                'name' => 'Indian',
                'flag' => 'india',
            ],
            [
                'name' => 'Fish',
                'flag' => '',
            ],
            [
                'name' => 'Middle Eastern',
                'flag' => 'israel',
            ],
            [
                'name' => 'Other',
                'flag' => '',
            ],
        ]);
        $FoodTypes->saveMany($foodTypes);
    }
}
