
<title>IHP - Cek Status Tiket</title>
<link href="<?php echo base_url();?>assets/css/cekTiket.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/cekTiket.js"></script>
</head>
<body>
   <div id="wb_header" style="overflow:hidden">
      <div id="header">
         <div class="col-1">
            <div id="wb_Image1" style="display:inline-block;width:50px;height:52px;z-index:0;">
               <img src="<?php echo base_url();?>assets/images/logo.png" id="Image1" alt="">
            </div>
         </div>
         <div class="col-2">
            <div id="wb_headerMenu" style="display:inline-block;width:100%;z-index:1001;" data--800-top="padding-top:4px;padding-bottom:4px;" data-top="padding-top:16px;padding-bottom:16px;">
               <div id="headerMenu" class="headerMenu" style="width:100%;height:auto !important;">
                  <div class="container">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".headerMenu-navbar-collapse">
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                        </button>
                     </div>
                     <div class="headerMenu-navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                           <li class="">
                              <a href="<?php echo base_url();?>depan">Home</a>
                           </li>
                           <li class="">
                              <a href="<?php echo base_url();?>#about">About Us</a>
                           </li>
                           <li class="">
                              <a href="<?php echo base_url();?>#team">Team</a>
                           </li>
                           <li class="">
                              <a href="login">Login</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div id="wb_welcome">
      <form  method="post" action="<?php echo base_url();?><?php echo $url;?>" id="LayoutGrid6">
      <div id="welcome">

        <?php if ($this->session->flashdata('SUCCESS')) { ?>
        <div role="alert" class="alert alert-success">
           <?= $this->session->flashdata('SUCCESS') ?>
        </div>
        <?php } ?>

         <div class="row">
            <div class="col-1">
               <input type="text" id="Editbox1" style="display:block;width:100%;height:42px;z-index:2;" name="id_ticket" value="<?php echo $id_ticket;?>" maxlength="13" spellcheck="false" placeholder="TXXXXXXXXXXXX - Kode Unik Tiket Anda">
   <div class="row">
               <button id="welcomeButton1" type="submit" value=”search” style="display:inline-block;width:172px;height:38px;z-index:3;">Cek Status Tiket</button>
               <button id="welcomeButton1" type="reset" value=”reset” style="display:inline-block;width:172px;height:38px;z-index:3;">Ulangi</button>

            </div>
            </div>
         </div>
      </div>
    </form>
   </div>

   <div id="wb_about">
      <div id="about-divider-top">
         <svg id="bigHalfCircle" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path class="divider-fill" d="M0 100 C40 0 60 0 100 100 Z"/>
         </svg></div>
      <div id="about">
         <div class="row">
            <div class="col-1">
               <div id="wb_servicesCards">
                  <div id="servicesCards">
                     <div class="row">
                        <div class="col-1">
                           <div id="wb_servicesCard1" style="display:flex;width:calc(100% - 20px);z-index:4;">

                                <div id="servicesCard1-card-body">
                                   <div id="servicesCard1-card-item0"><i class="fa fa-envelope-o"></i></div>
                                   <div id="servicesCard1-card-item1">Kode Unik Tiket</div>
                                   <div id="servicesCard1-card-item2">Untuk setiap tiket yang masuk maka dengan segera Helpdesk Team melakukan tanggapan.</div>
                                </div>


                           </div>
                           <div id="wb_servicesCard2" style="display:flex;width:calc(100% - 20px);z-index:5;">
                              <div id="servicesCard2-card-body">
                                 <div id="servicesCard2-card-item0"><i class="fa fa-tachometer"></i></div>
                                 <div id="servicesCard2-card-item1">Great Performance</div>
                                 <div id="servicesCard2-card-item2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis.</div>
                              </div>
                           </div>
                        </div>
                        <div class="col-2">
                           <div id="wb_servicesCard3" style="display:flex;width:calc(100% - 20px);z-index:6;">
                              <div id="servicesCard3-card-body">
                                 <div id="servicesCard3-card-item0"><i class="fa fa-umbrella"></i></div>
                                 <div id="servicesCard3-card-item1">Support</div>
                                 <div id="servicesCard3-card-item2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis.</div>
                              </div>
                           </div>
                           <div id="wb_servicesCard4" style="display:flex;width:calc(100% - 20px);z-index:7;">
                              <div id="servicesCard4-card-body">
                                 <div id="servicesCard4-card-item0"><i class="fa fa-line-chart"></i></div>
                                 <div id="servicesCard4-card-item1">Increase Revenue</div>
                                 <div id="servicesCard4-card-item2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquet quam id dui posuere blandit. Vivamus magna justo, lacinia eget consectetur sed, convallis.</div>
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
   <div id="wb_team">
      <div id="team">
         <div id="wb_teamHeading1" style="display:inline-block;z-index:13;">
            <h1 id="teamHeading1">Team</h1>
         </div>
         <div id="wb_teamHeading2" style="display:inline-block;z-index:14;">
            <h2 id="teamHeading2">Kami selalu ada dan siaga untuk terus mendukung Anda!</h2>
         </div>
      </div>
   </div>
   <div id="wb_teamLayoutGrid">
      <div id="teamLayoutGrid">
         <div class="row">
            <div class="col-1">
               <div id="RollOverText1" style="overflow:hidden;display:inline-block;position:relative;width:131px;height:131px;z-index:15;">
                  <img alt="" class="image" src="<?php echo base_url();?>assets/images/pp2.png">
                  <div class="caption">
                     <div class="title"></div>
                     <p class="description">
                     <a class="link" href="">More information</a>
                  </div>
               </div>
            </div>
            <div class="col-2">
               <div id="RollOverText2" style="overflow:hidden;display:inline-block;position:relative;width:131px;height:131px;z-index:16;">
                  <img alt="" class="image" src="<?php echo base_url();?>assets/images/pp2.png">
                  <div class="caption">
                     <div class="title"></div>
                     <p class="description">
                     <a class="link" href="">More information</a>
                  </div>
               </div>
            </div>
            <div class="col-3">
               <div id="RollOverText3" style="overflow:hidden;display:inline-block;position:relative;width:131px;height:131px;z-index:17;">
                  <img alt="" class="image" src="<?php echo base_url();?>assets/images/pp2.png">
                  <div class="caption">
                     <div class="title"></div>
                     <p class="description">
                     <a class="link" href="">More information</a>
                  </div>
               </div>
            </div>
            <div class="col-4">
               <div id="RollOverText4" style="overflow:hidden;display:inline-block;position:relative;width:131px;height:131px;z-index:18;">
                  <img alt="" class="image" src="<?php echo base_url();?>assets/images/pp2.png">
                  <div class="caption">
                     <div class="title"></div>
                     <p class="description">
                     <a class="link" href="">More information</a>
                  </div>
               </div>
            </div>
            <div class="col-5">
               <div id="RollOverText5" style="overflow:hidden;display:inline-block;position:relative;width:131px;height:131px;z-index:19;">
                  <img alt="" class="image" src="<?php echo base_url();?>assets/images/pp2.png">
                  <div class="caption">
                     <div class="title"></div>
                     <p class="description">
                     <a class="link" href="">More information</a>
                  </div>
               </div>
            </div>
            <div class="col-6">
               <div id="RollOverText6" style="overflow:hidden;display:inline-block;position:relative;width:131px;height:131px;z-index:20;">
                  <img alt="" class="image" src="<?php echo base_url();?>assets/images/pp2.png">
                  <div class="caption">
                     <div class="title"></div>
                     <p class="description">
                     <a class="link" href="">More information</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
    <div id="wb_LayoutGrid9">
      <div id="LayoutGrid9">
         <div class="row">
           <div class="col-1">
              <div id="wb_Breadcrumb1" style="display:inline-block;width:531px;height:37px;z-index:31;vertical-align:top;">
                 <ul id="Breadcrumb1">
                    <li><a href="<?php echo base_url();?>depan">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#team">Team</a></li>
                 </ul>
              </div>
              <div id="wb_Text8">
                 <span style="background-color:#FF9900;color:#FFFFFF;font-family:Arial;font-size:13px;">Copyright © 2019. All Rights Reserved.<br><br>Departemen Solusi Teknologi Informasi - Kantor Pos Bandung 40000</span>
              </div>
           </div>
         </div>
      </div>
   </div>
</body>
</html>
