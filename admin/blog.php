<?php


$title = "InterfineArt Admin | Blogs";
$extra_heading 
      = '<!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>';
        
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







		<div class="task_all_viewer_container">

			<h2 style="color: #009688" class="all_r_task_header">Blogs</h2>

			<div class="homepage_mid_container">


				<div class="notification_section">

					<div class="upside_down_cat_form">

                        <form class="onchers_common_form user_blog_upload_blog_option" method="post" enctype="multipart/form-data"  action="forms/add_new_blog.php">
            
                            <div class="onchers_form_item_container userf_form_left">
                                <div class="onchers_form_item_picture">
                                    <img id="student_profile_pic_form" class="onchers_game_data_form_iamge" src="assets/image_not_inputed.jpg">
                                    <input type="file" "image="" png,="" image="" gif,="" jpeg,="" gif"="" name="fileToUpload" id="student_profile_input" onchange="loadFile(event)" style="display: none;" required="">
                                    <label class="image_input_label" for="student_profile_input" style="cursor: pointer;">Upload</label>
                                </div>
                            </div>

                            <div class="userf_form_right">
                                <div class="onchers_form_item_container">
                                    <label class="onchers_common_form_label" style="margin-top: 0;">Blog Heading</label>
                                    <input class="onchers_common_form_input" name="data1" type="text" placeholder="Headline of the blog" minlength="3" required>
                                </div>
                                <br>

                                <textarea name="data2" id="editor1"></textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editor1'), {
                                            toolbar: [
                                                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 
                                                'insertTable', 'mediaEmbed', 'alignment', '|', 'undo', 'redo'
                                            ],
                                            alignment: {
                                                options: [ 'left', 'right', 'center', 'justify' ]
                                            },
                                            mediaEmbed: {
                                                previewsInData: true
                                            }
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });

                                        
                                </script>



                                <div class="onchers_form_item_container" style="text-align: right;">
                                    <input class="onchers_common_form_button" type="submit" value="UPLOAD">
                                </div>
                            </div>
                        </form>


					</div>


				</div>



			</div>

		</div>



        
        <?php
            $x = 1;
            echo 
            '
            <h2 class="imoportant_link_header">Blogs</h2>
                <div class="blog_items_keepers">';

                $x = 1;
                while(isset($homepage["blog" . $x])){
                    
                    echo 
                        '
                            <div class="blog_container_item_keeper"  style="position: relative;">
                                <div class="blog_container_item">
                                    <div class="blog_container_i_left" style="background-image: url(\'../assets/blogs/'. $homepage["blog" . $x]["data3"] .'\');">
                                    </div>
                                    <div class="blog_container_i_right">
                                        <h2 class="blog_container_heading">'. $homepage["blog" . $x]["data1"] .'</h2>
                                        <p class="blog_container_date">'. date("j M, Y",strtotime($homepage["blog" . $x]["data4"])) .'</p>
                                        <div class="blog_container_p">'. $homepage["blog" . $x]["data2"] .'</div>
                                        <a class="blog_item_anchor" href="../blog?id=blog'. $x .'">Read More <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>



                                <form method="post" action="forms/delete_blogs.php">
                                    <input type="hidden" name="tagToDelete" value="blog' . $x .'">
                                    <button onClick="return confirmSubmitWithPopup(this, \'Do you really want to delete the blog no '. $x .' ?\')" type="submit" class="all_member_active_rec_btn amarcb_round">
                                        <span class="material-icons" style="color: #ff0057;">delete_forever</span>
                                        <p>Delete</p>
                                    </button>
                                </form>
                            </div>';
                    
                    $x++;
                }
                

            echo '</div>';
        ?>







	</div>

</div>

<script src="library/students_new.js"></script>

<?php require 'admin_server_files/admin_footer.php'; ?>
