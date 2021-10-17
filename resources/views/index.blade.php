<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Ahmad Figo Alfarqi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="C-Resume a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- css -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css" media="all" />
<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- //Default-JavaScript-File -->

</head>
<body>
<!-- banner -->
	<div class="w3-banner-top" style="--background: url('../images/ban6666.jpg')">
	<div class="agileinfo-dot">
			<div class="w3layouts_menu">
				<nav class="cd-stretchy-nav edit-content">
					<a class="cd-nav-trigger" href="#0"> Menu <span aria-hidden="true"></span> </a>
					<ul>
						<li><a href="#home" class="scroll"><span>Home</span></a></li>
						<li><a href="#about" class="scroll"><span>Tentang Saya</span></a></li>
						<li><a href="#experiences" class="scroll"><span>Pengalaman</span></a></li>
						<li><a href="#skills" class="scroll"><span>Keahlian</span></a></li> 
						<li><a href="#projects" class="scroll"><span>Proyek</span></a></li>
						<li><a href="#contact" class="scroll"><span>Kontak</span></a></li>
					</ul> 
					<span aria-hidden="true" class="stretchy-nav-bg"></span>
				</nav> 
			</div>
		
		<div class="w3-banner-grids" id="home">
			<div class="col-md-6 w3-banner-grid-left">
				<div class="w3-banner-img">
					<img src="image/foto_profil/{{$profils->foto}}" alt="img">
					<h3 class="test">{{$profils->nama}}</h3>
					<p class="test" >{{$profils->pekerjaan}}</p>
				</div>
			</div>
			<div class="col-md-6 w3-banner-grid-right">
			<div class="w3-banner-text">
				<h3>{{$profils->judul_profil}}</h3>
				<p>{{$profils->deskripsi_profil}}</p>
			</div>
				<div class=" w3-right-addres-1">
				<ul class="address">
								<li>
									<ul class="agileits-address-text ">
										<li class="agile-it-adress-left"><b>TANGGAL LAHIR</b></li>
										<li><span>:</span>{{$profils->tanggal_lahir}}</li>
									</ul>
								</li>
								<li>
									<ul class="agileits-address-text">
										<li class="agile-it-adress-left"><b>NO TELEPON</b></li>
										<li><span>:</span>{{$profils->nomor_telepon}}</li>
									</ul>
								</li>
								<li>
									<ul class="agileits-address-text">
										<li class="agile-it-adress-left"><b>ALAMAT</b></li>
										<li><span>:</span>{{$profils->alamat}}</li>
									</ul>
								</li>
								<li>
									<ul class="agileits-address-text">
										<li class="agile-it-adress-left"><b>E-MAIL</b></li>
										<li><span>:</span><a href="mailto:example@mail.com">{{$profils->email}}</a></li>
									</ul>
								</li>
								@foreach($sosial_medias as $sosial_media)
								<li>
									<ul class="agileits-address-text">
										<li class="agile-it-adress-left"><b>{{$sosial_media->jenis_sosial_media}}</b></li>
										<li><span>:</span><a href="{{$sosial_media->url_sosial_media}}" target="_blank"> {{$sosial_media->nama_sosial_media}}</a></li>
									</ul>
								</li>
								@endforeach
							</ul> 

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		</div>
		<div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa  fa-chevron-down"></i>
				</a>
			</div>

	</div>
<!-- banner -->
<!-- /about -->

<div class="w3-about" id="about">
	<div class="container">
		<div class="w3-about-head">
			<h3>Tentang Saya</h3>
		</div>
		<div class="w3-about-grids">
			<?php $i=0 ?>
			@foreach($sosial_medias->tentang_sayas as $tentang_saya)
			<?php  $i++ ?>
			@if($i%2==1)
			<div class=" w3-about-grids1">
				<div class="col-md-6 w3-about-grid-left1">
					<img src="image/image_tentang_saya/{{$tentang_saya->image_tentang_saya}}" alt="img1">
				</div>
				<div class="col-md-6 w3-about-grid-right1">
					<h3>{{$tentang_saya->judul_tentang_saya}}</h3>
					<p>{{$tentang_saya->deskripsi_tentang_saya}}</p>
				<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
			@else
			<div class="w3-about-grids2">
				<div class="col-md-6 w3-about-grid-left2">
					<h3>{{$tentang_saya->judul_tentang_saya}}</h3>
					<p>{{$tentang_saya->deskripsi_tentang_saya}}</p>
				</div>
				<div class="col-md-6 w3-about-grid-right2">
				<img src="image/image_tentang_saya/{{$tentang_saya->image_tentang_saya}}" alt="img1">
		
				</div>
				<div class="clearfix"></div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</div>
</div>
<!-- //about  -->
<!--/ education -->
	<div class="w3-edu-top" id="experiences">
	<div class="container">
		<div class="w3-edu-grids">
			<div class="col-md-6 w3-edu-grid-left">
				<div class="w3-edu-grid-header">
				<h3>Pengalaman</h3>
				</div>
			@foreach($sosial_medias->pengalamans as $pengalaman)
				<div class="col-md-4 w3-edu-info1">
					<h3>{{$pengalaman->tahun_pengalaman}}</h3>
					<h4>{{$pengalaman->pekerjaan_pengalaman}}</h4>
				</div>
			<div class="col-md-6 w3-edu-info2">
				<h3>{{$pengalaman->tempat_pengalaman}}</h3>
					<h4><i class="fa fa-users" aria-hidden="true"></i><span>{{$pengalaman->tempat_pengalaman}}</span></h4>
					<p>{{$pengalaman->deskripsi_pengalaman}}</p>
			</div>
			<div class="clearfix"></div>
			@endforeach
			</div>
			<div class="col-md-6 w3-edu-grid-right">
			<div class="w3-edu-grid-header">
				<h3>Pendidikan</h3>
			</div>
			@foreach($sosial_medias->pendidikans as $pendidikan)
			<div class="col-md-3 w3-edu-info-right1">
				<h3>{{$pendidikan->tahun_pendidikan}}</h3>
			</div>
			<div class="col-md-9 w3-edu-info-right2">
				<h3>{{$pendidikan->tempat_pendidikan}}</h3>
					<h4>{{$pendidikan->jurusan_pendidikan}}</h4>
					<p>{{$pendidikan->deskripsi_pendidikan}}</p>
			</div>
			<div class="clearfix"></div>
			@endforeach
		</div>
		<div class="clearfix"></div>	
	</div>
	</div>
	</div>
<!-- //education -->
<!-- skills -->
<div class="skills" id="skills">
	<div class="container">
	<div class="title-w3ls">
		<h4>Keahlian</h4>
		</div>
		<div class="skills-bar">
		<div class="col-md-12 w3-agile-skills-grid">
			<section class='bar'>
				<section class='wrap'>
					<div class='wrap_right'>
					  <div class='bar_group' max="100">
					  	@foreach($sosial_medias->keahlians as $keahlian)
						<div class='bar_group__bar thin' label='{{$keahlian->nama_keahlian}}' show_values='true' unit ="%" tooltip='true' value='{{$keahlian->nilai_keahlian}}'></div>
						@endforeach
					</div>
					<div class="clearfix"></div>
				</section>
			</section>
		</div>
		
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- //skills -->

<!-- main-content -->
	<div class="main-content">
		<!-- gallery -->
	<div class="gallery" id="projects">
		<div class="w3-gallery-head">
			<h3>Proyek Saya</h3>
		</div>
	<div class="container">
		<div class="gallery_gds">
			  
            <div class="filtr-container " style="padding: 0px; position: relative; height: 858px;">
            	<?php  $i=0 ?>
            	@foreach($sosial_medias->proyeks as $proyek)
            	<?php  $i++ ?>
				<div class="col-md-4 col-ms-6 jm-item first filtr-item" data-category="1, 5" data-sort="Busy streets" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; transition: all 0.5s ease-out 0ms;">
					<div class="jm-item-wrapper">
						<div class="jm-item-image">
							<img src="image/image_proyek/{{$proyek->image_proyek}}" alt="property" />
							<span class="jm-item-overlay"> </span>
							<div class="jm-item-button"><a href="#"  data-toggle="modal" data-target="#myModal{{$i}}">Lihat Detail</a></div>
						</div>	
						
					</div>
				</div>
               <div class="clearfix"> </div>
               @endforeach
            </div>
		</div>
	</div>	
	</div>
	<!--//gallery-->
	</div>
<!-- //main-content -->
					<?php  $i=0 ?>
            	@foreach($sosial_medias->proyeks as $proyek)
            	<?php  $i++ ?> 
<div class="modal fade" id="myModal{{$i}}" tabindex="-1" role="dialog" >
				<div class="modal-dialog">
							<!-- Modal content-->
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
							<div class="w3ls-property-images">
								<img src="images/gal11.jpg" alt="image">
							</div>
					
						<div class="ins-details">
							<div class="ins-name">
								<h3>{{$proyek->judul_proyek}}</h3>
								<p>{{$proyek->deskripsi_proyek}}</p>
								
							</div>
							
						</div>
						<div class="clearfix"></div>			
			     </div>
	</div>
			@endforeach		 
		 					
 <script src="{{asset('js/jquery.filterizr.js')}}"></script>
    
    <!-- Kick off Filterizr -->
    <script type="text/javascript">
        $(function() {
            //Initialize filterizr with default options
            $('.filtr-container').filterizr();
        });
    </script>

<!-- contact -->
	 <div class="contact" id="contact">
	<div class="container">
		<div class="w3ls-heading">
			<h3>Hubungi Saya</h3>
		</div>
			<div class="contact-w3ls">
				<form action="#" method="post">
					<div class="col-md-7 col-sm-7 contact-left agileits-w3layouts">
						<input type="text" name="First Name" placeholder="Name" required="">
						<input type="email"  class="email" name="Email" placeholder="Email" required="">
						<input type="text" name="Number" placeholder="Mobile Number" required="">
						<!-- <input type="text" class="email" name="Last Name" placeholder="Last Name" required=""> -->
					</div> 
					<div class="col-md-5 col-sm-5 contact-right agileits-w3layouts">
						<textarea name="Message" placeholder="Message" required=""></textarea>
						<input type="submit" value="Submit">
					</div>
					<div class="clearfix"> </div> 
				</form>
			</div>  

	</div>
</div>
<!-- //contact -->
<!-- footer -->
	<div class="w3l_footer">
		<div class="container">
			
			<div class="w3ls_footer_grids">
				
				<div class="w3ls_footer_grid">
					<div class="col-md-4 w3ls_footer_grid_left">
						<div class="w3ls_footer_grid_leftl">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
						</div>
						<div class="w3ls_footer_grid_leftr">
							<h4>Lokasi</h4>
							<p>{{$profils->alamat}}</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls_footer_grid_left">
						<div class="w3ls_footer_grid_leftl">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</div>
						<div class="w3ls_footer_grid_leftr">
							<h4>Email</h4>
							<a href="mailto:{{$profils->email}}">{{$profils->email}}</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-4 w3ls_footer_grid_left">
						<div class="w3ls_footer_grid_leftl">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</div>
						<div class="w3ls_footer_grid_leftr">
							<h4>Hubungi Sata</h4>
							<p>{{$profils->nomor_telepon}}</p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="w3l_footer_pos">
			<p>© 2021 Ahmad Figo Alfarqi</p>
		</div>
	</div>
<!-- //footer -->
<script src="{{asset('js/bars.js')}}"></script>
<!-- start-smoth-scrolling -->
<script src="{{asset('js/SmoothScroll.min.js')}}"></script>
<!-- text-effect -->
		<script type="text/javascript" src="{{asset('js/jquery.transit.js')}}"></script> 
		<script type="text/javascript" src="{{asset('js/jquery.textFx.js')}}"></script> 
		<script type="text/javascript">
			$(document).ready(function() {
					$('.test').textFx({
						type: 'fadeIn',
						iChar: 100,
						iAnim: 1000
					});
			});
		</script>
<!-- //text-effect -->
<!-- menu-js --> 	
	<script src="{{asset('js/modernizr.js')}}"></script>	
	<script src="{{asset('js/menu.js')}}"></script>
<!-- //menu-js --> 	


<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>

<script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>


</body>
</html>