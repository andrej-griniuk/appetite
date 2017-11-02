<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Spot[] $spots
 * @var string $date
 */

$tweets = [
    [
        'name' => 'Malay Street Food‏',
        'handle' => '@NasiLemak_MCR',
        'text' => 'We\'ve got Fried Chicken. Fancy the real deal or our popular Vegan version? Come see us @GRUBMCR Friday and Saturday. #ChickenRice',
        'avatar' => 'https://pbs.twimg.com/profile_images/583045525383045120/Js4-kS2d_bigger.jpg',
        'images' => [
            'https://pbs.twimg.com/media/DNpYIFfXkAIi7-I.jpg',
            'https://pbs.twimg.com/media/DNpYI1aW4AIbbhc.jpg',
        ],
    ],
    [
        'name' => 'Radina Galabova',
        'handle' => '@rpg070',
        'text' => 'Having my favourite #worklunch prepared lovingly by the guys from @TheCircusBros on #StruttonGround #FoodMarket #SpanishTortilla #FoodLove',
        'avatar' => 'https://pbs.twimg.com/profile_images/727296149128896512/HYLv77mv_bigger.jpg',
        'images' => [
            'https://pbs.twimg.com/media/DM-_-DDXUAEW7Zo.jpg',
            'https://pbs.twimg.com/media/DM-_-DFW4AERLow.jpg',
        ],
    ],
    [
        'name' => 'The Beefsteaks',
        'handle' => '@TheBeefsteaks',
        'text' => 'Markets this week: Thurs @KERB_  #KERBLondonBridge; Fri #KERBontheQuay; Sat/Sun @MaltbyStMkt (📸 Steak & Chips by @nihanjoanna)',
        'avatar' => 'https://pbs.twimg.com/profile_images/480808981246390273/P1RAMifA_bigger.png',
        'images' => [
            'https://pbs.twimg.com/media/DNnWFUaWkAImrwI.jpg'
        ],
    ],
    [
        'name' => 'Cyprus Kitchen‏',
        'handle' => '@CyprusKitchenSC',
        'text' => 'This week:<br />
THURS: @KERB_ Gherkin<br />
FRI: #KERBKX<br />
SAT: @E17VillageMkt<br /> 
pic - @ivory_lou',
        'avatar' => 'https://pbs.twimg.com/profile_images/755412096062484481/LrZoFm7L_bigger.jpg',
        'images' => [
            'https://pbs.twimg.com/media/DNa9k66X0AM5_xk.jpg'
        ],
    ],
    [
        'name' => 'KERB',
        'handle' => 'KERB_',
        'text' => 'Thank you @roti_riot_roti for this DELICIOUS masala lamb Punjabi paratha w/ homemade crunchy pickles! Was great to meet the Dad🙋 #inKERBator',
        'avatar' => 'https://pbs.twimg.com/profile_images/825838549656272896/DUKsAXph_bigger.jpg',
        'images' => [
            'https://pbs.twimg.com/media/DNfuDUHX4AE_1tF.jpg',
            'https://pbs.twimg.com/media/DNfuFSFX4AYOsD9.jpg',
        ],
    ],
    [
        'name' => 'KERB',
        'handle' => 'KERB_',
        'text' => '.@inksquidbar founder Lucy Mee pulling out all the stops for Halloween. BLACK MAYO calamari only at #KERBCAMDEN 🐙👉http://bit.ly/2yTOb7O ',
        'avatar' => 'https://pbs.twimg.com/profile_images/825838549656272896/DUKsAXph_bigger.jpg',
        'images' => [
            'https://pbs.twimg.com/media/DNFEkfZX4AAoN_g.jpg',
            'https://pbs.twimg.com/media/DNFElaFXcAAoZIA.jpg',
        ],
    ],
    /*[
        'name' => '',
        'handle' => '',
        'text' => '',
        'avatar' => '',
        'images' => [],
    ],*/
];
?>
<div class="map-container">
    <div class="row">
        <div class="col-md-8">
            <?= $this->element('map') ?>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <?php foreach ($tweets as $tweet): ?>
                    <div class="list-group-item">
                        <img src="<?= $tweet['avatar'] ?>">
                        <a href="#"><?= $tweet['name'] ?></a><span><?= $tweet['handle'] ?></span>
                        <p class="list-group-item-text"><?= $tweet['text'] ?></p>
                        <?php if ($tweet['images']): ?>
                            <div class="row tweet-images clearfix">
                            <?php foreach ($tweet['images'] as $image): ?>
                                <div class="col-xs-6"><img src="<?= $image ?>" class="thumbnail" /></div>
                            <?php endforeach ;?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->element('stalls') ?>
