<?php

include "includes/header.php";

if(isset($_POST['send_message'])){
    if(!empty($_POST['name'])){
    $name=$_POST['name'];
        if(!empty($_POST['email'])){
            $email=$_POST['email'];
            if(!empty($_POST['message'])){
			$subject=$_POST['subject'];
			$message=$_POST['message'];

			$s_message=$db->prepare("INSERT INTO mesajlar (mesaj_gonderenisim, mesaj_gonderenmail, mesaj_konu, mesaj_aciklama) VALUES (?,?,?,?)");
			$s_message=$s_message->execute(array($name,$email,$subject,$message));
			if($s_message){
				header("location: index.php?durum=yes");
			}
          }
      }
  }
}
?>
<section class="hero-wrap js-fullheight">
	<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
				<div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-center">
				<div class="text text-center">
					<span class="subheading">Hey! I am</span>
					<h1>Sedanur Çevik</h1>
						<h2>I'm a 
							<span
								class="txt-rotate"
								data-period="2000"
								data-rotate='[ "Web Designer.", "Developer.", "Blogger" ]'></span>
						</h2>
				</div>
				</div>
			</div>
		</div>
	</div>
    <div class="mouse">
		<a href="#" class="mouse-icon">
		<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
		</a>
	</div>
</section>

<section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
	<div class="container">
		<div class="row d-flex no-gutters">
			<div class="col-md-6 col-lg-6 d-flex">
				<div class="img-about img d-flex align-items-stretch">
					<div class="overlay"></div>
					<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(images/profil.jpg);"></div>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 pl-md-5 py-5">
				<div class="row justify-content-start pb-3">
				<div class="col-md-12 heading-section ftco-animate">
				<h1 class="big">Hakkımda</h1>
				<h2 class="mb-4">Benim Hakkımda</h2>
				<p style="color:black;">Merhaba.Ben Sedanur ÇEVİK.18 Nisan 1999'da Tokat'ta doğdum.Karabük Üniversitesi bilgisayar mühendisliği bölümünde okuyorum.
			Araştırmaya meraklı, öğrenmeyi seven, kendini geliştirmeye odaklı birisiyim.Hayatım boyunca elimden gelenin en iyisini yapmaya çalıştım ve hâlâ hayallerim 
			için çabalamaya devam ediyorum.Udemy,btk,coursera gibi sitelerde kurslar izleyerek kendimi web ve mobil alanında ilerletiyorum.İlerde mesleğimi severek yapmanın ve insanlığa faydalı olmanın hayalini kuruyorum. </P>
				</div>
			</div>
			<div class="counter-wrap ftco-animate d-flex mt-md-3">
				<div class="text">
					<p class="mb-4">
						<span class="number" data-number="1">1</span>
						<span>Tamamlanan projeler</span>
					</p>
					<p><a href="#" class="btn btn-primary py-3 px-3">CV indir</a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-partner">
	<div class="container">
		<div class="row">
			<div class="col-sm ftco-animate">
				<a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-sm ftco-animate">
				<a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-sm ftco-animate">
				<a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-sm ftco-animate">
				<a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid" alt="Colorlib Template"></a>
			</div>
			<div class="col-sm ftco-animate">
				<a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid" alt="Colorlib Template"></a>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb goto-here" id="resume-section">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<nav id="navi">
					<ul>
						<li><a href="#page-1">Eğitim</a></li>
						<li><a href="#page-3">Beceriler</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-md-9">
				<div id="page-1" class= "page one">
					<h2 class="heading">Eğitim</h2>
					<div class="resume-wrap d-flex ftco-animate">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-ideas"></span>
						</div>
						<div class="text pl-3">
							<span class="date">2018-devam ediyor</span>
							<h2>Bilgisayar Mühendisliği</h2>
							<span class="position">Karabük Üniversitesi</span>
						</div>
					</div>

				<div id="page-3" class= "page three">
					<h2 class="heading">Beceriler</h2>
					<div class="row progress-circle mb-5">
						<div class="col-lg-4 mb-4">
							<div class="bg-white rounded-lg shadow p-4">
								<h2 class="h5 font-weight-bold text-center mb-4">CSS</h2>
								<!-- Progress bar 1 -->
								<div class="progress mx-auto" data-value='10'>
									<span class="progress-left">
										<span class="progress-bar border-primary"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-primary"></span>
									</span>
									<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
									<div class="h2 font-weight-bold">10<sup class="small">%</sup></div>
									</div>
								</div>
								<!-- END -->
							</div>
						</div>

						<div class="col-lg-4 mb-4">
							<div class="bg-white rounded-lg shadow p-4">
								<h2 class="h5 font-weight-bold text-center mb-4">HTML</h2>
									<!-- Progress bar 1 -->
								<div class="progress mx-auto" data-value='10'>
									<span class="progress-left">
										<span class="progress-bar border-primary"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-primary"></span>
									</span>
									<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
									<div class="h2 font-weight-bold">10<sup class="small">%</sup></div>
									</div>
								</div>
								<!-- END -->
							</div>
						</div>

						<div class="col-lg-4 mb-4">
							<div class="bg-white rounded-lg shadow p-4">
							<h2 class="h5 font-weight-bold text-center mb-4">JavaScript</h2>
									<!-- Progress bar 1 -->
								<div class="progress mx-auto" data-value='5'>
									<span class="progress-left">
										<span class="progress-bar border-primary"></span>
									</span>
									<span class="progress-right">
										<span class="progress-bar border-primary"></span>
									</span>
									<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
									<div class="h2 font-weight-bold">5<sup class="small">%</sup></div>
									</div>
								</div>
								<!-- END -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 animate-box">
								<div class="progress-wrap ftco-animate">
									<h3>C / 40%</h3>
									<div class="progress">
										<div class="progress-bar color-1" role="progressbar" aria-valuenow="40"
										aria-valuemin="0" aria-valuemax="100" style="width:40%">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 animate-box">
								<div class="progress-wrap ftco-animate">
									<h3>Python / 15%</h3>
									<div class="progress">
										<div class="progress-bar color-2" role="progressbar" aria-valuenow="15"
										aria-valuemin="0" aria-valuemax="100" style="width:15%">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 animate-box">
								<div class="progress-wrap ftco-animate">
									<h3>Php / 5%</h3>
									<div class="progress">
										<div class="progress-bar color-3" role="progressbar" aria-valuenow="5"
										aria-valuemin="0" aria-valuemax="100" style="width:5%">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 animate-box">
								<div class="progress-wrap ftco-animate">
									<h3>Java / 5%</h3>
									<div class="progress">
										<div class="progress-bar color-4" role="progressbar" aria-valuenow="5"
										aria-valuemin="0" aria-valuemax="100" style="width:5%">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 animate-box">
								<div class="progress-wrap ftco-animate">
								<h3>Bootstrap / 5%</h3>
									<div class="progress">
										<div class="progress-bar color-5" role="progressbar" aria-valuenow="5"
										aria-valuemin="0" aria-valuemax="100" style="width:5%">
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 animate-box">
								<div class="progress-wrap ftco-animate">
									<h3>SEO / 0%</h3>
									<div class="progress">
										<div class="progress-bar color-6" role="progressbar" aria-valuenow="0"
										aria-valuemin="0" aria-valuemax="100" >    
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>

    <section class="ftco-section" id="services-section">
    	<div class="container-fluid px-md-5">
    		<div class="row justify-content-center py-5 mt-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Hizmetler</h1>
            <h2 class="mb-4">Hizmetler</h2>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-analysis"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Web Tasarım</h3>
							</div>
						</a>
					</div>
					<!-- <div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-flasks"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Phtography</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
						</a>
					</div> -->
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-ideas"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Web Geliştirme</h3>
							</div>
						</a>
					</div>

					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-innovation"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Uygulama Geliştirme</h3>
							</div>
						</a>
					</div>
					<!--<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-ux-design"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Branding</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
						</a>
					</div>-->
					<!--<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1 shadow">
							<span class="icon">
								<i class="flaticon-idea"></i>
							</span>
							<div class="desc">
								<h3 class="mb-5">Product Strategy</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
							</div>
						</a>
					</div>-->
				</div>
    	</div>
    </section>
 

    <section class="ftco-section ftco-project" id="projects-section">
    	<div class="container-fluid px-md-0">
    		<div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<h1 class="big big-2">Projeler</h1>
			<h2 class="mb-4">Projelerim</h2>
		  </div>
        </div>
		<div class="row no-gutters" style="margin-left:30px;">
			<div class="col-md-4">
				<div class="project img ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(images/blog.png);">
					<div class="overlay"></div>
					<div class="text text-center p-4">
						<h3><a href="#">Branding &amp; Illustration Design</a></h3>
						<span>Web Tasarım</span>
					</div>
				</div>
			</div>
    	</div>
    </section>

 <!--   <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
    	<div class="container-fluid px-md-5">
				<div class="row d-md-flex align-items-center">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="100">0</strong>
                <span>Awards</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="1200">0</strong>
                <span>Complete Projects</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="1200">0</strong>
                <span>Happy Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 shadow">
              <div class="text">
                <strong class="number" data-number="500">0</strong>
                <span>Cups of coffee</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
	<div class="container">
	<div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
		<h1 class="big big-2">İletişim</h1>
		<h2 class="mb-4">İletişim</h2>
		</div>
	</div>

	<div class="row d-flex contact-info mb-5">
		<div class="col-md-6 col-lg-3 d-flex ftco-animate">
		<div class="align-self-stretch box text-center p-4 shadow">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="icon-map-signs"></span>
			</div>
			<div>
				<h3 class="mb-4">Adres</h3>
				<p>Tokat/Merkez</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 d-flex ftco-animate">
		<div class="align-self-stretch box text-center p-4 shadow">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="icon-phone2"></span>
			</div>
			<div>
				<h3 class="mb-4">İletişim Numarası</h3>
				<p>0545 270 65 69</p>
			</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 d-flex ftco-animate">
		<div class="align-self-stretch box text-center p-4 shadow">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="icon-paper-plane"></span>
			</div>
			<div>
				<h3 class="mb-4">E-mail</h3>
				<p><a href="mailto:sdnrcvk@gmail.com">sdnrcvk@gmail.com</a></p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 d-flex ftco-animate">
		<div class="align-self-stretch box text-center p-4 shadow">
			<div class="icon d-flex align-items-center justify-content-center">
				<span class="icon-globe"></span>
			</div>
			<div>
				<h3 class="mb-4">Website</h3>
				<p><a href="kodlayanmuhendis.com"></a>kodlayanmuhendis.com</p>
			</div>
			</div>
		</div>
	</div>
	<?php 

if (isset($_GET['durum'])){
			
  $durum=$_GET['durum'];

	if($durum=="yes"){ ?>
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<i class="icon fas fa-check"></i>
   Mesajınız başarıyla gönderilmiştir!
</div>
<?php }
} ?>
	<div class="row no-gutters block-9">
		<div class="col-md-6 order-md-last d-flex">
		<form action="#" method="post" class="bg-light p-4 p-md-5 contact-form">
			<div class="form-group">
			<input type="text" class="form-control"  name="name" placeholder="Your Name" required>
			</div>
			<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="Your Email" required>
			</div>
			<div class="form-group">
			<input type="text" class="form-control" name ="subject" placeholder="Subject" >
			</div>
			<div class="form-group">
			<textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
			</div>
			<div class="form-group">
			<input type="submit" value="Send Message" name="send_message" class="btn btn-primary py-3 px-5">
			</div>
		</form>
		
		</div>

		<div class="col-md-6 d-flex">
		<div class="img" style="background-image: url(images/computer.jpg);"></div>
		</div>
	</div>
	</div>
</section>
	
<?php 
   include "includes/footer.php";
?>
