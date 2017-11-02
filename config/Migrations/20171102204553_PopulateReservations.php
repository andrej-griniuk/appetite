<?php
use Migrations\AbstractMigration;

class PopulateReservations extends AbstractMigration
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
        $this->execute("
        INSERT INTO `reservations` (`id`, `spot_id`, `stall_id`, `reservation_date`, `created`, `modified`) VALUES
(2, 13, 5, '2017-11-03', '2017-11-02 17:36:45', '2017-11-02 17:36:45'),
(3, 11, 3, '2017-11-03', '2017-11-02 20:37:32', '2017-11-02 20:37:32'),
(4, 7, 4, '2017-11-03', '2017-11-02 20:38:00', '2017-11-02 20:38:00'),
(5, 16, 7, '2017-11-03', '2017-11-02 20:38:58', '2017-11-02 20:38:58'),
(6, 5, 9, '2017-11-03', '2017-11-02 20:39:45', '2017-11-02 20:39:45'),
(7, 15, 1, '2017-11-03', '2017-11-02 20:40:06', '2017-11-02 20:40:06'),
(8, 1, 6, '2017-11-03', '2017-11-02 20:40:51', '2017-11-02 20:40:51'),
(9, 8, 11, '2017-11-03', '2017-11-02 20:41:21', '2017-11-02 20:41:21'),
(11, 6, 10, '2017-11-03', '2017-11-02 20:42:42', '2017-11-02 20:42:42'),
(12, 4, 8, '2017-11-03', '2017-11-02 20:43:09', '2017-11-02 20:43:09'),
(13, 7, 7, '2017-11-04', '2017-11-02 20:44:25', '2017-11-02 20:44:25'),
(14, 11, 3, '2017-11-04', '2017-11-02 20:44:41', '2017-11-02 20:44:41'),
(15, 2, 2, '2017-11-04', '2017-11-02 20:45:17', '2017-11-02 20:45:17'),
(16, 1, 9, '2017-11-04', '2017-11-02 20:45:28', '2017-11-02 20:45:28');
        ");
    }
}