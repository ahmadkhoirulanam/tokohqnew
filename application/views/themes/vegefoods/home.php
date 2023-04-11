<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<body class="goto-here">
	<div class="py-1 bg-primary">
		<div class="container">
			<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
				<div class="col-lg-12 d-block">
					<div class="row d-flex">
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
							<span class="text"><?php echo get_settings('store_phone_number'); ?></span>
						</div>
						<div class="col-md pr-4 d-flex topper align-items-center">
							<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
							<span class="text"><?php echo get_settings('store_email'); ?></span>
						</div>
						<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<span class="text"><?php echo get_settings('store_tagline'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><?php echo get_store_name(); ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a href="<?php echo base_url(); ?>" class="nav-link">Home</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori Produk</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
						<?php foreach ($categories as $category) : ?>
							<a class="dropdown-item" href="<?php echo site_url('shop/productkategori/'. $category->id); ?>"><?php echo $category->name; ?></a>
						<?php endforeach; ?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Belanja</a>
						<div class="dropdown-menu" aria-labelledby="dropdown04">
							<a class="dropdown-item" href="<?php echo site_url('shop/cart'); ?>">Keranjang Belanja</a>
							<a class="dropdown-item" href="<?php echo site_url('customer/payments/confirm'); ?>">Konfirmasi Pembayaran</a>

						</div>
					</li>
					<li class="nav-item"><a href="<?php echo site_url('pages/about'); ?>" class="nav-link">Tentang</a></li>
					<li class="nav-item"><a href="<?php echo site_url('pages/contact'); ?>" class="nav-link">Kontak</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
						<div class="dropdown-menu" aria-labelledby="dropdown05">
							<?php if (is_login() && is_customer()) : ?>
								<a class="dropdown-item" href="<?php echo site_url('customer'); ?>">Akun saya</a>
								<a class="dropdown-item" href="<?php echo site_url('customer/orders'); ?>">Order</a>
								<div class="divider"></div>
								<a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">Logout</a>
							<?php else : ?>
								<a class="dropdown-item" href="<?php echo site_url('auth/login'); ?>">Login</a>
								<a class="dropdown-item" href="<?php echo site_url('auth/register'); ?>">Daftar</a>
							<?php endif; ?>
						</div>
					</li>
					<li class="nav-item cta cta-colored"><a href="<?php echo site_url('shop/cart'); ?>" class="nav-link"><span class="icon-shopping_cart"></span>[<span class="cart-item-total">0</span>]</a></li>

				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(<?php echo get_theme_uri('images/dp1.jpg'); ?>);">
        
       <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-12"></h1>
            <h2 class="subheading mb-4"></h2>
            <p><a href="#products" class="btn btn-primary">Belanja Yuk !</a></p>
          </div>

        </div>
      </div>


    </div>

    <div class="slider-item" style="background-image: url(<?php echo get_theme_uri('images/dp2.jpg'); ?>);">
      
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-sm-12 ftco-animate text-center">
            <h1 class="mb-12"></h1>
            <h2 class="subheading mb-4"></h2>
            <p><a href="#products" class="btn btn-primary">Belanja Yuk !</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>




  <section class="ftco-section">
  <div class="container">
          <div class="row justify-content-center mb-3 pb-3">
    <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Produk Terbaru</span>
      <h2 class="mb-4"><?php echo get_store_name(); ?></h2>
      <p><?php echo get_settings('store_tagline'); ?></p>
    </div>
  </div>   		
  </div>
  <div class="container">
      <div class="row">
          <?php if ( count($products) > 0) : ?>
            <?php foreach ($products as $product) : ?>
          <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="product">
                  <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="img-prod">
                      <img class="img-fluid" src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>" alt="<?php echo $product->name; ?>">
                      <?php if ($product->current_discount > 0) : ?>
                        <span class="status"><?php echo count_percent_discount($product->current_discount, $product->price, 0); ?>%</span>
                      <?php endif; ?>
                      <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                      <h3><a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>"><?php echo $product->name; ?></a></h3>
                      <div class="d-flex">
                          <div class="pricing">
                              <p class="price">
                                  <?php if ($product->current_discount > 0) : ?>
                                  <span class="mr-2 price-dc">Rp <?php echo format_rupiah($product->price); ?></span><span class="price-sale">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?></span>
                                  <?php else : ?>
                                    <span class="mr-2"><span class="price-sale">Rp <?php echo format_rupiah($product->price - $product->current_discount); ?></span>
                                  <?php endif; ?>
                                </p>
                          </div>
                      </div>
                      <div class="bottom-area d-flex px-3">
                          <div class="m-auto d-flex">
                              <a href="<?php echo site_url('shop/product/'. $product->id .'/'. $product->sku .'/'); ?>" class="buy-now d-flex justify-content-center align-items-center text-center">
                                  <span><i class="ion-ios-menu"></i></span>
                              </a>
                              <a href="#" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1" data-sku="<?php echo $product->sku; ?>" data-name="<?php echo $product->name; ?>" data-price="<?php echo ($product->current_discount > 0) ? ($product->price - $product->current_discount) : $product->price; ?>" data-id="<?php echo $product->id; ?>">
                                  <span><i class="ion-ios-cart"></i></span>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <?php endforeach; ?>
          <?php else : ?>
          <?php endif; ?>

      </div>
  </div>
</section>


<section class="ftco-section testimony-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4">Apa yang pelanggan kami katakan?</h2>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel">
            <?php if ( count($reviews) > 0) : ?>
            <?php foreach ($reviews as $review) : ?>
            <div class="item">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-5" style="background-image: url(<?php echo base_url('assets/uploads/users/'. $review->profile_picture); ?>)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text text-center">
                  <p class="mb-5 pl-4 line"><?php echo $review->review_text; ?></p>
                  <p class="name"><?php echo $review->name; ?></p>
                  <span class="position"><?php echo get_formatted_date($review->review_date); ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </section>