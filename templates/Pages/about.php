<?php
/**
 * @var \App\View\AppView $this
 */

echo $this -> Html->css("about.css",['block'=>true]);
?>

<div>
    <section id="intro-section">

        <div class="group">
            <div class="left-side flex-col">
                <div class="item1">
                    Celebrate every moment in the best way!
                </div>
                <div class="item2">
                Paul Laver Entertainment is Australia's largest marketplace to discover and book spaces for meetings and events. We want to help customers with different requirements to find the perfect space for their events with customization based on their needs. Our market-leading online presence, technology and insights help venues to unlock new revenue and increase sales all year round.
                </div>
                <a href="<?= $this->Url->build('/')?>" class="d-none d-sm-inline-block btn btn-outline-primary shadow-sm"><i
                class="fas fa-sm text-white-50"></i>Explore Now</a>
            </div>
            <?=$this->Html->image('PL Logo (Top - Bottom).png', ["class"=>"right-side","alt" => "PL Logo","style"=>"width:380px;height:418px"]);?>
        </div>

    </section>

    <div class="group">
    <div class="left-side flex-col">
        <div>
          <div class="title " style="color: #009970">
            Our Mission
          </div>
          <div class="intro">
          We dedicate to helping our customers to book their event with ease. Only the best experience with Paul Laver Entertainment.
          </div>
          <div class="title" style="color: #009970">
            Our Vision
          </div>
          <div class="intro">
          This will be the most user-friendly tool, a game-changer in event booking. Organize your event with just a click!
          </div>
        </div>
    </div>
    <?=$this->Html->image('PL Logo (Top - Bottom).png', ["class"=>"right-side","alt" => "PL Logo","style"=>"width:380px;height:418px"]);?>
    </div>

</div>
