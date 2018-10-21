<?php
header ("Content-Type:text/css");
$color = "#ea0117"; // Change your Color Here

function checkhexcolor($color) {
  return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'color' ] ) AND $_GET[ 'color' ] != '' ) {
  $color = "#" . $_GET[ 'color' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
  $color = "#ea0117";
}

?>


 .site-preloader,
 .style-switcher-panel .switcher-panel-box>h3,
 .style-switcher-panel .switcher-panel-spinner,
 .style-switcher-panel .switcher-layout span,
 .directory-search-form-one .search-btn>button,
 .directory-search-form-one .search-form-category li a:hover,
 .directory-search-form-two .search-btn>button,
 .directory-search-form-paralax .search-form-vartical-cont,
 .directory-search-form-map-vartical .search-form-vartical-cont,
 .directory-slide-carousel .search-btn>button,
 .directory-search-form-slider .search-filter .search-btn>button,
 .section-title.two h2::before,
 .section-title.two h2::after,
 .pagination li.active a,
 .pagination li a:hover,
 .pagination li.active a:hover,
 .advertise.vertical-two .advertise-cont>button,
 .advertise.vertical-three .advertise-cont h4 span,
 .home-one-cat-location .cat-loc-cont-overlay button,
 .home-one-cat-item .cat-item-header,
 .home-one-cat-item .cat-item-cont,
 .home-one-cat-item .cat-item-btn,
 .home-one-feat-btn button,
 .latest-item-carousel .slick-prev.slick-arrow,
 .latest-item-carousel .slick-next.slick-arrow,
 .latest-item-carousel .latest-img-overlay p span:first-child,
 .home-one-featured-img-ovrly.all>span.hi-rat,
 .home-two-category .home-two-cont-overlay button,
 .home-two-featured .home-two-feat-overlay button,
 .home-two-btn button,
 .home-two-latest .home-two-latest-img-overlay p span:first-child,
 .home-two-latest .home-two-latest-cont h4,
 #popup-box ul.nav.nav-tabs li.active>a,
 #popup-box .tab-content form button,
 .directory-ctegory .directory-ctegory-items li:hover,
 .home-three-feature-listing .list-item .feature-icon,
 .home-three-feature-listing .feature-listing-btn.text-center>a,
 .home-three-feature-listing .feature-listing-btn.text-center>a:hover,
 .home-three-recent-listing .recent-listing-right .recent-listing-line,
 .home-three-recent-listing .recent-listing-left ul li a:hover,
 .home-three-recent-listing .recent-listing-middle-icon,
 .home-three-registration .register-content .register-btn>a,
 .partner .slick-prev.slick-arrow,
 .partner .slick-next.slick-arrow,
 .footer-contact-form .btn.btn-primary.cont-frm-btn,
 .totop a,
 .restaurant-category .category-item-overlay button:hover,
 .directory-restaurant-btn>button:hover,
 .latest-news .news-item-overlay-content p,
 .realestate-category .category-item h3,
 .realestate-top-srch .item-img-overlay span:last-child,
 #featured-property-carousel .pro-content-ovrly,
 #featured-property-carousel .pro-content-ovrly a,
 #featured-property-carousel .pro-content-ovrly a:hover,
 .realestate-recent .recent-overlay span:first-child,
 .realestate-submit .submit-content>button:hover,
 .transport-popular .price-overlay,
 .transport-popular .price-cont .price,
 .travel-package .item-content p span a,
 .travel-popular .item-right-cont h1 span,
 .travel-hottest .item-content p span a,
 .travel-hottest .img-overlay>span,
 .job-category .cat-item:hover,
 .job-hottest .right-item p a .job-btn>button,
 .newsletter .newsletter-content button,
 .business-cat .bus-cat-item:hover .bus-cat-icon>a,
 .business-feat .feat-item-img-ovrly button,
 .business-all .all-item-cont h4 span a,
 .event-hottest .hottest-event-cont button,
 .pricing-plan-one .pricing-table-price.selected,
 .pricing-plan-one .pricing-table-btn-one a,
 .pricing-plan-one .pricing-table-btn-one a:hover,
 .pricing-table-two-featured,
 .pricing-table-three.selected .pricing-table-top,
 .pricing-table-three.selected .pricing-table-btn-three a,
 .pricing-table-dark .pricing-table-btn-dark a,
 .page-notfound .notfound-search-form span i.fa.fa-home,
 .faq-accordian #accordion .panel.panel-default .panel-heading,
 .contact .contact-form button,
 .pricing-home .pricing-table-two.selected .pricing-table-top,
 .pricing-home .pricing-table-two.selected .pricing-table-btn-two a,
 .pricing-home .pricing-table-two .pricing-table-btn-two a:hover,
 .blog .blog-post-wrap .blog-post-ribbon p,
 .blog-post-all .blog-post .blog-post-content>a,
 .blog-post-all .blog-post .blog-post-content>a:hover,
 .widget.widget-tagcloud .tagcloud-list li a:hover,
 .blog-single-wrap .comment-form .post-comment-btn button:hover,
 .login-form-one-content .login-form-one h2,
 .login-page-three .login-content .login-form span i.fa,
 .login-page-three .login-content .login-social-icons li a:hover,
 .registration-form-content.registration-pg-one h2,
 #testimonial-carousel .carousel-indicators>li.active,
 .testimonial.two .testi-item,
 .testimonial.five .carousel-indicators>li.active,
 .about-us .about-contact button,
 .listing-view-options .listing-icon-view a,
 .slider-handle,
 .checkbox-wrap input[type=checkbox]:checked+.indicator,
 .listing-single-carousel .slick-prev.slick-arrow,
 .listing-single-carousel .slick-next.slick-arrow,
 .widget.widget-search-filter .widget-search-filter-btn button.reset-btn,
 .widget.listing-author a,
 .listing-riv-comnt-form form button,
 .login-form-one-content .login-form-one button,
 .login-page .login-form button,
 .login-page-three .login-content .login-form button,
 .login-page-three.four .login-content.four h2,
 .registration-page .registration-form button,
 .registration-form-left button,
 .registration-form-right button.register-btn,
 .pricing-table-two .pricing-table-btn-two a,
 .pricing-plan-two.layout-two .pricing-table-two-selected,
 .pricing-table-four.selected .pricing-table-price,
 .team .member-img,
 .contact .contact-social a:hover i,
 .slider-handle,
 .home-three-registration .register-middle-overlay,
 .doctor-all .all-dr-info p span button,
 .restaurant-btn>button,
 .travel-popular .left-cont-one h5 span a,
 .job-hottest .right-item p a,
 .job-btn>button {
    background-color: <?php echo $color; ?>!important;
}

 .directory-search-form-one h2 span,
 .parallax-cont-inner h1 span,
 .directory-slide-carousel .carousel-search-form-content h2 span,
 .directory-search-form-slider #directory-slider-carousel .item h2 span,
 .section-title span,
 .advertise.vertical-two .advertise-cont h1>span,
 .advertise.vertical-three .advertise-cont h4 span:first-child,
 .home-one-featured-cont h3 span sub,
 .latest-item-carousel .latest-cont h3 a:hover,
 .latest-item-carousel .latest-cont ul li i,
 .home-two-latest .home-two-latest-cont h3 a:hover,
 .home-two-latest .home-two-latest-cont ul li i,
 .header-top .dropdown-menu.inner a>span.text:hover,
 .header-social-icon li a:hover,
 .nav.navbar-nav li.active a,
 .nav.navbar-nav li.active a:hover,
 .nav.navbar-nav li a:hover,
 #navbar .nav.navbar-nav li>ul.drop-down-menu>li a:hover,
 #navbar .mega-menu .mega-menu-list .mega-menu-links ul li span,
 #popup-box .modal-header button:hover,
 #popup-box .tab-content form .checkbox span a,
 #popup-box .tab-content form .checkbox span a:hover,
 .home-three-feature-listing .list-item-overlay ul li a,
 .home-three-feature-listing .list-item .list-item-content h5>a:hover,
 .home-three-recent-listing .recent-listing-left ul li a,
 .home-three-recent-listing .recent-listing-overlay span>a,
 .home-three-registration .section-title h2 span,
 .counter .counter-item i,
 .footer-categories-links a,
 .footer-address p>i,
 .ads-category .ads-cat-item .ads-cat-btn a,
 .ads-category .ads-cat-item li a:hover,
 .ads-featured .feat-ads-cont a:hover,
 .ads-featured.recent .feat-ads-cont a,
 .all-ads .all-ads-cont h3 a,
 .restaurant-exclusive .exclusive-item-content h3>a:hover,
 .directory-restaurant-btn>button,
 .restaurant-popular .popular-item-content h3>a:hover,
 .restaurant-popular .popular-item-content span a:hover,
 .popular-item-sidebar .widget-new-item-content ul li a:hover,
 .latest-news .news-item-content p span>a,
 .latest-news .news-item-content h3 a:hover,
 .latest-news .news-item-content p span>a:hover,
 .realestate-category .category-content li a:hover,
 .realestate-top-srch .top-search-item-content h4 a:hover,
 .realestate-recent .img-overlay-content h3 a:hover,
 .realestate-recent .reecent-item-content h5>span a:hover,
 .realestate-recent .reecent-item-content>p span a:hover,
 .realestate-submit .submit-content h1,
 .transport-featured-cars .fetr-item-img-overlay.medium h4,
 .transport-featured-cars .fetr-item-img-overlay h3 a:hover,
 .transport-featured-bike .fetr-item-img-overlay h3 a:hover,
 .transport-featured-cars .fetr-item-img-overlay h3 span,
 .transport-featured-bike .fetr-item-img-overlay h3 span,
 .transport-featured-bike .fetr-item-img-overlay.medium h4 sup,
 .transport-featured-bike .fetr-item-img-overlay.medium h4,
 .transport-popular .item-content h3 a:hover,
 travel-popular .left-cont-one h3 a:hover,
 .travel-popular .item-right-cont h3,
 .job-hottest .left-item h3 a:hover,
 .job-hottest .left-item span i,
 .job-all .job-item-details h3 a:hover,
 .counter.two.job .counter-item i,
 .business-cat .bus-cat-item h4 a:hover,
 .event-latest .latest-event-cont h3 span a>i,
 .event-upcoming .upcoming-event-cont h3 a:hover,
 .event-upcoming .upcoming-event-cont p>span,
 .event-hottest .hottest-event-cont h4 a i,
 .event-hottest .hottest-event-cont h3 a:hover,
 .pricing-table-two .pricing-table-top h3.price-title,
 .pricing-plan-two.layout-two .pricing-table-top h1,
 .pricing-plan-two.layout-two .fa.fa-check,
 .pricing-plan-two.layout-two .fa.fa-close,
 .pricing-table-three.selected .pricing-table-price h1,
 .pricing-table-four .pricing-table-top h5,
 .pricing-table-four .pricing-table-price h1,
 .contact .cont-item h3 a:hover,
 .contact .contact-social a i,
 .contact.layout-three .contact-info .cont-item h4 span>a:hover,
 .contact.layout-four .contact-info .cont-item-left i,
 .post-meta .post-title>a:hover,
 .post-meta span a i,
 .post-content>a,
 .blog-post-all .blog-post .blog-post-meta h2>a:hover,
 .blog-post-all .blog-post .blog-post-meta a:hover,
 .blog-post .blog-post-details .blog-post-meta span .fa,
 .blog-single-wrap .blog-post-social-share ul li a i.fa,
 .blog-single-wrap .blog-post .post-meta h2 a:hover,
 .blog-single-wrap .blog-post .post-meta span a:hover,
 .blog-single-wrap .blog-post .post-meta span i,
 .widget.widget-category ul li a:hover,
 .widget.widget-archive ul li a:hover,
 .widget h4,
 .widget.widget-recent-post .recent-post h5 a:hover,
 .coming-soon-wrap .countdown-content h1 span,
 .coming-soon-wrap.two .social-icons h3,
 .coming-soon-wrap .social-icons ul li a .fa,
 .coming-soon-wrap.two .social-icons ul li a .fa:hover,
 .registration-form p>a,
 .registration-form .checkbox span a,
 .registration-forms .sec-title h2 span,
 .team.ly-three .member-social ul li a i,
 .team.ly-four .member-info h3,
 .team.ly-four .member-social ul li a:hover i,
 .about-us .about-serv-cont .about-serv-cont-item>i,
 .listing-single-wrap .listing-single-features ul li a i,
 .style-switcher-panel .switcher-header .bootstrap-select .filter-option.pull-left,
 .style-switcher-panel .switcher-header .bootstrap-select .dropdown-menu.inner li a span,
 .style-switcher-panel .switcher-header .btn.dropdown-toggle.bs-placeholder.btn-info span.bs-caret .fa,
 .style-switcher-panel .switcher-header .btn.dropdown-toggle.bs-placeholder.btn-info>span,
 .page-header .page-content h4 span>a,
 .home-one-featured-item.all .home-one-featured-cont ul li a i,
 .color-main,
 .blog-list .blog-layout-list .post-meta h2 a:hover,
 .check-box span.fg a:hover,
 .login-page-three .login-content .login-social-icons li a,
 .check-box label a.tc,
 .coming-soon-wrap .countdown-content h1 span,
 .coming-soon-wrap .social-icons ul li a .fa,
 .coming-soon-wrap.two .social-icons h3,
 .directory-ctegory .directory-ctegory-items li a i,
 .ads-featured .feat-ads-cont a,
 .doctor-all .all-dr-info p span a,
 .job-all .job-price h4 span {
    color: <?php echo $color; ?>!important;
}

 .directory-search-form-one .search-btn>button,
 .directory-search-form-two .search-btn>button,
 .directory-slide-carousel .search-btn>button,
 .directory-search-form-slider .search-filter .search-btn>button,
 .pagination li.active a,
 .pagination li a:hover,
 .pagination li.active a:hover,
 .advertise.vertical-two .advertise-cont>button,
 .border-line::after,
 .home-three-registration .register-content,
 .counter .counter-item,
 .counter .counter-item::after,
 .directory-restaurant-btn>button,
 .travel-pricing .pricing-table-two.selected,
 .job-category .cat-item-overlay,
 .job-btn>button,
 .newsletter .newsletter-content button,
 .pricing-plan-one .pricing-table-price,
 .pricing-plan-one .pricing-table-price::after,
 .pricing-plan-one .pricing-table-btn-one a,
 .pricing-table-two.selected,
 .pricing-table-four.selected,
 .faq-accordian #accordion .panel.panel-default,
 .contact .contact-social a i,
 .contact.layout-four .contact-info .cont-item-left i,
 .pricing-home .pricing-table-two .pricing-table-top,
 .pricing-home .pricing-table-two .pricing-table-btn-two a,
 .blog .blog-post-wrap .blog-post-ribbon p:before,
 .blog .blog-post-wrap .blog-post-ribbon p::after,
 .post-content>a,
 .blog-single-wrap .blog-post-social-share ul li a i.fa,
 .login-form-one-content .login-form-one,
 .login-page-three .login-content .login-form .form-group input,
 .login-page-three .login-content .login-social-icons li a,
 .registration-form-content.registration-pg-one .registration-form.registration-pg-one,
 .team.ly-three .member-social ul li a span,
 .team.ly-four .member-social ul li a:hover span,
 #testimonial-carousel .carousel-indicators>li,
 .pin::after,
 .pin::before,
 #map-two .pin::after,
 #map-two .pin::before,
 .style-switcher-panel .switcher-header .btn.dropdown-toggle.bs-placeholder.btn-info,
 .style-switcher-panel .switcher-header .btn.dropdown-toggle.bs-placeholder.btn-info,
 .login-form-one-content .login-form-one button,
 .login-page .login-form button,
 .login-page-three .login-content .login-form button,
 .login-page-three.four .login-content.four,
 .registration-page .registration-form button,
 .registration-form-left button,
 .registration-form-right button.register-btn,
 .pricing-table-two .pricing-table-btn-two a,
 .coming-soon-wrap .social-icons ul li a .fa,
 .restaurant-btn>button {
    border-color: <?php echo $color; ?>!important;
}

 .directory-search-form-one .search-btn>button:hover,
 .directory-search-form-two .search-btn>button:hover,
 .directory-slide-carousel .search-btn>button:hover,
 .directory-search-form-slider .search-filter .search-btn>button:hover,
 .home-one-feat-btn button:hover,
 .home-one-featured-cont ul li a:hover,
 .home-two-btn button:hover,
 .header-login-sign li a:hover,
 #navbar .add-listing-btn a:hover,
 #popup-box ul.nav.nav-tabs>li.active>a:hover,
 #popup-box ul.nav.nav-tabs>li>a:hover,
 #popup-box .tab-content form button:hover,
 .home-three-registration .register-content .register-btn>a:hover,
 .restaurant-exclusive .exclusive-item-overlay-two span i:hover,
 .restaurant-btn>button:hover,
 .restaurant-btn>button:hover,
 .realestate-submit .submit-content>button,
 .transport-btn>button:hover,
 .job-btn>button:hover,
 .newsletter .newsletter-content button:hover,
 .booking-form button,
 .pricing-table-two .pricing-table-btn-two a:hover,
 .pricing-table-btn-three a:hover,
 .pricing-table-three.selected .pricing-table-btn-three a:hover,
 .pricing-table-four.selected .pricing-table-btn-four a,
 .pricing-table-btn-four a:hover,
 .pricing-table-four.selected .pricing-table-btn-four a:hover,
 .pricing-home .pricing-table-two.selected .pricing-table-btn-two a:hover,
 .post-content>a:hover,
 .blog-single-wrap .blog-post-social-share ul li a i.fa:hover,
 .post-comment-text .author-comment-text h4 a:hover,
 .blog-single-wrap .comment-form .post-comment-btn button,
 .blog-single-wrap .comment-form .post-comment-btn button:hover,
 .login-page .login-form button:hover,
 .login-form-one-content .login-form-one button:hover,
 .registration-page .registration-form button:hover,
 .login-page-three .login-content .login-form button:hover,
 .registration-form-left button:hover,
 .registration-form-right button.register-btn:hover,
 .about-us .about-contact button:hover,
 .widget.tags ul li a:hover,
 .listing-riv-comnt-form form button:hover,
 .totop a:hover,
 .contact .contact-form button:hover,
 .doctor-all .all-dr-info p span button:hover,
 .job-btn>button:hover {
    background-color: #ee1919!important;
    border-color: #ee1919!important;
}

 .ads-featured .feat-ads-cont a:hover {
    color: #ee1919!important;
}

 .pulse::after {
    -webkit-box-shadow: 0 0 6px 3px #ee1919;
    box-shadow: 0 0 6px 3px #ee1919;
}

 #map-two .pulse::after {
    -webkit-box-shadow: 0 0 6px 3px #ee1919;
    box-shadow: 0 0 6px 3px #ee1919;
}

 #navbar .mega-menu .mega-menu-list .mega-menu-links ul li a {
    color: #34495e!important;
}

 .home-one-featured-item.all .home-one-featured-cont ul li a:hover i,
 .post-content>a:hover,
 .blog-single-wrap .blog-post-social-share ul li a i.fa:hover,
 .login-page-three .login-content .login-social-icons li a:hover,
 .pricing-table-four.selected .pricing-table-price h1,
 .pricing-table-four.selected .pricing-table-price p,
 .contact .contact-social a:hover i,
 .directory-ctegory .directory-ctegory-items li:hover a i,
 .home-three-recent-listing .recent-listing-left ul li a:hover,
 .ads-featured.recent .feat-ads-cont h4 span a,
 .restaurant-exclusive .exclusive-item-overlay-two span i:hover,
 .directory-restaurant-btn>button:hover,
 .job-category .cat-item:hover span a,
 .job-category .cat-item:hover h3,
 .job-category .cat-item:hover h5 {
    color: #fff!important;
}

 .pricing-table-four.selected .pricing-tringle-shape {
    border-top: 40px solid <?php echo $color; ?>!important;
}

 .team .member-img::before {
    border-bottom: 80px solid <?php echo $color; ?>!important;
}

 .team .member-img::after {
    border-top: 80px solid <?php echo $color; ?>!important;
}

 .team.ly-four .team-member .member-img,
 .team.ly-three .team-member .member-img,
 .team.ly-two .team-member .member-img,
 .advertise.vertical-three .advertise-cont h4 span:first-child {
    background-color: transparent!important
}

 .team.ly-three .member-social ul li a:hover i {
    color: #34495e!important
}

 .team.ly-three .member-social ul li a:hover span {
    border-color: #34495e!important
}

 .home-three-feature-listing .list-item-overlay,
 .event-hottest .hottest-event-overlay {
    background-color: rgba(249, 65, 65, 0.8);
}

 .business-cat .bus-cat-icon a {
    -webkit-box-shadow: 0 0 0 4px <?php echo $color; ?>!important;
    box-shadow: 0 0 0 4px <?php echo $color; ?>!important;
}

 .testimonial.five .client-info img {
    -webkit-box-shadow: 0 0 0 4px <?php echo $color; ?>!important;
    box-shadow: 0 0 0 4px <?php echo $color; ?>!important;
}

 .job-category .cat-item:hover .cat-item-overlay {
    border-color: #fff!important;
}

 .slider-handle {
    background-color: <?php echo $color; ?>!important;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ee1919), to(<?php echo $color; ?>!important));
    background-image: linear-gradient(to bottom, #ee1919 0%, <?php echo $color; ?>!important 100%);
}

.contact-form button {
   
    color: #ffffff;
   
    background: <?php echo $color; ?>!important;
    border: 2px solid <?php echo $color; ?>!important;
   
}


.contact-info .contact-content .contact-list ul li .contact-thumb i{
  color:#ea0117;
}
.contact-form h2:after{
    background-color:<?php echo $color; ?>!important;
   
}
.contact-form input:focus,
.contact-form select:focus,
.contact-form textarea:focus{
    border-color:<?php echo $color; ?>!important;
   
}
.contact-form button{
    background: <?php echo $color; ?>!important;
   
    border: 2px solid <?php echo $color; ?>!important;
   
}

.footer-contact-form input[type=text]:focus,
.footer-contact-form input[type=email]:focus {
    border: 1px solid #<?php echo $color; ?>!important;
}
.footer-contact-form input[type=submit] {
    background: <?php echo $color; ?>!important;
}

.contact-info .contact-content .contact-list ul li .contact-thumb i {
    color: <?php echo $color; ?>!important;
}
 


