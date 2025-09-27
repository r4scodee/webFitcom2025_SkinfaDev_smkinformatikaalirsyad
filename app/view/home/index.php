<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tani Digital</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>assets/img/favicon.ico">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/meanmenu.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/fonts/satoshi/satoshi.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/icons/remixicon/remixicon.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/icons/themify/themify-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/niceselect.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/responsive.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <div class="preloader_wrap">
        <div class="preloader"></div>
    </div>

    <div class="header_middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-6 align-self-center">
                    <div class="logo">
                        <a href="<?= BASE_URL?>"><img src="assets/img/logo/logo.png" alt="logo"></a>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-4 d-none d-lg-block col-12 align-self-center" id="caridisini">
                    <div class="search_bar">
                        <form id="searchForm">
                            <div class="search_category">
                                <select class="category_select" id="categorySelect"
                                    onchange="if(this.value) window.location=this.value;">
                                    <option value="#produk">Semua Kategori</option>
                                    <option value="#produk">Buah</option>
                                    <option value="#produk">Sayuran</option>
                                    <option value="#kacang">Kacang</option>
                                    <option value="#teh">Daun Teh & Jus</option>
                                    <option value="#paket">Paket Sayur & Buah</option>
                                </select>
                            </div>
                            <input type="text" class="cat_input" id="searchInput"
                                placeholder="Tulis Kata Kunci dan Cari" />
                            <button type="submit" class="cc_button">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                    </div>
                </div>


            </div>
        </div>

        <div id="mini_cart" class="min_cart_wrapper">
            <div class="cart_drawer">
                <div class="cart_top">
                    <a href="#" class="cart_close"><i class="ri-close-fill"></i></a>
                    <h3 class="title">Daftar Produk</h3>
                    <span class="cart_number">4</span>
                </div>

                <div class="mini_cart_list">
                    <ul>
                        <li class="d-flex">
                            <div class="thumb_img_cartmini">
                                <a href="https://id.shp.ee/FtAeJ5q" class="mc_img">
                                    <img src="assets/img/flash_sale/1.png" alt="">
                                </a>
                            </div>

                            <div class="product-detail">
                                <h3 class="product_name_mini">
                                    <a href="https://id.shp.ee/FtAeJ5q">Jeruk Mandarin Fresh 1 KG</a>
                                </h3>
                                <div class="product_info">
                                    <div class="product_quanity"></div>
                                    <div class="product_price">
                                        <span class="price_sale">
                                            <span class="quantity">3 × <span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">Rp</span>250.000</bdi>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="produc_remove">
                                <a href="#" class="remove-product" aria-label="Hapus Jeruk dari keranjang"
                                    data-product_id="861" data-cart_item_key="f9a40a4780f5e1306c46f1c8daecee3b"
                                    data-product_sku=""><i class="ri-delete-bin-6-line"></i></a>
                            </div>
                        </li>


                        <li class="d-flex">
                            <div class="thumb_img_cartmini">
                                <a href="https://id.shp.ee/FtAeJ5q" class="mc_img">
                                    <img src="assets/img/flash_sale/2.png" alt="">
                                </a>
                            </div>

                            <div class="product-detail">
                                <h3 class="product_name_mini">
                                    <a href="https://id.shp.ee/FtAeJ5q">
                                        Stroberi - buah musim panas yang manis dan sehat
                                    </a>
                                </h3>
                                <div class="product_info">
                                    <div class="product_quanity"></div>
                                    <div class="product_price">
                                        <span class="price_sale">
                                            <span class="quantity">1 × <span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">Rp</span>270.000</bdi>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="produc_remove">
                                <a href="#" class="remove-product"><i class="ri-delete-bin-6-line"></i></a>
                            </div>
                        </li>

                        <li class="d-flex">
                            <div class="thumb_img_cartmini">
                                <a href="https://id.shp.ee/FtAeJ5q" class="mc_img">
                                    <img src="assets/img/flash_sale/3.png" alt="">
                                </a>
                            </div>

                            <div class="product-detail">
                                <h3 class="product_name_mini">
                                    <a href="https://id.shp.ee/FtAeJ5q">
                                        Paprika - manfaat kesehatan luar biasa
                                    </a>
                                </h3>
                                <div class="product_info">
                                    <div class="product_quanity"></div>
                                    <div class="product_price">
                                        <span class="price_sale">
                                            <span class="quantity">2 × <span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">Rp</span>300.000</bdi>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="produc_remove">
                                <a href="#" class="remove-product"><i class="ri-delete-bin-6-line"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="cart_drawer_btm">
                    <div class="sub-total">
                        <strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><bdi><span
                                    class="woocommerce-Price-currencySymbol">Rp</span>1.620.000</bdi>
                        </span>
                    </div>

                    <div class="bottom_group">
                        <a href="cart.html" class="button-viewcart">
                            <span>Lihat Keranjang</span>
                        </a>
                        <a href="checkout.html" class="button-checkout">
                            <span>Bayar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header id="main-header">
        <div class="container">
            <nav class="navbar">
                <div class="header__hamburger d-xl-none my-auto">
                    <div class="sidebar__toggle">
                        <i class="ri-menu-2-line"></i>
                    </div>
                </div>


                <nav class="main-menu position-relative">
                    <ul>
                        <li>
                            <a href="<?= BASE_URL?>">Beranda</a>
                        </li>
                        <li>
                            <a href="#tentangkami">Tentang Kami</a>
                        </li>
                        <li><a href="#produk">Produk</a></li>

                        <li><a href="#artikel">Artikel</a></li>

                        <li><a href="#kontak">Kontak Kami</a></li>
                    </ul>

                </nav>

                <div class="navbar_contact_area">
                    <i class='ri-phone-line'></i>
                    <div class="navbar_contact_area_end">
                        <p>Hubungi kami</p>
                        <h4><a href="https://wa.me/6287877566677">+62 878-7756-6677</a></h4>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section class="hero-area">
        <div class="container position-relative">
            <div class="hero_slider" style="background-image: url(assets/img/slider/bg.svg);">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="hero_item">
                            <div class="row">
                                <div class="col-lg-5 col-12 align-self-center">
                                    <div class="hero_content animated">
                                        <h4>100% MAKANAN ORGANIK DAN SEGAR</h4>
                                        <h1>Sayur dan Buah Buahan <br> Segar & Sehat</h1>
                                        <p>Dipanen langsung dari kebun pilihan, penuh nutrisi dan bebas bahan kimia
                                            untuk hidup lebih sehat.</p>
                                        <a href="https://id.shp.ee/FtAeJ5q" class="main_btn">Belanja Sekarang <i
                                                class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-7 d-lg-block d-none d-md-none col-12 align-self-center z-2">
                                    <div class="hero_img animated">
                                        <img src="assets/img/slider/1.png" class="hmain_img eitem" alt="2">
                                        <img src="assets/img/slider/palm.svg" class="hero_img_shape eitem" alt="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="swiper-slide">
                        <div class="hero_item">
                            <div class="row">
                                <div class="col-lg-5 col-12 align-self-center">
                                    <div class="hero_content animated">
                                        <h4>100% MAKANAN ORGANIK DAN SEGAR</h4>
                                        <h1>Sayur & Buah <br> Berkualitas Tinggi</h1>
                                        <p>Kami menghadirkan produk segar pilihan terbaik dengan standar kualitas tinggi
                                            langsung ke meja Anda.</p>
                                        <a href="https://id.shp.ee/FtAeJ5q" class="main_btn">Belanja Sekarang <i
                                                class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>

                                <div class="col-lg-7 d-lg-block d-none d-md-none col-12 align-self-center z-2">
                                    <div class="hero_img animated">
                                        <img src="assets/img/slider/2.png" class="hmain_img eitem" alt="2">
                                        <img src="assets/img/slider/palm.svg" class="hero_img_shape eitem" alt="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="hero_pagination"></div>
            <div class="hs_prev_arrow harrow"><i class="ph ph-caret-left"></i></div>
            <div class="hs_next_arrow harrow"><i class="ph ph-caret-right"></i></div>

            <div class="hero_shaps">
                <img src="assets/img/slider/shapes/1.svg" class="hshap1 eitem" alt="1">
                <img src="assets/img/slider/shapes/2.svg" class="hshap2 eitem" alt="2">
                <img src="assets/img/slider/shapes/3.svg" class="hshap3 eitem" alt="2">
                <img src="assets/img/slider/shapes/4.svg" class="hshap4 eitem" alt="3">
                <img src="assets/img/slider/shapes/5.svg" class="hshap5 eitem" alt="1">
            </div>
        </div>
    </section>


    <section class="category-area pb-100">
        <div class="container">
            <div class="category_area">
                <div class="section-title wow fadeInUp">
                    <h2>Kategori Populer</h2>
                </div>

                <div id="category-slider" class="owl-carousel wow fadeIn">
                    <div class="single_category">
                        <a href="#">
                            <img src="assets/img/category/super-food.png" alt="">
                            <h4>Sayur & Buah</h4>
                            <p>34 Produk</p>
                        </a>
                    </div>

                    <div class="single_category">
                        <a href="#">
                            <img src="assets/img/category/nuts.png" alt="">
                            <h4>Biji & Kacang</h4>
                            <p>11 Produk</p>
                        </a>
                    </div>
                    <div class="single_category">
                        <a href="#">
                            <img src="assets/img/category/coffe.png" alt="">
                            <h4>Daun Teh & Jus</h4>
                            <p>8 Produk</p>
                        </a>
                    </div>

                    <div class="single_category">
                        <a href="#">
                            <img src="assets/img/category/oil.png" alt="">
                            <h4>Minyak</h4>
                            <p>3 Produk</p>
                        </a>
                    </div>

                    <div class="single_category">
                        <a href="#">
                            <img src="assets/img/category/venegar.png" alt="">
                            <h4>Cuka</h4>
                            <p>5 Produk</p>
                        </a>
                    </div>

                    <div class="single_category">
                        <a href="#">
                            <img src="assets/img/category/salt.png" alt="">
                            <h4>Garam</h4>
                            <p>2 Produk</p>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </section>



    <section class="choose_us pt_80 wow fadeInUp" id="tentangkami">
        <div class="container">
            <div class="section-title mb_50 wow fadeInUp">
                <h2>Tentang Kami</h2>
            </div>

            <div class="row">
                <div class="col-xl-4 col-12 align-self-center wow fadeInUp">
                    <div class="nav flex-column nav-pills tabe-menu" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-one-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-one" type="button" role="tab" aria-controls="v-pills-one"
                            aria-selected="true">
                            <img src="assets/img/choose_us/icon-1.svg" alt=""> Tentang Kami
                        </button>

                        <button class="nav-link" id="v-pills-two-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-two" type="button" role="tab" aria-controls="v-pills-two"
                            aria-selected="false">
                            <img src="assets/img/counter/3.svg" alt=""> Kenapa Memilih Kami?
                        </button>

                        <button class="nav-link" id="v-pills-three-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-three" type="button" role="tab" aria-controls="v-pills-three"
                            aria-selected="false">
                            <img src="assets/img/choose_us/icon-3.svg" alt=""> 100% Produk Organik
                        </button>
                    </div>
                </div>

                <div class="col-xl-8 col-12 wow fadeInUp">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-one" role="tabpanel"
                            aria-labelledby="v-pills-one-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xl-6 col-12 align-self-center">
                                    <div class="choose_img">
                                        <img src="assets/img/choose_us/1.png" alt="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-12 align-self-center">
                                    <div class="choose_content">
                                        <h3>Tentang Kami</h3>
                                        <p>Kami adalah penyedia produk pertanian segar dan organik yang berkomitmen
                                            menghadirkan kualitas terbaik langsung dari petani lokal. Website ini hadir
                                            untuk memudahkan Anda mendapatkan sayur, buah, dan bahan pangan
                                            sehat dengan cara yang praktis.</p>
                                        <p>Visi kami adalah mendukung gaya hidup sehat sekaligus membantu petani
                                            meningkatkan kesejahteraan melalui sistem pertanian pintar dan
                                            berkelanjutan.</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-two" role="tabpanel" aria-labelledby="v-pills-two-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-xl-6 col-12 align-self-center">
                                    <div class="choose_img">
                                        <img src="assets/img/choose_us/1.png" alt="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-12 align-self-center">
                                    <div class="choose_content">
                                        <h3>Kenapa Memilih Kami?</h3>
                                        <p>Kami berkomitmen untuk menyediakan produk organik berkualitas tinggi dengan
                                            harga yang terjangkau. Semua sayur dan buah kami dipanen segar, dikemas
                                            dengan higienis, dan dikirim cepat agar tetap terjaga kesegarannya.</p>
                                        <p>Kepercayaan Anda adalah prioritas kami, karena itu kepuasan pelanggan selalu
                                            menjadi fokus utama.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-three" role="tabpanel"
                            aria-labelledby="v-pills-three-tab" tabindex="0">
                            <div class="row">
                                <div class="col-xl-6 col-12 align-self-center">
                                    <div class="choose_img">
                                        <img src="assets/img/choose_us/1.png" alt="">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-12 align-self-center">
                                    <div class="choose_content">
                                        <h3>100% Produk Organik</h3>
                                        <p>Produk kami bebas dari pestisida kimia, bahan pengawet, dan pewarna buatan.
                                            Semua diproses dengan cara alami untuk menjaga nutrisi tetap utuh.</p>
                                        <p>Dengan memilih produk organik, Anda ikut mendukung gaya hidup sehat sekaligus
                                            menjaga kelestarian lingkungan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="partners pb_100" id="partnerpasok">
        <div class="container">
            <div class="section-title wow fadeInUp">
                <h2>Partner Pasok</h2>
            </div>

            <div class="row">
                <div class="col-12 wow fadeIn">
                    <div id="partner-slider" class="owl-carousel">
                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/1.png" alt=""></a>
                        </div>

                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/2.png" alt=""></a>
                        </div>

                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/3.png" alt=""></a>
                        </div>

                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/4.png" alt=""></a>
                        </div>

                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/5.png" alt=""></a>
                        </div>

                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/6.png" alt=""></a>
                        </div>

                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/7.png" alt=""></a>
                        </div>
                        <div class="partner_item">
                            <a href="#"><img src="assets/img/partners/8.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="promo" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-12 wow fadeIn">
                    <div class="promo_main_area" style="background-image: url(assets/img/promo/1.png);">
                        <div class="promo_content">
                            <h2><span>Murni & Organik</span> Jus Kiwi Fresh
                            </h2>
                            <p>Kesegaran murni, langsung dari perkebunan ke gelasmu</p>
                            <a href="https://id.shp.ee/FtAeJ5q" class="main_btn">Beli Sekarang <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12 wow fadeIn">
                    <div class="promo_main_area" style="background-image: url(assets/img/promo/2.png);">
                        <div class="promo_content">
                            <h2><span>Makan Sehat </span> Dimulai dari Sini!</h2>
                            <p>Bangun hidup sehatmu yang segar</p>
                            <a href="https://id.shp.ee/FtAeJ5q" class="main_btn">Beli Sekarang <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular_products">
        <div class="container">
            <div class="section-title wow fadeInUp">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <h2>Produk Populer</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-6 col-12 wow fadeIn">
                    <div class="popular_promo" style="background-image: url(assets/img/popular_products/mein.png);">
                        <div class="ppromo_content text-center">
                            <h2>
                                <span><u>30%</u> Diskon</span> Produk Terlaris
                            </h2>
                            <p>Resep Jus Detox Untuk <br>Menurunkan Berat Badan</p>
                            <a href="https://id.shp.ee/FtAeJ5q" class="yellow-btn">Beli Sekarang <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-6 col-12 wow fadeIn">
                    <div class="pproduct_slider owl-carousel">

                        <div class="single_pproduct d-flex" data-slide-index="1">
                            <div class="pproduct_img align-self-center">
                                <span>-10%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/1.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Kol Putih - segar untuk masakan sehari-hari</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp12.750</span>
                                    <del>Rp15.000</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="2">
                            <div class="pproduct_img align-self-center">
                                <span>-15%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/2.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Labu Kuning - manis dan kaya serat</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp16.065</span>
                                    <del>Rp18.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="3">
                            <div class="pproduct_img align-self-center">
                                <span>-20%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/3.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Jamur Kancing - gurih dan segar</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp27.920</span>
                                    <del>Rp34.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="4">
                            <div class="pproduct_img align-self-center">
                                <span>-25%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/4.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Bawang Merah - bumbu dapur wajib</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp29.925</span>
                                    <del>Rp39.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="5">
                            <div class="pproduct_img align-self-center">
                                <span>-30%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/5.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Bawang Putih - harum dan lezat</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp20.930</span>
                                    <del>Rp29.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="6">
                            <div class="pproduct_img align-self-center">
                                <span>-10%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/6.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Kol Ungu - segar untuk salad</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp24.210</span>
                                    <del>Rp26.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="7">
                            <div class="pproduct_img align-self-center">
                                <span>-15%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/7.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Pare - segar dan menyehatkan</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp15.215</span>
                                    <del>Rp17.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                        <div class="single_pproduct d-flex" data-slide-index="8">
                            <div class="pproduct_img align-self-center">
                                <span>-20%</span>
                                <a href="#" class="d-block">
                                    <div style="background-image:url(assets/img/popular_products/8.jpg);"
                                        class="pp_img_wrap"></div>
                                </a>
                            </div>
                            <div class="pproduct_content align-self-center">
                                <a href="#" class="pprating">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i> <span>(5.0)</span>
                                </a>
                                <h4><a href="#">Bawang Merah Varian - pilihan terbaik</a></h4>
                                <div class="pproduct_price">
                                    <span class="current_price">Rp34.320</span>
                                    <del>Rp42.900</del>
                                </div>
                                <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                        class="ri-shopping-cart-line"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="recommended_products pt_80" id="produk">
        <div class="container" id="produk">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-12 wow fadeInUp">
                    <div class="section-title">
                        <h2>Rekomendasi Produk</h2>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 col-12 text-lg-end rec_tab_area wow fadeInUp" id="productSection">
                    <ul class="rec_tab">
                        <li class="filter" data-filter="all">Semua</li>
                        <li class="filter" data-filter=".buah">Buah</li>
                        <li class="filter" data-filter=".sayuran">Sayuran</li>
                        <li class="filter" data-filter=".kacang">Kacang</li>
                        <li class="filter" data-filter=".minuman">Daun Teh & Jus</li>
                    </ul>
                </div>
            </div>

            <div class="row rec_product_items wow fadeIn">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix buah">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 15%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/1.png" alt="Jeruk Mandarin">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Jeruk Mandarin Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp32.980</span>
                            <del>Rp38.800</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix buah">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge bg_orange">Diskon 25%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/2.png" alt="Stroberi">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Stroberi Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp90.000</span>
                            <del>Rp120.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix buah">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 10%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/3.png" alt="Paprika">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Paprika Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp45.000</span>
                            <del>Rp50.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix sayuran">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge bg_blue">Diskon 30%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/4.png" alt="Peterseli">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Peterseli Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp105.000</span>
                            <del>Rp150.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix sayuran">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 20%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/5.png" alt="Jagung">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Jagung Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp18.000</span>
                            <del>Rp22.500</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix sayuran">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 15%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/6.png" alt="Kol Putih">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Kol Putih Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp12.750</span>
                            <del>Rp15.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix sayuran buah" id="paket">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge bg_blue">Diskon 30%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/7.png" alt="Paket Buah">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Paket Sayur & Buah Fresh</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp52.500</span>
                            <del>Rp75.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix buah">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 25%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/8.png" alt="Tomat">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Tomat Fresh 1 KG</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp14.100</span>
                            <del>Rp18.750</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix kacang" id="kacang">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 20%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/9.png" alt="Kacang Almond">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Kacang Almond Premium 500gr</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp80.000</span>
                            <del>Rp100.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix minuman" id="teh">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge bg_orange">Diskon 25%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/10.png" alt="Daun Teh Hijau">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Daun Teh Hijau Asli 200gr</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp37.500</span>
                            <del>Rp50.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix minuman" id="jus">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge bg_blue">Diskon 30%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/11.png" alt="Jus Jeruk Botol">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Jus Jeruk Botol 1L</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp28.000</span>
                            <del>Rp40.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mix minuman" id="jus">
                    <div class="single_flash">
                        <div class="flash-image">
                            <span class="off_badge">Diskon 10%</span>
                            <a href="https://id.shp.ee/FtAeJ5q" class="d-block">
                                <img src="assets/img/flash_sale/12.png" alt="Jus Apel Botol">
                            </a>
                        </div>
                        <div class="flash-rating">
                            <a href="#"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i>
                                <span class="frating_number">(5.0)</span></a>
                        </div>
                        <h3><a href="https://id.shp.ee/FtAeJ5q">Jus Apel Botol 1L</a></h3>
                        <div class="flash_price">
                            <span class="current_price">Rp36.000</span>
                            <del>Rp40.000</del>
                        </div>
                        <a href="https://id.shp.ee/FtAeJ5q" class="border-btn">Pesan Sekarang <i
                                class='ri-shopping-cart-line'></i></a>
                    </div>
                </div>


            </div>



        </div>
    </section>

    <section class="discount section_padding wow fadeInUp">
        <div class="container">
            <div class="discount_content">
                <div class="d_off_badge mb_25">Diskon hingga 50%</div>
                <h2 class="mb_25">
                    <span>Murni & Organik</span> Buah, Sayur, dan Daging
                </h2>
                <p>Bangun hidup sehatmu yang segar</p>
                <a href="https://id.shp.ee/FtAeJ5q" class="white-btn">Beli Sekarang <i
                        class="ri-arrow-right-line"></i></a>
            </div>
        </div>
    </section>



    <section class="blog pt_80" id="artikel">
        <div class="container">
            <div class="section-title">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12 align-self-center wow fadeInUp">
                        <h2>Artikel Terbaru</h2>
                    </div>
                </div>
            </div>

            <div class="blog_area">
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-12 wow fadeInUp">
                        <div class="single_blog">
                            <img src="assets/img/blog/1.png" alt="Porsi Buah dan Sayur Sehari">
                            <h3>
                                <a href="https://hellosehat.com/nutrisi/tips-makan-sehat/porsi-makan-buah-sayur-sehari/"
                                    target="_blank">
                                    Berapa Banyak Porsi Makan Sayur dan Buah dalam Sehari?
                                </a>
                            </h3>
                            <ul class="blog_meta">
                                <li><i class="ri-time-line"></i> 05 Juni 2024</li>
                                <li><i class="ri-file-line"></i>
                                    <a href="#">Kesehatan</a>,
                                    <a href="#">Gaya Hidup</a>
                                </li>
                            </ul>
                            <a href="https://hellosehat.com/nutrisi/tips-makan-sehat/porsi-makan-buah-sayur-sehari/"
                                target="_blank" class="blog_btn">
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-12 wow fadeInUp">
                        <div class="single_blog">
                            <img src="assets/img/blog/2.png" alt="Deep Tech Pertanian ASEAN">
                            <h3>
                                <a href="https://wartaekonomi.co.id/read583116/deep-tech-jadi-motor-perubahan-pertanian-di-asean"
                                    target="_blank">
                                    Deep Tech Jadi Motor Perubahan Pertanian di ASEAN
                                </a>
                            </h3>
                            <ul class="blog_meta">
                                <li><i class="ri-time-line"></i> 21 Sept 2025</li>
                                <li><i class="ri-file-line"></i>
                                    <a href="#">Agritech</a>,
                                    <a href="#">Inovasi</a>
                                </li>
                            </ul>
                            <a href="https://wartaekonomi.co.id/read583116/deep-tech-jadi-motor-perubahan-pertanian-di-asean"
                                target="_blank" class="blog_btn">
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 wow fadeInUp">
                        <div class="single_blog">
                            <img src="assets/img/blog/3.png" alt="Contoh Smart Farming Indonesia">
                            <h3>
                                <a href="https://www.detik.com/jogja/bisnis/d-7880844/7-contoh-smart-farming-dalam-bidang-pertanian-lengkap-dengan-keunggulannya"
                                    target="_blank">
                                    7 Contoh Smart Farming dan Keunggulannya
                                </a>
                            </h3>
                            <ul class="blog_meta">
                                <li><i class="ri-time-line"></i> 22 Apr 2025</li>
                                <li><i class="ri-file-line"></i>
                                    <a href="#">Pertanian</a>,
                                    <a href="#">Teknologi</a>
                                </li>
                            </ul>
                            <a href="https://www.detik.com/jogja/bisnis/d-7880844/7-contoh-smart-farming-dalam-bidang-pertanian-lengkap-dengan-keunggulannya"
                                target="_blank" class="blog_btn">
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>





    <section class="main-banner banner_style_2" id="kontak">
        <div class="container text-center">
            <h2>Ada pertanyaan? Hubungi Kami Sekarang</h2>
        </div>
    </section>
    <section class="contact-info section_padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-12 wow fadeInUp">
                    <div class="contact_info_item gap-4">
                        <i class="fa-solid fa-location-dot"></i>
                        <div class="cinfo_content">
                            <p>
                                Cirebon, Jawa Barat, Indonesia </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 wow fadeInUp">
                    <div class="contact_info_item gap-4">
                        <i class="fa-solid fa-phone"></i>
                        <div class="cinfo_content">
                            <span>Hubungi kami : </span>
                            <p>
                                <a href="https://wa.me/6287877566677" target="_blank">+62 878-7756-6677</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-12 wow fadeInUp">
                    <div class="contact_info_item gap-4">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="cinfo_content">
                            <span>Email kami : </span>
                            <p>
                                <a href="mailto:tanidigital@gmail.com">tanidigital@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6 col-12 wow fadeInUp">
                    <div class="contact_info_item gap-4">
                        <i class="fa-regular fa-clock"></i>
                        <div class="cinfo_content">
                            <span>Jam buka : </span>
                            <p>
                                09:00 – 17:00 WIB
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-us section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeIn">
                    <div class="c_gmap">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31685.123456789!2d108.5500!3d-6.7167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e71f3c4b9cb14df%3A0xabcdef1234567890!2sCirebon%2C%20Jawa%20Barat%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1234567890123"
                            width="600" height="595" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>

                </div>

                <div class="col-lg-6 align-self-center wow fadeIn">
                    <div class="contact_form_wrap">
                        <div class="contact_title">
                            <h2>Kirimkan Pesan Anda Lewat Form di Bawah</h2>
                            <p>
                                Jika Anda ingin menghubungi kami langsung, silakan lengkapi formulir di bawah ini.
                            </p>
                        </div>

                        <div class="contact-form">
                            <form id="whatsapp-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label" for="name">Nama Anda *</label>
                                            <input type="text" id="name" class="form-control"
                                                placeholder="Masukkan nama Anda" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label class="label" for="email">Email Anda *</label>
                                            <input type="email" id="email" class="form-control"
                                                placeholder="Masukkan email Anda" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label class="label" for="subject">Subjek *</label>
                                            <input type="text" id="subject" class="form-control"
                                                placeholder="Subjek pesan" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-4">
                                            <label class="label" for="message">Pesan Anda *</label>
                                            <textarea id="message" class="form-control" placeholder="Tulis pesan"
                                                cols="30" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="main_btn">Kirim ke WhatsApp</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-message mt-4 text-center"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container pb_70">
        <div class="counter_area">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 d-flex wow fadeInUp">
                    <div class="counter_item">
                        <img src="assets/img/counter/1.svg" alt="">
                        <div class="fix">
                            <h4>Gratis Ongkir</h4>
                            <p>Tanpa biaya tambahan ke berbagai daerah</p>
                        </div>
                    </div>
                    <div class="count_devider"></div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 d-flex wow fadeInUp">
                    <div class="counter_item">
                        <img src="assets/img/counter/2.svg" alt="">
                        <div class="fix">
                            <h4>Pembayaran Aman</h4>
                            <p>Dilengkapi metode pembayaran terpercaya</p>
                        </div>
                    </div>
                    <div class="count_devider"></div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 d-flex wow fadeInUp">
                    <div class="counter_item">
                        <img src="assets/img/counter/3.svg" alt="">
                        <div class="fix">
                            <h4>100% Kepuasan</h4>
                            <p>Kualitas produk dijamin segar & terbaik</p>
                        </div>
                    </div>
                    <div class="count_devider"></div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 d-flex wow fadeInUp">
                    <div class="counter_item">
                        <img src="assets/img/counter/4.svg" alt="">
                        <div class="fix">
                            <h4>Dukungan 24/7</h4>
                            <p>Tim kami siap membantu kapan saja dengan cepat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="footer" style="background-image: url(assets/img/footer/bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 wow fadeIn">
                    <div class="footer_widget footer_about">
                        <h4>TaniDigital</h4>
                        <p>Pusat sayur dan buah segar langsung dari kebun pintar untuk keluarga sehat.</p>

                        <div class="footer_cinfo">
                            <p><i class="ph ph-envelope-simple"></i> <span><a
                                        href="mailto:tanidigital@gmail.com">tanidigital@gmail.com</a></span>
                            </p>
                            <p><i class="ph ph-phone"></i> <span><a href="https://wa.me/6287877566677">+62
                                        878-7756-6677</a></span></p>
                            <p><i class="ph ph-map-pin"></i> <span>Cirebon, Jawa Barat, Indonesia</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 wow fadeIn">
                    <div class="footer_widget">
                        <h4>Produk</h4>
                        <ul>
                            <li><a href="#produk">Buah</a></li>
                            <li><a href="#produk">Sayuran</a></li>
                            <li><a href="#kacang">Kacang</a></li>
                            <li><a href="#teh">Daun Teh Pilihan</a></li>
                            <li><a href="#teh">Jus Buah Premium</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 wow fadeIn">
                    <div class="footer_widget">
                        <h4>Tautan Cepat</h4>
                        <ul>
                            <li><a href="#caridisini">Cari Produk</a></li>
                            <li><a href="#tentangkami">Tentang Kami</a></li>
                            <li><a href="#produk">Produk Kami</a></li>
                            <li><a href="#artikel">Artikel</a></li>
                            <li><a href="#kontak">Kontak Kami</a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 wow fadeIn">
                    <div class="footer_widget">
                        <h4>Jelajahi</h4>
                        <ul>
                            <li><a href="#partnerpasok">Partner pasok Kami</a></li>
                            <li><a href="#">Produk Populer</a></li>
                            <li><a href="#">Rekomendasi Produk</a></li>
                            <li><a href="#">Lokasi</a></li>
                            <li><a href="#">Form Pesan</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        <div class="footer-bottom wow fadeIn">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>Copyright © 2025 <a href="#">TaniDigital</a>. Seluruh Hak Cipta Dilindungi</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script src="<?= BASE_URL ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/jquery.meanmenu.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/jquery.appear.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1"></script>

    <script src="<?= BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/swiper-bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/mixitup.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/scroll-top.js"></script>
    <script src="<?= BASE_URL ?>assets/js/bg_video.js"></script>
    <script src="<?= BASE_URL ?>assets/js/jquery.countdown.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/nicesellect.js"></script>
    <script src="<?= BASE_URL ?>assets/js/wow.js"></script>
    <script src="<?= BASE_URL ?>assets/js/newsletter.js"></script>
    <script src="<?= BASE_URL ?>assets/js/script.js"></script>



    <script>
        document.getElementById("searchForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const keyword = document.getElementById("searchInput").value.toLowerCase().trim();
            if (!keyword) return;

            // gabung semua produk: single_flash + single_pproduct
            const products = document.querySelectorAll(".single_flash, .single_pproduct");
            let found = [];

            // hapus highlight lama
            document.querySelectorAll(".search-highlight").forEach(el => el.classList.remove("search-highlight"));

            products.forEach(prod => {
                const h3Text = prod.querySelector("h3") ? prod.querySelector("h3").textContent.toLowerCase() : "";
                const h4Text = prod.querySelector("h4") ? prod.querySelector("h4").textContent.toLowerCase() : "";
                const anchorsText = Array.from(prod.querySelectorAll("a")).map(a => a.textContent.toLowerCase()).join(" ");
                const imgAlt = prod.querySelector("img") ? prod.querySelector("img").alt.toLowerCase() : "";

                const combined = `${h3Text} ${h4Text} ${anchorsText} ${imgAlt}`;

                if (combined.includes(keyword)) {
                    found.push(prod);
                }
            });

            if (found.length === 0) {
                alert("Produk tidak ditemukan!");
                return;
            }

            // highlight semua hasil & scroll ke produk pertama
            found.forEach((m, i) => {
                m.classList.add("search-highlight");
                if (i === 0) m.scrollIntoView({
                    behavior: "smooth",
                    block: "center"
                });
            });
        });
    </script>

    <style>
        .search-highlight {
            outline: 3px solid red;
            outline-offset: 4px;
            transition: outline .3s ease;
        }
    </style>


    <script>
        document.getElementById("whatsapp-form").addEventListener("submit", function (e) {
            e.preventDefault();

            let nama = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let subjek = document.getElementById("subject").value;
            let pesan = document.getElementById("message").value;

            let nomor = "6287877566677"; // nomor tujuan (62 ganti 0)

            // Ambil jam sekarang sesuai WIB
            let now = new Date();
            let hour = now.getHours() + 7; // WIB = UTC+7
            if (hour >= 24) hour -= 24;

            let salam = "";
            if (hour >= 4 && hour < 11) {
                salam = "selamat pagi";
            } else if (hour >= 11 && hour < 15) {
                salam = "selamat siang";
            } else if (hour >= 15 && hour < 18) {
                salam = "selamat sore";
            } else {
                salam = "selamat malam";
            }

            // Format pesan
            let text = `Halo, ${salam}, saya ${nama} (%0AEmail: ${email})%0A%0ASubjek: ${subjek}%0A%0APesan: ${pesan}`;
            let url = `https://wa.me/${nomor}?text=${text}`;

            window.open(url, "_blank");
        });

        //Countdown
        jQuery(".active_countdown")
            .countdown("2027/01/01", function (event) {
                jQuery(this).html(
                    event.strftime('<span>%D</span> : <span>%H</span> : <span>%M</span> : <span>%S</span>')
                );
            });

        // START Recomanded
        var mixproduct = mixitup('.rec_product_items');
        // END Recomanded
    </script>
</body>

</html>