<?php /* Template Name: Contact*/ ?>

<?php get_header() ?>
    <!-- Hero Banner Start -->
    <section class="single-page-banner">
        <div class="single-page-banner__container">
            <?php
                $contact_banner = get_field('contact_image_banner');
                $contact_banner_sz = $contact_banner['sizes']['medium'];
            
            ?>
            <img class=" single-page-banner__img " src="<?php echo $contact_banner_sz; ?>" alt="<?php echo $contact_banner['alt'];?>">
            <h1 class="single-page-banner__page-title">
                <?php the_title(); ?>
            </h1>
            <div class="single-page-banner__breadcrumbs ">
                    <a href="<?php echo home_url(); ?>" class="single-page-banner__breadcrumbs--red">
                        Home
                    </a> 
                    <span class="single-page-banner__breadcrumbs--slash-divider">
                        / 
                    </span>
                    <a class="single-page-banner__current-page-link" href="<?php get_permalink( get_the_ID() ); ?>">
                        <?php the_title(); ?>
                    </a>
            </div>
        </div> 

    </section>
    <!-- Hero Banner End -->
 
    <!-- GMaps start -->
    <section class="maps-embed">
        <div class="container">
            <?php
            the_field('office_location_gmaps', false, false);
            ?>
        </div>
    </section>
    <!-- GMaps end -->

    <!-- Contact section start -->
    <section class="contact-details">
        <div class="contact-details__container">
            <div class="contact-details__form-container">
                <?php echo do_shortcode('[contact-form-7 id="1ee1ecd" title="Contact form 1"]'); ?>
            </div>

            <div class="contact-details__details-container">
                <h2 class="contact-details__title">Contact Details</h2>
                <div class="wysiwyg-output">
                    <?php echo get_field('contact_details_short_desc');?>
                </div>

                <ul class="contact-details__links">
                    <li>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_454_862)">
                            <path d="M15.0003 7.88226L4.301 16.7028C4.301 16.7152 4.29787 16.7335 4.29161 16.7585C4.28549 16.7833 4.28223 16.8012 4.28223 16.814V25.7457C4.28223 26.0682 4.40013 26.3477 4.63587 26.583C4.87154 26.8185 5.15062 26.937 5.47317 26.937H12.6183V19.7914H17.3824V26.9372H24.5275C24.85 26.9372 25.1295 26.819 25.3648 26.583C25.6006 26.3479 25.7189 26.0683 25.7189 25.7457V16.814C25.7189 16.7645 25.7121 16.7271 25.7001 16.7028L15.0003 7.88226Z" fill="#6A6A6A"/>
                            <path d="M29.793 14.693L25.7182 11.3064V3.71429C25.7182 3.54073 25.6624 3.398 25.5504 3.28629C25.4393 3.17471 25.2966 3.11892 25.1227 3.11892H21.55C21.3763 3.11892 21.2336 3.17471 21.1218 3.28629C21.0103 3.398 20.9546 3.5408 20.9546 3.71429V7.3428L16.4143 3.54666C16.0178 3.22411 15.5463 3.06287 15.0004 3.06287C14.4546 3.06287 13.9832 3.22411 13.5863 3.54666L0.206772 14.693C0.0827436 14.7921 0.0147659 14.9254 0.00212194 15.0929C-0.0104569 15.2603 0.0328846 15.4065 0.132277 15.5304L1.28594 16.9075C1.38533 17.0191 1.51542 17.0873 1.67673 17.1123C1.82566 17.1248 1.97458 17.0812 2.12351 16.982L15 6.24492L27.8767 16.982C27.9762 17.0685 28.1062 17.1117 28.2675 17.1117H28.3234C28.4845 17.0872 28.6143 17.0185 28.7142 16.9072L29.868 15.5304C29.9672 15.4062 30.0107 15.2602 29.9978 15.0927C29.985 14.9256 29.9168 14.7923 29.793 14.693Z" fill="#6A6A6A"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_454_862">
                            <rect width="30" height="30" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <a href="<?php echo get_field('address_location_list_url');?>" target=”_blank” class="contact-details__text"><?php echo get_field('address_location_list');?></a>
                    </li>
                    <li>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_454_901)">
                            <path d="M25.8486 20.88C24.0364 19.33 22.1971 18.3911 20.4071 19.9388L19.3382 20.8742C18.5562 21.5532 17.1021 24.7259 11.4803 18.2588C5.85957 11.7999 9.20435 10.7942 9.98757 10.121L11.0623 9.18444C12.843 7.63322 12.171 5.68044 10.8867 3.67029L10.1117 2.45273C8.82152 0.447268 7.41665 -0.869805 5.63128 0.679073L4.6666 1.522C3.87752 2.09683 1.67186 3.96532 1.13684 7.51498C0.492938 11.7741 2.52416 16.6514 7.17782 22.0028C11.8256 27.3565 16.3763 30.0457 20.6869 29.9989C24.2693 29.9602 26.4328 28.0379 27.1095 27.339L28.0777 26.4949C29.8584 24.9472 28.7521 23.3714 26.9386 21.8178L25.8486 20.88Z" fill="#6A6A6A"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_454_901">
                            <rect width="30" height="30" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <a href="tel:<?php echo str_replace(' ', '', get_field('phone_number_list')); ?>" target=”_blank” class="contact-details__text"><?php echo get_field('phone_number_list');?></a>
                    </li>
                    <li>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.3633 4.45312H2.63672C1.18582 4.45312 0 5.63373 0 7.08984V22.9102C0 24.3668 1.18658 25.5469 2.63672 25.5469H27.3633C28.8142 25.5469 30 24.3663 30 22.9102V7.08984C30 5.63338 28.8136 4.45312 27.3633 4.45312ZM26.9584 6.21094C26.1059 7.06623 16.0925 17.1123 15.6811 17.525C15.3375 17.8697 14.6627 17.8699 14.3189 17.525L3.0416 6.21094H26.9584ZM1.75781 22.587V7.41299L9.32022 15L1.75781 22.587ZM3.0416 23.7891L10.5612 16.245L13.074 18.766C14.1037 19.7991 15.8967 19.7987 16.9261 18.766L19.4389 16.2451L26.9584 23.7891H3.0416ZM28.2422 22.587L20.6798 15L28.2422 7.41299V22.587Z" fill="#6A6A6A"/>
                        </svg>
                        <a href="mailto:<?php echo get_field('email_list');?>" target=”_blank” class="contact-details__text"><?php echo get_field('email_list');?></a>
                    </li>
                    <li>
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_454_841)">
                            <path d="M27.4589 6.65393L27.0101 6.79622L24.6199 7.00916L23.9448 8.08728L23.4549 7.93162L21.5527 6.21658L21.2767 5.32467L20.9072 4.37356L19.7116 3.30118L18.3012 3.02521L18.2687 3.67074L19.6505 5.0191L20.3266 5.81551L19.5664 6.21276L18.9476 6.03036L18.0204 5.64362L18.0519 4.89591L16.8353 4.39553L16.4314 6.15355L15.2053 6.43143L15.3266 7.41214L16.9242 7.71963L17.2001 6.15259L18.5189 6.3474L19.1319 6.70645H20.1155L20.7887 8.05481L22.5735 9.86535L22.4427 10.5691L21.0036 10.3858L18.517 11.6415L16.7265 13.7891L16.4935 14.7403H15.8508L14.6533 14.1883L13.4902 14.7403L13.7796 15.9673L14.2857 15.3839L15.1757 15.3562L15.1136 16.4582L15.8508 16.674L16.5871 17.501L17.7893 17.1629L19.1625 17.3797L20.7572 17.8084L21.5536 17.902L22.9039 19.4347L25.5099 20.9673L23.8245 24.1874L22.0454 25.0143L21.3703 26.8545L18.7958 28.5733L18.5217 29.5646C25.1031 27.9794 29.999 22.0674 29.999 14.999C29.9971 11.9118 29.0613 9.03839 27.4589 6.65393Z" fill="#6A6A6A"/>
                            <path d="M16.7256 22.839L15.6332 20.8136L16.6359 18.7242L15.6332 18.4244L14.5073 17.2937L12.0131 16.7341L11.1852 15.0019V16.0304H10.8204L8.67083 13.1159V10.7219L7.0952 8.15985L4.59329 8.6058H2.90784L2.05987 8.05003L3.1418 7.1925L2.06273 7.44174C0.762119 9.6629 0.00390625 12.2403 0.00390625 15.0009C0.00390625 23.283 6.718 30 15.001 30C15.6389 30 16.2644 29.9437 16.8832 29.8692L16.7266 28.0519C16.7266 28.0519 17.4151 25.3533 17.4151 25.2616C17.4141 25.169 16.7256 22.839 16.7256 22.839Z" fill="#6A6A6A"/>
                            <path d="M5.57645 4.83671L8.2407 4.46524L9.46874 3.79202L10.8505 4.19022L13.0583 4.06799L13.8146 2.87911L14.9176 3.06054L17.5961 2.8094L18.3343 1.9958L19.3752 1.30061L20.8477 1.52215L21.3843 1.44099C19.4449 0.528075 17.2867 0 14.9997 0C10.3444 0 6.18187 2.12185 3.43359 5.45359H3.44123L5.57645 4.83671ZM15.6337 1.4916L17.1655 0.648396L18.149 1.21658L16.7252 2.30042L15.3654 2.43697L14.7533 2.03972L15.6337 1.4916ZM11.0969 1.61478L11.773 1.89649L12.6582 1.61478L13.1404 2.45034L11.0969 2.98701L10.1143 2.41215C10.1143 2.41215 11.0749 1.79335 11.0969 1.61478Z" fill="#6A6A6A"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_454_841">
                            <rect width="30" height="30" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <a href="<?php echo get_field('site_url_list');?>" target=”_blank” class="contact-details__text"><?php echo get_field('site_url_list');?></a>
                    </li>
                </ul>
            </div>


        </div>


    </section>

    <!-- Contact section end -->

<?php get_footer() ?>