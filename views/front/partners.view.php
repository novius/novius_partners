<div class="<?= $config['class'] ?>>">
    <?php if (!empty($groups)) { ?>
        <div class="content">
            <div class="row">
                <div class="columns large-12">
                    <?php
                    foreach ($groups as $group) {
                        if (!empty($group->partners)) {
                            $partners = array();
                            foreach ($group->partners as $partner) {
                                if (!empty($partner->medias->logo)) {
                                    $partners[] = $partner;
                                }
                            }
                            ?>
                            <div class="group columns">
                                <?php
                                if (!empty($group->group_title)) {
                                    ?>
                                    <?= $config['title_tag'] ?><?= $group->group_title ?><?= $config['title_tag_closing'] ?>
                                <?php
                                }
                                ?>

                                <div class="row">
                                    <?php
                                    foreach ($partners as $partner) {
                                        echo \View::forge('novius_partners::front/partners/item', array('partner' => $partner, 'config' => $config), false);
                                    }
                                    ?>
                                </div>

                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <? } ?>
</div>
