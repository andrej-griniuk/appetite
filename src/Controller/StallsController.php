<?php
namespace App\Controller;

/**
 * Stalls Controller
 *
 * @property \App\Model\Table\StallsTable $Stalls
 *
 * @method \App\Model\Entity\Stall[] paginate($object = null, array $settings = [])
 */
class StallsController extends AppController
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

        $spots = $this->Stalls->Reservations->Spots
            ->find('reserved', compact('date'))
            ->where(['DayReservations.id IS NOT' => null]);

        $this->set(compact('spots', 'date'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['FoodTypes']
        ];
        $stalls = $this->paginate($this->Stalls);

        $this->set(compact('stalls'));
        $this->set('_serialize', ['stalls']);
    }

    /**
     * View method
     *
     * @param string|null $id Stall id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stall = $this->Stalls->get($id, [
            'contain' => ['FoodTypes', 'Reservations']
        ]);

        $this->set('stall', $stall);
        $this->set('_serialize', ['stall']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stall = $this->Stalls->newEntity();
        if ($this->request->is('post')) {
            $stall = $this->Stalls->patchEntity($stall, $this->request->getData());
            if ($this->Stalls->save($stall)) {
                $this->Flash->success(__('The stall has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stall could not be saved. Please, try again.'));
        }
        $foodTypes = $this->Stalls->FoodTypes->find('list', ['limit' => 200]);
        $this->set(compact('stall', 'foodTypes'));
        $this->set('_serialize', ['stall']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stall id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stall = $this->Stalls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stall = $this->Stalls->patchEntity($stall, $this->request->getData());
            if ($this->Stalls->save($stall)) {
                $this->Flash->success(__('The stall has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stall could not be saved. Please, try again.'));
        }
        $foodTypes = $this->Stalls->FoodTypes->find('list', ['limit' => 200]);
        $this->set(compact('stall', 'foodTypes'));
        $this->set('_serialize', ['stall']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stall id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stall = $this->Stalls->get($id);
        if ($this->Stalls->delete($stall)) {
            $this->Flash->success(__('The stall has been deleted.'));
        } else {
            $this->Flash->error(__('The stall could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
