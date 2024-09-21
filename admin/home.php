<?php


$title = "InterfineArt | Administration Home";
include 'admin_server_files/admin_header.php';

$sql = 'SELECT * FROM homepage;';
$result = $conn->query($sql);

$homepage = array();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$homepage[$row["tag"]] = array(
			"data1" => $row["data1"],
			"data2" => $row["data2"],
			"data3" => $row["data3"],
			"data4" => $row["data4"],
			"data5" => $row["data5"],
		);
	}
}
    

?>




<div class="admin_middle_box_conatiner">



	<div class="admin_middle_box_conatiner">






	<h2 class="all_r_task_header">Homepage</h2>

	<!-- Welcome Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Welcome Text</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div>
					<h1 class="welcome_text"><?php echo $homepage["welcome_text"]["data1"]; ?></h1>
				</div>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_welcome_text_function(`<?php echo $homepage["welcome_text"]["data1"]; ?>`), '10%', '250px');">Update</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Overview Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Overview Section</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div id="management" class="section_image_and_text">
					<img class="section_image" src="../assets/official/<?php echo $homepage["overview"]["data1"]; ?>">

					<div class="section_texts_keeper">
						<h1 class="section_heading"><?php echo $homepage["overview"]["data2"]; ?></h1>
						<p class="section_desc"><?php echo $homepage["overview"]["data3"]; ?></p>
					</div>
				</div>


				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_overview_section(`<?php echo $homepage["overview"]["data1"]; ?>`, `<?php echo $homepage["overview"]["data2"]; ?>`, `<?php echo $homepage["overview"]["data3"]; ?>`), '10%', '250px');">Update</p>
				</div>
			</div>
		</div>
	</div>


	<!-- Explore Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Explore Section</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div class="interfineart_ach_img_keeper">
					<h2 class="inf_ach_img_text_left"><?php echo $homepage["explore"]["data1"]; ?></h2>
					<img class="interfineart_ach_img" src="../assets/official/<?php echo $homepage["explore"]["data3"]; ?>" alt="<?php echo $homepage["explore"]["data4"]; ?>">
					<h2 class="inf_ach_img_text_right"><?php echo $homepage["explore"]["data2"]; ?></h2>
				</div>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_explore_section(`<?php echo $homepage["explore"]["data1"]; ?>`, `<?php echo $homepage["explore"]["data2"]; ?>`, `<?php echo $homepage["explore"]["data3"]; ?>`, `<?php echo $homepage["explore"]["data4"]; ?>`), '10%', '250px');">Update</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Slider Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Main Slider</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div class="owl-carousel owl-theme myclass">
					<?php
						$x = 1;
						while(isset($homepage["slider_item" . $x])){
							echo 
							'<div class="slider_item" style="background-image: url(\'../assets/'. $homepage["slider_item" . $x]["data1"] .'\'); position: relative;">
								<h2 class="slider_item_head">'. $homepage["slider_item" . $x]["data2"] .'</h2>
								<p class="slider_item_desc">'. $homepage["slider_item" . $x]["data3"] .'</p>
								<a href="'. $homepage["slider_item" . $x]["data5"] .'" class="slider_item_btn">'. $homepage["slider_item" . $x]["data4"] .'</a>

								<form method="post" action="forms/delete_slider_item.php">
									<input type="hidden" name="tagToDelete" value="slider_item' . $x .'">
									<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the slider no '. $x .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
										<span class="material-icons" style="color: #ff0057;">delete_forever</span>
										<p>Delete</p>
									</button>
								</form>
							</div>';
							$x++;
						}
					?>
				</div>

				<script>
					$(document).ready(function(){
						$(".myclass").owlCarousel({
							loop:true,
							autoplay:false,
							autoplayTimeout:2500,
							autoplayHoverPause:true,
							nav:true,
							navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
							navClass: ['owl_prev', 'owl_next'],
							responsive:{
								0:{
									items:1,
								},
							}
						});
					});
				</script>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', add_new_slider_function(), '10%', '250px');">Add New</p>
				</div>
			</div>
		</div>
	</div>


	<!-- Artist Statement Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Artist Statement</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div class="artist_statement_container">
					<img class="artist_statement_signature" src="../assets/official/<?php echo $homepage["section_artist"]["data3"]; ?>" alt="<?php echo $homepage["section_artist"]["data4"]; ?>">
					<p class="artist_statement_heading"><?php echo $homepage["section_artist"]["data1"]; ?></p>
					<p class="artist_statement_border_bottom"></p>
					<p class="artist_statement_description"><?php echo $homepage["section_artist"]["data2"]; ?></p>
				</div>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_artist_statement(`<?php echo $homepage["section_artist"]["data1"]; ?>`, `<?php echo $homepage["section_artist"]["data2"]; ?>`, `<?php echo $homepage["section_artist"]["data3"]; ?>`, `<?php echo $homepage["section_artist"]["data4"]; ?>`), '10%', '250px');">Update</p>
				</div>
			</div>
		</div>
	</div>


	<!-- Artist Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Artists</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div id="artists" class="artists_container">
					<div class="artist_container_heading">
						<p class="artist_statement_heading"><?php echo $homepage["section_artist_slider_meta"]["data1"]; ?></p>
						<p class="artist_statement_border_bottom"></p>
					</div>

					<div class="owl-carousel owl-theme my-owl">
						<?php
							$x = 1;
							while(isset($homepage["artist_slider_item" . $x])){
								echo 
								'<div class="artist_item" style="position:relative;">
									<div class="artist_item_inside">
										<div class="artist_item_inside_img">
											<img class="artist_item_img" src="../assets/artists/'. $homepage["artist_slider_item" . $x]["data2"] .'" alt="'. $homepage["artist_slider_item" . $x]["data3"] .'">
										</div>
										<p class="artist_name">'. $homepage["artist_slider_item" . $x]["data1"] .'</p>
									</div>


									<form method="post" action="forms/delete_artist_item.php">
										<input type="hidden" name="tagToDelete" value="artist_slider_item' . $x .'">
										<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the artist '. $homepage["artist_slider_item" . $x]["data1"] .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
											<span class="material-icons" style="color: #ff0057;">delete_forever</span>
											<p>Delete</p>
										</button>
									</form>
								</div>';
								$x++;
							}
						?>
					</div>

					<div class="become_artist_keeper">
						<a href="../<?php echo $homepage["section_artist_slider_meta"]["data3"]; ?>" class="become_artist_btn"><?php echo $homepage["section_artist_slider_meta"]["data2"]; ?></a>
					</div>
				</div>

				<script>
					$(document).ready(function(){
						$(".my-owl").owlCarousel({
							loop:true,
							autoplay:true,
							autoplayTimeout:2500,
							autoplayHoverPause:true,
							nav:false,
							navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
							navClass: ['owl_prev', 'owl_next'],
							responsiveClass:true,
							responsive:{
								0:{
									items:2,
									nav:false
								},
								500:{
									items:3,
								},
								700:{
									items:4,
								},
								1200:{
									items:5,
								},
							}
						});
					});
				</script>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_artist_section(`<?php echo $homepage["section_artist_slider_meta"]["data1"]; ?>`, `<?php echo $homepage["section_artist_slider_meta"]["data2"]; ?>`, `<?php echo $homepage["section_artist_slider_meta"]["data3"]; ?>`), '10%', '250px');">Update Section</p>
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', add_new_artist_slider_item(), '10%', '250px');">Add New</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Music Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Music Section</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div id="music" class="music_section">
					<div class="artist_container_heading">
						<p class="artist_statement_heading modern_afro_c_music"><?php echo $homepage["section_modern_music_meta"]["data1"]; ?></p>
						<p class="artist_statement_border_bottom"></p>
					</div>

					<div id="audio-container">
						<audio id="audio-player" controls>
							<source id="audio-source" src="" type="audio/mpeg">
							Your browser does not support the audio element.
						</audio>
					</div>


					<div class="music_items_container">
						<?php
							$x = 1;
							while(isset($homepage["modern_music_item" . $x])){
								echo 
								'<div class="music_item">
									<div class="music_item_img_keeper">
										<img class="music_item_img" src="../assets/music/'. $homepage["modern_music_item" . $x]["data2"] .'" alt="'. $homepage["modern_music_item" . $x]["data3"] .'">
										<span class="material-icons music_note_icon">music_note</span>

										<form method="post" action="forms/delete_music_item.php">
											<input type="hidden" name="tagToDelete" value="modern_music_item' . $x .'">
											<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the music no '. $x .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
												<span class="material-icons delete_icons" style="color: #ff0057;">delete_forever</span>
												<p>Delete</p>
											</button>
										</form>
									</div>

									<div class="music_item_btns_container">
										<button class="music_item_btn" onclick="pauseMusic(this)"><span class="material-icons">pause</span></button>
										<button class="music_item_btn music_play_btn" onclick="playMusic(`../assets/music_raw_files/'. $homepage["modern_music_item" . $x]["data1"] .'`, this)"><span class="material-icons">play_arrow</span></button>
										<button class="music_item_btn" onclick="restartMusic(this)"><span class="material-icons">replay</span></button>
									</div>

                    				<a class="spotify_keeper" href="'. $homepage["modern_music_item" . $x]["data3"] .'"> <img src="../assets/official/spotify.png"></a>
									<a class="spotify_keeper" href="'. $homepage["modern_music_item" . $x]["data4"] .'"> <img style="border:none;" src="../assets/official/itunes.png"></a>
								</div>';
								$x++;
							}
						?>
					</div>

					<div class="become_artist_keeper music_become_btn_keeper">
						<a href="../<?php echo $homepage["section_modern_music_meta"]["data3"]; ?>" class="become_artist_btn"><?php echo $homepage["section_modern_music_meta"]["data2"]; ?></a>
					</div>
				</div>

				<script>
					// Music Player Script 
					const audioContainer = document.getElementById('audio-container');
					const audioPlayer = document.getElementById('audio-player');
					const audioSource = document.getElementById('audio-source');

					function resetMusicNoteIcons(){
						const all_music_note_icons = document.getElementsByClassName('music_note_icon');
						for(let x = 0; x < all_music_note_icons.length; x++){
							all_music_note_icons[x].className = 'material-icons music_note_icon';
						}
					}

					var musicLoaded = '';

					function playMusic(musicSource, btnClicked){

					
						
						if(musicLoaded == musicSource){
							audioPlayer.play();
						}else{
							musicLoaded = musicSource;
							audioSource.src = musicSource;
							audioPlayer.load();
							audioPlayer.play();
						}
						
						


						
						resetMusicNoteIcons();
						const musicItem = btnClicked.closest('.music_item');
						const musicNoteIcon = musicItem.querySelector('.music_note_icon');
						musicNoteIcon.className = 'material-icons music_note_icon music_playing_icon';
					}

					function pauseMusic(btnClicked) {
						audioPlayer.pause();
						resetMusicNoteIcons();
					}

					function restartMusic(btnClicked) {
						if(musicLoaded!='') audioPlayer.currentTime = 0;
						pauseMusic();
					}


					



					function isAudioPlaying(audio) {
						return !audio.paused && !audio.ended && audio.currentTime > 0;
					}

				</script>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_music_section(`<?php echo $homepage["section_modern_music_meta"]["data1"]; ?>`, `<?php echo $homepage["section_modern_music_meta"]["data2"]; ?>`, `<?php echo $homepage["section_modern_music_meta"]["data3"]; ?>`), '10%', '250px');">Update Section</p>
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', add_new_music(), '10%', '250px');">Add New</p>
				</div>
			</div>
		</div>
	</div>



	<!-- Music Band Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Music Band Section</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div class="music_extra_container">
					<div id="publishing" class="mission_container">
						<a href="<?php echo $homepage["music_band"]["data3"]; ?>"><img class="mission_img" src="../assets/official/<?php echo $homepage["music_band"]["data1"]; ?>" alt="Eritaj All Stars"></a>
						
						<p class="mission_texts" style="margin-bottom: 10px;"><?php echo $homepage["music_band"]["data2"]; ?></p>
					</div>
				</div>


				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_music_band_section(`<?php echo $homepage["music_band"]["data1"]; ?>`, `<?php echo $homepage["music_band"]["data2"]; ?>`, `<?php echo $homepage["music_band"]["data3"]; ?>`), '10%', '250px');">Update</p>
				</div>
			</div>
		</div>


	</div>



	<!-- Publishing Section -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Publishing Section</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
				<div id="publishing" class="mission_container">
					<img class="mission_img" src="../assets/official/<?php echo $homepage["section_mission_meta"]["data1"]; ?>" alt="<?php echo $homepage["section_mission_meta"]["data2"]; ?>">
					<p class="mission_texts"><?php echo $homepage["section_mission_meta"]["data3"]; ?></p>

					<div class="mission_publishing_books">
						<div class="publishing_books_inside">

							<?php
								$x = 1;
								while(isset($homepage["mission_book_item" . $x])){
									echo 
									'<div class="book_item">
										<div class="book_item_inside" style="position: relative;">
											<img class="book_item_img" src="../assets/pdf_cover/'. $homepage["mission_book_item" . $x]["data2"] .'" alt="'. $homepage["mission_book_item" . $x]["data3"] .'">
											
											'. (isset($homepage["mission_book_item" . $x]["data4"]) ? '<p class="book_item_title">'. $homepage["mission_book_item" . $x]["data4"] .'</p>' : '') .'
											'. (isset($homepage["mission_book_item" . $x]["data5"]) ? '<p class="book_release_date">Released on <span>'. date("j M, Y",strtotime($homepage["mission_book_item" . $x]["data5"])) .'</span></p>' : '') .'
											'. (isset($homepage["mission_book_item" . $x]["data1"]) ? '<button class="art_g_button_purchase" onclick="view_pdf(`../assets/pdf_raw_files/'. $homepage["mission_book_item" . $x]["data1"] .'`)">Preview</button>' : '') .'
											'. (isset($homepage["mission_book_item" . $x]["data3"]) ? '<a href="'. $homepage["mission_book_item" . $x]["data3"] .'" target="_blank" class="art_g_button_purchase">Book Url</a>' : '') .'

											<form method="post" action="forms/delete_book_item.php">
												<input type="hidden" name="tagToDelete" value="mission_book_item' . $x .'">
												<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the book no '. $x .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
													<span class="material-icons" style="color: #ff0057;">delete_forever</span>
													<p>Delete</p>
												</button>
											</form>
										</div>
									</div>';
									$x++;
								}
							?>

						</div>
					</div>
				</div>


				<div id="preview_container" class="all_view_container">
					<div class="all_view_container_heading">
						<p class="preview_txt">Preview</p>
						<a class="all_view_container_close_btn" onclick="close_preview()"><i class="fa fa-remove"></i></a>
					</div>
					<div id="preview_viewer"></div>
				</div>

				<script src="https://unpkg.com/pdfobject"></script>
				<script>
					const preview_container = document.getElementById("preview_container");
					const preview_viewer = document.getElementById("preview_viewer");
					function close_preview(){
						preview_container.style.display = "none";
					}

					// PDF Viewer - PDFObject
					function view_pdf(pdf_link){
						preview_container.style.display = "block";
						PDFObject.embed(pdf_link, "#preview_viewer");
					}
				</script>

				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_publishing_section(`<?php echo $homepage["section_mission_meta"]["data1"]; ?>`, `<?php echo $homepage["section_mission_meta"]["data2"]; ?>`, `<?php echo $homepage["section_mission_meta"]["data3"]; ?>`), '10%', '250px');">Update</p>
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', add_new_book(), '10%', '250px');">Add Book</p>
				</div>
			</div>
		</div>
	</div>


	<!-- Art Gallery -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">Art Gallery</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom faq_item_bottom_long">
				<div id="art_galley" class="art_gallery_container">
					<p class="artist_statement_heading">Art Gallery</p>
					<p class="artist_statement_border_bottom"></p>
					<div class="art_galleries">
						<?php
							$x = 1;
							while(isset($homepage["gallery_art" . $x])){
								echo 
								'<div class="art_gallery_item" style="position: relative;">
									<div class="art_g_img" style="background-image: url(\'../assets/artgallery/'. $homepage["gallery_art" . $x]["data4"] .'\');"></div>
									<p class="art_g_name">'. $homepage["gallery_art" . $x]["data1"] .'</p>
									<div class="art_g_price_keeper">
										'. (
											isset($homepage["gallery_art" . $x]["data5"]) ? 
												'<p class="art_g_price" style="color: #e91e63;">Sold</p>' : 
												'<p class="art_g_price">$'. $homepage["gallery_art" . $x]["data2"] .'</p>'. (isset($homepage["gallery_art" . $x]["data3"]) ? '<p class="art_g_price_cancel">$'. $homepage["gallery_art" . $x]["data3"] .'</p>' : '') )
									.'</div>

									<div class="art_g_buttons">
										<button class="art_g_button_purchase" onclick="show_universal_student_modal(\'500px\', \'80%\', update_art_gallery_single_art(`'. $homepage["gallery_art" . $x]["data1"] .'`, `'. $homepage["gallery_art" . $x]["data2"] .'`, `'. $homepage["gallery_art" . $x]["data3"] .'`, `'. $homepage["gallery_art" . $x]["data4"] .'`, `gallery_art'. $x .'`), \'10%\', \'250px\');">Edit</button>
									</div>

									<div class="payment_method_bottom"></div>

									<form method="post" action="forms/delete_art_item.php">
										<input type="hidden" name="tagToDelete" value="gallery_art' . $x .'">
										<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the art '. $homepage["gallery_art" . $x]["data1"] .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round" style="right: 5px;">
											<span class="material-icons" style="color: #ff0057;">delete_forever</span>
											<p>Delete</p>
										</button>
									</form>
								</div>';
								$x++;
							}
						?>
					</div>

					
					<script>
						// PayPal Script
						function resetAllPaypalBtnItems(){
							const all_paypal_btns = document.getElementsByClassName('payment_method_bottom');
							for(let x = 0; x < all_paypal_btns.length; x++){
								all_paypal_btns[x].innerHTML = "";
							}
						}

						function returnPaypalBtnHTML(){
							const strHTML =  
							`
								<div id="paypal_loader">
									<div class="panel">
										<div id="paypal_loading_system">
											<div class="paypal_loading_system">
												<p class="paypal_loading_txt">Loading</p>
												<i class="fa fa-spinner fa-spin"></i>
											</div>
										</div>
										<!-- <div class="overlay hidden"><div class="overlay-content"><img src="css/loading.gif" alt="Processing..."/></div></div> -->

										
										<div class="paypal-panel-body">
											<!-- Display status message -->
											<div id="paymentResponse" class="hidden"></div>
											
											<!-- Set up a container element for the button -->
											<div id="paypal-button-container"></div>
										</div>
									</div>
								</div>`;

							return strHTML;
						}


						var art_name = "";
						var art_price = 0;
						
						function loadPayPal(btnClicked, artName, artPrice){
							art_name = artName + " Art";
							art_price = artPrice;

							resetAllPaypalBtnItems();

							const artGalleryItem = btnClicked.closest('.art_gallery_item');
							const artGalleryPayment = artGalleryItem.querySelector('.payment_method_bottom');
							// artGalleryPayment.innerHTML = returnPaypalBtnHTML();

						}
					</script>

				</div>

				<script>
					function preview_arts(artsLink){
						preview_container.style.display = "block";
						preview_viewer.innerHTML = `<img class="preview_art_image" src="`+ artsLink +`">`;
					}
				</script>

				<div class="common_btn_keeper_update">
					<!-- <p>Update</p> -->
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', add_new_art_for_sell(), '10%', '250px');">Add Art</p>
				</div>
			</div>
		</div>
	</div>


	<!-- GraphXCentral -->
	<div class="faq_item">
		<div class="faq_item_inside" onclick="toggle_faq(this)">
			<div class="faq_item_top">
				<h3 class="faq_question">GraphXCentral Section</h3>
				<p class="faq_item_click"><i class="fa fa-angle-down"></i></p>
			</div>

			<div class="faq_item_bottom">
			<?php
			echo '
            <div id="publishing" class="mission_container">
                <a href="'. $homepage["graphxcentral"]["data3"] .'"><img class="mission_img" src="../assets/official/'. $homepage["graphxcentral"]["data1"] .'" alt="GraphXCentral"></a>
                <div class="become_artist_keeper music_become_btn_keeper jes_keeper">
                    <a href="'. $homepage["graphxcentral"]["data3"] .'" class="become_artist_btn">'. $homepage["graphxcentral"]["data2"] .'</a>
                </div>
                <p class="mission_texts"></p>
            </div>';
			?>


				<div class="common_btn_keeper_update">
					<p class="onchers_common_form_button" onclick="show_universal_student_modal('500px', '80%', update_graphx_central(`<?php echo $homepage["graphxcentral"]["data1"]; ?>`, `<?php echo $homepage["graphxcentral"]["data2"]; ?>`, `<?php echo $homepage["graphxcentral"]["data3"]; ?>`), '10%', '250px');">Update</p>
				</div>
			</div>
		</div>


	</div>
	 


	<script>
		function toggle_faq(clickedItem){
			if(clickedItem.className == "faq_item_inside"){
				clickedItem.className = "faq_item_inside faq_active";
			}else {
				// clickedItem.className = "faq_item_inside";
			}
		}
	</script>
		

	<?php

	// $sql = 'SELECT id, full_name, birthdate, location, tribe, email, application_id, status FROM applications WHERE status = "Under Review" ORDER BY id ASC;';
	// $result = $conn->query($sql);
	// if ($result->num_rows > 0) {
	// 	while($row = $result->fetch_assoc()) {
	// 		// $dateFormatted = date("dS M, Y", strtotime($row["datejoined"]));
	// 		// $billingDateNext = date("dS M, Y", strtotime($row["next_date_of_renewal"]));

	// 		echo '
	// 			<div class="mystd_single_student_container">
	// 				<div class="mystd_single_student_left">
	// 					<!-- <a class="mystd_profile_pic_flag">
	// 						<img class="mystd_student_pic" src="../assets/profile_pic/avatar.svg">
	// 					</a> -->

	// 					<div class="mystd_basic_info">
	// 						<p class="mystd_basic_info_name">'. $row["full_name"] .'</p>
	// 						<p class="mystd_basic_info_bs"><span class="material-icons">event</span> '. $row["birthdate"] .'</p>
	// 						<p class="mystd_basic_info_bs"><span class="material-icons">mail</span> '. $row["email"] .'</p>
	// 						<p></p>
	// 					</div>

	// 					<!--
	// 					<div class="mystd_status_gender">
	// 						<div class="mystd_status_gender_item"></div>

	// 					</div>
	// 					-->


	// 					<div class="mystd_other_info">
	// 						<div class="mystd_other_info_item">
	// 							<span class="material-icons" style="color: #037b9c;">badge</span>
	// 							<p class="mystd_star_count">'. $row["application_id"] .'</p>
	// 							<p class="mystd_star_count_bottom">Application-ID</p>
	// 						</div>
	// 						<div class="mystd_other_info_item">
	// 							<span class="material-icons" style="color: #03A9F4;">location_on</span>
	// 							<p class="mystd_star_count">'. $row["location"] .'</p>
	// 							<p class="mystd_star_count_bottom">Location</p>
	// 						</div>
	// 						<div class="mystd_other_info_item">
	// 							<span class="material-icons" style="color: #FF9800;">dataset</span>
	// 							<p class="mystd_star_count">'. $row["tribe"] .'</p>
	// 							<p class="mystd_star_count_bottom">Tribe</p>
	// 						</div>

	// 					</div>
	// 				</div>

	// 				<div class="mystd_comment_keeper">
						
	// 					<form method="post" action="add_member_update">
	// 						<input type="hidden" name="profile_id" value="'. $row["id"] .'">
	// 						<input type="hidden" name="profile_is_activate" value="N">
	// 						<button  onClick="return confirmSubmitWithPopup(this, \'Do you really want to approve the application of '. $row["full_name"] .' ?\')" type="submit" class="all_member_active_rec_btn">
	// 							<span class="material-icons" style="color: #009688;">verified</span>
	// 							<p>Approve</p>
	// 						</button>
	// 					</form>
						

	// 					<form method="post" action="application_member_delete">
	// 						<input type="hidden" name="profile_id" value="'. $row["id"] .'">
	// 						<button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the application of '. $row["full_name"] .' ?\')" type="submit" class="all_member_active_rec_btn">
	// 							<span class="material-icons" style="color: #ff0057;">delete_forever</span>
	// 							<p>Delete</p>
	// 						</button>
	// 					</form>

	// 				</div>
	// 			</div>
	// 		';
	// 	}
	// }

	?>






	</div>

</div>




<div id="alert_box_window_students" style="display: none;">
	<p id="close_student_alert_box" onclick="closeTheModalStudent()"><span class="material-icons">cancel</span></p>
	<div id="alert_box_inside_students">

	</div>
</div>

<script src="library/students_new.js"></script>


<?php require 'admin_server_files/admin_footer.php'; ?>
