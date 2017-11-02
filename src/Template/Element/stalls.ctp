<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Spot[] $spots
 */

use Cake\Core\Configure;

$defaultText = 'Paella  is a Valencian rice dish. Paella has ancient roots, but its modern form originated in the mid-19th century in the area around Albufera lagoon on the east coast of Spain, adjacent to the city of Valencia.[4] Many non-Spaniards view paella as Spain\'s national dish, but most Spaniards consider it to be a regional Valencian dish. Valencians, in turn, regard paella as one of their identifying symbols.<br /><br />Types of paella include Valencian paella, vegetarian/vegan paella (Spanish: paella de verduras), seafood paella (Spanish: paella de marisco), and mixed paella (Spanish: paella mixta), among many others. Valencian paella is believed to be the original recipe[5] and consists of white rice, green beans (bajoqueta and tavella), meat (chicken and rabbit), white beans (garrofón), snails, and seasoning such as saffron and rosemary. Another very common but seasonal ingredient is artichokes. Seafood paella replaces meat with seafood and omits beans and green vegetables. Mixed paella is a free-style combination of meat from land animals, seafood, vegetables, and sometimes beans. Most paella chefs use bomba[6] rice due to it being less likely to overcook, but Valencians tend to use a slightly stickier (and thus more susceptible to overcooking) variety known as Senia. All types of paellas use olive oil.'

?>

<?php $this->append('script') ?>
<script>
    function initMarkers() {
        <?php foreach ($spots as $spot): ?>
            <?php if ($spot->day_reservation): ?>
                new CustomMarker(new google.maps.LatLng(<?= $spot->lat ?>, <?= $spot->lng ?>), map, <?= json_encode($spot) ?>);
            <?php else: ?>
                new EmptySpot(new google.maps.LatLng(<?= $spot->lat ?>, <?= $spot->lng ?>), map, <?= json_encode($spot) ?>, '<?= $date ?>');
            <?php endif; ?>
        <?php endforeach; ?>
    }
</script>


<?php foreach ($spots as $spot): ?>
    <?php if (!$spot->day_reservation) continue; ?>
    <?php
    $stall = $spot->day_reservation->stall;
    $images = [
            "stalls/{$stall->logo}",
            "food/" . rand(1, 10) . '.jpg',
            "food/" . rand(1, 10) . '.jpg',
            "food/" . rand(1, 10) . '.jpg',
    ];
    ?>
    <div class="modal fade" id="stall<?= $stall->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= h($stall->name) ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php foreach ($images as $image): ?>
                        <div class="col-md-3 col-xs-6">
                            <?= $this->Html->image($image, ['class' => 'thumbnail']) ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($stall->description): ?>
                        <?= $this->Text->autoParagraph($stall->description) ?>
                    <?php else: ?>
                        <?= $defaultText ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= Configure::read('Map.key') ?>&callback=initMap" async defer></script>
<?php $this->end() ?>
