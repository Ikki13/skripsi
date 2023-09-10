@extends('dashboard.layouts.login')
@section('container')

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Tentang</strong>
          </div>
        </div>
      </div>
    </div>


    <div class="site-blocks-cover inner-page" style="background-image: url('asset/images/hero_1.jpg');">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 mx-auto align-self-center">
            <div class=" text-center">
              <h1>TENTANG KAMI</h1>
              <p>Apotek Melati Borong adalah sarana pelayanan kefarmasian tempat dilakukan praktik 
                kefarmasian oleh Apoteker dimana apotek ini menjual obat berdasarkan resep dokter 
                serta memperdagangkan barang medis. Pemilik Apotek Melati Borong ini bernama 
                Sri Hardiyanti, A.Md.Farm lahir di Merauke, 04 Juni 1996. <br> Wanita kelahiran 1996 
                itu membuka <br> Apotek Melati Borong sejak tahun 2022.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="site-section bg-light custom-border-bottom" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-5 ml-5 mr-auto">    
              <div class="site-section-heading pt-3 mb-4">
              <h2 class="text-black">INFORMASI</h2>
            </div>
            <p class="text-black">Alamat</p>
            <p class="text-info"><a href="https://www.google.com/maps?q=apotek+melati+borong&gs_lcrp=EgZjaHJvbWUqBggBEEUYOzIGCAAQRRg5MgYIARBFGDsyBwgCEAAYgAQyBwgDEAAYgAQyBwgEEAAYgAQyBwgFEAAYgAQyBggGEEUYPDIGCAcQRRg80gEIMzYxNmowajeoAgCwAgA&um=1&ie=UTF-8&sa=X&ved=2ahUKEwin_eKurKr_AhUzxDgGHZy4BqAQ_AUoAXoECAEQAw">
              Jl. Borong Raya No.51/95, Batua, Kec. Manggala Kota Makassar
              Sulawesi Selatan 90233.</p>
            <p class="text-black">No Telfon</p>
            <p class="text-info"><a href="https://wa.me/+6287803577666">+62 878-0357-7666</a></p>
            <p class="text-black">Email</p>
            <p class="text-info"><a href="mailto:webmaster@example.com">apotekmelati@gmail.com</a></p>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-5 mr-auto">               
            <div
              class="et_pb_column et_pb_column_2_3 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough et-last-child">
              <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=750&amp;height=400&amp;hl=en&amp;q=Jl. Borong Raya No.51/95, Batua, Kec. Manggala, Kota Makassar, Sulawesi Selatan 90233&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://capcuttemplate.org/">Capcut Templates</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    
    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
            <div class="icon mr-4 align-self-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="40px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
            </svg>
            </div>
            <div class="text">
              <h2>Alamat</h2>
              <p><a href="https://www.google.com/maps?q=apotek+melati+borong&gs_lcrp=EgZjaHJvbWUqBggBEEUYOzIGCAAQRRg5MgYIARBFGDsyBwgCEAAYgAQyBwgDEAAYgAQyBwgEEAAYgAQyBwgFEAAYgAQyBggGEEUYPDIGCAcQRRg80gEIMzYxNmowajeoAgCwAgA&um=1&ie=UTF-8&sa=X&ved=2ahUKEwin_eKurKr_AhUzxDgGHZy4BqAQ_AUoAXoECAEQAw">
              Jl. Borong Raya No.51/95, Batua, Kec. Manggala Kota Makassar
              Sulawesi Selatan 90233</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon mr-4 align-self-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="40px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
            </svg>
            </div>
            <div class="text">
              <h2>No Telfon</h2>
              <p><a href="https://wa.me/+6287803577666">+62 878-0357-7666</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
            <div class="icon mr-4 align-self-start">
            <svg xmlns="http://www.w3.org/2000/svg" width="40px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
            </div>
            <div class="text">
              <h2>Email</h2>
              <p><a href="mailto:webmaster@example.com">apotekmelati@gmail.com</a></p>
            </div>
          </div>          
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
      <div class="container">
      <div
              class="et_pb_column et_pb_column_2_3 et_pb_column_3  et_pb_css_mix_blend_mode_passthrough et-last-child">
              <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=750&amp;height=400&amp;hl=en&amp;q=Jl. Borong Raya No.51/95, Batua, Kec. Manggala, Kota Makassar, Sulawesi Selatan 90233&amp;t=&amp;z=20&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://capcuttemplate.org/">Capcut Templates</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
            </div>
      </div>
    </div>
    

    @endsection