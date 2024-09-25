<?php 
    require_once 'server_files/connectserver.php'; 

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
    

    $blog_present = false;
    if(isset($_GET['id'])){
        if(strlen($_GET['id'])>4){
            if(isset($homepage[$_GET['id']])){
                $blog_present = true;
                $blog_id = $_GET['id'];
            }
        }
        
    }

    $title = "Arek Property Management | Blogs";
    require_once "server_files/header.php";
    
?>



<div class="important_link_keeper">

        <?php
        if($blog_present){
            echo 
            '<div class="single_blog_container">
                <div class="single_blog_container_inside">
                    <div class="single_blog_img_keeper">
                        <img class="single_blog_img" src="assets/blogs/'. $homepage[$blog_id]["data3"] .'">
                    </div>
    
                    <div>
                    <h2 class="blog_container_heading">'. $homepage[$blog_id]["data1"] .'</h2>
                    <p class="blog_container_date">'. date("j M, Y",strtotime($homepage[$blog_id]["data4"])) .'</p>
                    <div class="blog_container_description">'. $homepage[$blog_id]["data2"] .'</div>
                    </div>
                </div>
            </div>';
        }else{
            $x = 1;
            echo 
            '
            <h2 class="imoportant_link_header">Stay Updated with Our Latest Blogs</h2>
                <div class="blog_items_keepers">';

                $x = 1;
                while(isset($homepage["blog" . $x])){
                    
                    echo 
                        '
                        <div class="blog_container_item_keeper">
                            <div class="blog_container_item">
                                <div class="blog_container_i_left" style="background-image: url(\'assets/blogs/'. $homepage["blog" . $x]["data3"] .'\');">
                                </div>
                                <div class="blog_container_i_right">
                                    <h2 class="blog_container_heading">'. $homepage["blog" . $x]["data1"] .'</h2>
                                    <p class="blog_container_date">'. date("j M, Y",strtotime($homepage["blog" . $x]["data4"])) .'</p>
                                    <div class="blog_container_p">'. $homepage["blog" . $x]["data2"] .'</div>
                                    <a class="blog_item_anchor" href="blog?id=blog'. $x .'">Read More <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>

                        ';
                    
                    $x++;
                }
                

            echo '</div>';
        }
            
        ?>
            
            
           


</div>


<?php
require_once "server_files/footer.php";
?>