 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold" data-aos="fade-up">About Us</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>

        <br>
        <br>
        <br>

        <div class="container " data-aos="fade-up">
            <div class="w3-card w3-rest">
                <iframe width="100%" src="https://maps.google.com/maps?q=Philippines%20Numeriques%20Passerelles&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="height: 500px;">
                </iframe>&nbsp;&nbsp;Google Maps Generator by <a href="https://www.embedgooglemap.net">&nbsp;&nbsp;embedgooglemap.net</a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <section class="page-section">
            <div class="container text-dark">

            <?php echo html_entity_decode($_SESSION['setting_about_content']) ?>        
            
            </div>
        </section>