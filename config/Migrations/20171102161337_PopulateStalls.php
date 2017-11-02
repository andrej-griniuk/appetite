<?php
use Migrations\AbstractMigration;

class PopulateStalls extends AbstractMigration
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
        $Stalls = \Cake\ORM\TableRegistry::get('Stalls');
        $stalls = $Stalls->newEntities([
            [
                'food_type_id' => 1,
                'name' => 'Fun Falafel',
                'logo' => 'falafel.jpg',
            ],
            [
                'food_type_id' => 1,
                'name' => 'Incrediball Falafel',
                'logo' => 'falafel3.jpg',
            ],
            [
                'food_type_id' => 6,
                'name' => 'HOLA!',
                'logo' => 'hola.jpg',
            ],
            [
                'food_type_id' => 7,
                'name' => 'The Masala Box',
                'logo' => 'masala.jpg',
            ],
            [
                'food_type_id' => 6,
                'name' => 'Paella',
                'logo' => 'paella.jpg',
            ],
            [
                'food_type_id' => 2,
                'name' => 'Love Pita',
                'logo' => 'pita.jpg',
            ],
            [
                'food_type_id' => 2,
                'name' => 'Soul Kitchen',
                'logo' => 'soul.jpg',
            ],
            [
                'food_type_id' => 1,
                'name' => 'Soul of Food',
                'logo' => 'soulfood.jpg',
            ],
            [
                'food_type_id' => 5,
                'name' => 'Soul Shack',
                'logo' => 'soulshack.jpg',
            ],
            [
                'food_type_id' => 3,
                'name' => 'Taco',
                'logo' => 'taco.jpg',
            ],
            [
                'food_type_id' => 4,
                'name' => 'My Thai',
                'logo' => 'thai.jpg',
            ],
        ]);
        $Stalls->saveMany($stalls);
    }
}
