<div class="reassurance-container bg-light-grey px-4 py-8 lg:px-[5%]">
    <p class="font-title text-left text-base text-deep-green font-light w-fit mx-auto lg:ml-0 uppercase mb-4 relative after:content-[''] after:absolute after:h-0 after:border-l-4 after:border-l-transparent after:border-r-4 after:border-r-transparent after:border-b-8 after:border-b-light-green after:right-0 after:top-0"><span class="font-black">Bidean</span>Trail</p>
    <div class="flex flex-col lg:flex-row justify-evenly">
        <?php
        if (have_rows('bandeau_repeater', 'option')) :
            while (have_rows('bandeau_repeater', 'option')) : the_row();
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $subTitle = get_sub_field('sub_title');
            ?>
            <div class="flex flex-row lg:flex-col lg:w-1/4 justify-start my-8">
                <?php if (!empty($icon)) { ?>
                    <div class="w-[60px] h-[60px] bg-medium-grey rounded-full block mx-auto lg:mb-8">
                        <img class="w-full h-auto p-3" src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>">
                    </div>
                    <div class="w-4/6 lg:w-5/6 lg:mx-auto">
                        <?php
                        }
                        if (!empty($title)) { ?>
                            <p class="text-left lg:text-center font-title text-deep-green text-l font-black leading-5 uppercase mb-2"><?= $title ?></p>
                        <?php } if (!empty($subTitle)) { ?>
                            <p class="text-left lg:text-center font-sans text-deep-green leading-4 text-xs"><?= $subTitle ?></p>
                        <?php } ?>
                    </div>
            </div>
            <?php
            endwhile;
        endif;
        ?>
    </div>
</div>