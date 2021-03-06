<?php
namespace App\Controller;
use Cake\Utility\Hash;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 *
 * @method \App\Model\Entity\Reservation[] paginate($object = null, array $settings = [])
 */
class ReservationsController extends AppController
{

    /**
     * Map method
     *
     * @param string $date
     * @return \Cake\Http\Response|void
     */
    public function map($date = null)
    {
        if (!$date) {
            $date = '2017-11-03';
        }

        $spots = $this->Reservations->Spots->find('reserved', compact('date'));

        $this->set(compact('spots', 'date'));
    }

    /**
     * Payment method
     *
     * @return \Cake\Http\Response|void
     */
    public function payment()
    {

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Spots', 'Stalls']
        ];
        $reservations = $this->paginate($this->Reservations);

        $this->set(compact('reservations'));
        $this->set('_serialize', ['reservations']);
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => ['Spots', 'Stalls']
        ]);

        $this->set('reservation', $reservation);
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            //$name = $this->request->getData('stall.name');
            //if ($stall = $this->Reservations->Stalls->find()->where(compact('name'))->first()) {
            //    $reservation->stall_id = $stall->id;
            //    unset($data['stall']);
            //}
            if (Hash::get($data, 'reservation_date') == '2017-11-03') {
                return $this->redirect(['action' => 'payment']);
            }
            $reservation = $this->Reservations->patchEntity($reservation, $data);
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'payment']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $spots = $this->Reservations->Spots->find('list', ['limit' => 200]);
        $stalls = $this->Reservations->Stalls->find('list', ['limit' => 200]);
        $foodTypes = $this->Reservations->Stalls->FoodTypes->find('list')->order('name');
        $this->set(compact('reservation', 'spots', 'stalls', 'foodTypes'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $spots = $this->Reservations->Spots->find('list', ['limit' => 200]);
        $stalls = $this->Reservations->Stalls->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'spots', 'stalls'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
