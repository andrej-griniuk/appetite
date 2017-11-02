<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Index Controller
 *
 */
class IndexController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

    }

    /**
     * Eater method
     *
     * @param string $date
     * @return \Cake\Http\Response|void
     */
    public function eater($date = null)
    {
        if (!$date) {
            $date = '2017-11-03';
        }

        $spots = $this->loadModel('Reservations')->Spots
            ->find('reserved', compact('date'))
            ->where(['DayReservations.id IS NOT' => null]);

        $this->set(compact('spots', 'date'));
    }

    /**
     * Stall method
     *
     * @return \Cake\Http\Response|void
     */
    public function stall()
    {

    }

    /**
     * Stall method
     *
     * @return \Cake\Http\Response|void
     */
    public function organizer()
    {

    }

}
