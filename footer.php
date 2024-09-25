      <div id="follow_us" class="follow_social_media">
          <h2 class="follow_us_header">Follow Us On</h2>
          <div class="follow_us_item_contianer">
              <a class="follow_us_item" href="https://www.facebook.com/profile.php?id=61565897744373"><img
                      src="assets/social/facebook.svg.webp"
                      alt="InterFineArt | Follow us on Facebook: @ModernAfroCaribbeanArt"></a>
              <a class="follow_us_item"
                  href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQHm63xuIB4NhwAAAZIlg4QIpWcpP1Vl4eUZTnsTgd0lK4vDYBpjdh9X2MIF7Palt2aaP7HhssMfke5buWiH5CsPRKOF4oUZQQxj6B8sz_b9Ab-iNEVU7IaQIpYwvvWPxiYhU80=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fin%2Fgurpreet-virdi-arek-property-management-428b61327"><img
                      src="assets/social/linkedin.png" alt="InterFineArt | Follow us on Linkedin: @blackeritaj"></a>
              <!-- <a class="follow_us_item" href="https://tiktok.com/Blackeritaj"><img src="assets/social/tiktok.svg" alt="InterFineArt | Follow us on Tiktok: Blackeritaj"></a>
                <a class="follow_us_item" href="https://x.com/blackeritaj"><img src="assets/social/x.svg.png" alt="InterFineArt | Follow us on X: @blackeritaj"></a>
                <a class="follow_us_item" href="https://www.pinterest.com/blackeritaj"><img src="assets/social/pinterest.svg.png" alt="InterFineArt | Follow us on Pinterest: @blackeritaj"></a> -->
          </div>

      </div>


      <footer class="footer">
          <div id="contact_us" class="footer_item">
              <h2 class="footer_item_heading">Find Us</h2>
              <div class="footer_item_contents_keeper">
                  <p class="footer_item_content_heading">Address</p>
                  <a class="footer_item_content_anchor" target="_blank"
                      href="https://maps.app.goo.gl/cVyEz7xeiRaMBzvc6">6919 W Broward Blvd Suite 313 Plantation, FL
                      33317</a>
                  <p class="footer_item_content_space"></p>
                  <p class="footer_item_content_heading">Phone</p>
                  <a class="footer_item_content_anchor" href="tel:+19543241022">954-324-1022</a>
                  <p class="footer_item_content_space"></p>
                  <p class="footer_item_content_heading">Email</p>
                  <a class="footer_item_content_anchor"
                      href="mailto:jacompas@interfineart.com">jacompas@interfineart.com</a>
              </div>
          </div>

          <div class="footer_item">
              <h2 class="footer_item_heading footer_contact_heading">Contact Us</h2>
              <div class="footer_content_form">
                  <div class="input_fields_keeper_member_l">
                      <input id="fullname_input" class="input_items_member_l" name="user_fullname" type="text"
                          placeholder="" required>
                      <label for="fullname_input" class="input_labels_member_l">Full Name</label>
                  </div>
                  <p id="fullname_warning" style="margin-bottom: 6px;" class="warning_message_member_l"></p>



                  <div class="input_fields_keeper_member_l">
                      <input id="email_input" class="input_items_member_l" name="user_email" type="text" placeholder=""
                          required>
                      <label for="email_input" class="input_labels_member_l">Email</label>
                  </div>
                  <p id="email_warning" style="margin-bottom: 6px;" class="warning_message_member_l"></p>



                  <div class="input_fields_keeper_member_l">
                      <textarea id="user_message" class="input_items_member_l" name="user_message" type="text"
                          placeholder="" required style="resize: vertical;"></textarea>
                      <label for="user_message" class="input_labels_member_l">Message</label>
                  </div>
                  <p id="user_message_warning" style="margin-bottom: 6px;" class="warning_message_member_l"></p>

                  <button class="footer_submit_btn" onclick="submit_contact_us(this)">Submit</button>
              </div>
          </div>

          <script>
          // Contact US Form
          const email_input = document.getElementById("email_input");
          const fullname_input = document.getElementById("fullname_input");
          const user_message = document.getElementById("user_message");
          const fullname_warning = document.getElementById("fullname_warning");
          const email_warning = document.getElementById("email_warning");
          const user_message_warning = document.getElementById("user_message_warning");


          function submit_contact_us(btnClicked) {

              const email = email_input.value;
              const fullname = fullname_input.value;
              const message = user_message.value;
              fullname_warning.innerHTML = "";
              email_warning.innerHTML = "";
              user_message_warning.innerHTML = "";

              var errorFound = false;

              if (email.length < 3) {
                  email_warning.innerHTML = "Enter a valid email address";
                  errorFound = true;
              }
              if (fullname.length < 3) {
                  fullname_warning.innerHTML = "Enter valid fullname";
                  errorFound = true;
              }
              if (message.length < 3) {
                  user_message_warning.innerHTML = "Please enter your message";
                  errorFound = true;
              }

              if (!errorFound) {
                  btnClicked.disabled = true;
                  btnClicked.innerHTML = `Submitting <i class="fa fa-circle-o-notch fa-spin"></i>`;

                  const data = {
                      fullname: fullname,
                      email: email,
                      message: message,
                  }

                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function() {
                      if (this.readyState == 4 && this.status == 200) {
                          console.log(this.responseText);
                          var data = JSON.parse(this.responseText);

                          if (data.status == "SUCCESS") {
                              btnClicked.innerHTML = "SUBMITTED";
                          } else {
                              user_message_warning.innerHTML = 'Failed. Try Again!';
                              btnClicked.innerHTML = `SUBMIT`;
                              btnClicked.disabled = false;
                          }
                      }

                  }
                  xhttp.open("POST", "apis/api_send_user_message.php", true);
                  xhttp.setRequestHeader("Content-type", "application/json");
                  xhttp.send(JSON.stringify(data));
              }


          }
          </script>


          <div class="footer_item footer_item_extended">
              <h2 class="footer_item_heading">Sitemap</h2>
              <div class="footer_item_contents_keeper">
                  <div class="footer_item_links_container">
                      <a class="footer_item_link" href="index#art_galley">Art galleries</a>
                      <a class="footer_item_link" href="art_curators">Art Curators</a>
                      <a class="footer_item_link" href="blog">Blog</a>
                      <a class="footer_item_link" href="become_artist">Become an Artist</a>
                      <a class="footer_item_link" href="event">Events</a>
                      <a class="footer_item_link" href="http://jaksoley.org/">Foundation</a>
                      <a class="footer_item_link" href="marketplace">Merketplace</a>
                      <a class="footer_item_link" href="podcasts">Podcasts</a>
                      <a class="footer_item_link" href="http://editionsvieuxventcaraibes.com/">Les Éditions Vieux Vent
                          Caraïbes</a>
                      <a class="footer_item_link" href="link">Links</a>
                  </div>
              </div>
          </div>
      </footer>


      <div class="footer_copyright">
          <p class="footer_copyright_txt">The InterfineArt Group &copy; 2024 All rights Reserved.</p>
      </div>

      <div class="wide_container">
          <!-- Wide Container -->

          <!-- Art Gallery Preview Option Starts -->
          <div id="art_galley_pvc" class="art_gallery_picture_viewer_container">
              <div id="art_gallery_pv_inside" class="art_gallery_picture_viewer_inside" style="max-width: 900px;">
                  <img id="art_gallery_picture_viewer" class="art_gallery_picture_viewer" style="max-width: 900px;"
                      src="">
                  <a class="all_view_container_close_btn art_gallery_picture_close_btn" onclick="close_the_preview()"><i
                          class="fa fa-remove"></i></a>
              </div>
          </div>

          <script>
          function open_the_gallery_preview(image) {
              document.getElementById('art_gallery_picture_viewer').src = image;
              document.getElementById('art_galley_pvc').style.display = 'flex';
          }

          function close_the_preview() {
              document.getElementById('art_galley_pvc').style.display = 'none';
          }
          </script>
          <!-- Art Gallery Preview Option Ends -->
          </body>

          </html>