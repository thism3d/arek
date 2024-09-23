// Sortings Functions
function compareStringsAsc(a, b) {
  a = a.toLowerCase();
  b = b.toLowerCase();
  return (a < b) ? -1 : (a > b) ? 1 : 0;
}

function compareStringsDesc(a, b) {
  a = a.toLowerCase();
  b = b.toLowerCase();
  return (b < a) ? -1 : (b > a) ? 1 : 0;
}

function compareNumberAsc(a, b) {
	return parseFloat(a) - parseFloat(b);
}

function compareNumberDesc(a, b) {
	return parseFloat(b) - parseFloat(a);
}





/* Back Button Configuration */
function goBack () {
    history.back()
}





// Full screen modal initialization
function open_mobile_full_screen_modal ( topbarHTML, bodyHTML = "") {
    
    const modal_mainbox = document.getElementById("all_container_modal");
    const modal_inside = document.getElementById("all_container_modal_inside");
    const modal_topbar = document.getElementById("all_container_modal_topbar");
    
    modal_topbar.innerHTML = topbarHTML;
    modal_inside.innerHTML = bodyHTML;
    modal_mainbox.style.display = "block";
    
}


function close_mobile_full_screen_modal () {
    document.getElementById("all_container_modal").style.display = "none";
}







// Alert box modal initialization
const alert_box_window = document.getElementById("alert_box_window");
const alert_box_inside = document.getElementById("alert_box_inside");

const closeTheModal = () => { alert_box_window.style.display = "none"; };


window.onclick = function(event) {
  if (event.target == alert_box_window) {
    closeTheModal();
  }
}

const show_universal_modal = ( modalWidth, modalHeight, modalHTML) => {
	alert_box_inside.style.maxWidth = modalWidth;
	alert_box_inside.style.maxHeight = modalHeight;
	
	alert_box_inside.innerHTML = modalHTML;
  alert_box_inside.innerHTML += `<p id="close_student_alert_box" onclick="closeTheModal()"><span class="material-icons">close</span></p>`;
  
    
    alert_box_window.style.display = "flex";
}












// Every Page Script

function returnDownloadPDFHTML(){
  const strHTML = `
  <div class="download_pdf_box">
      <div class="download_pdf_box_inside">
          <h2 class="download_pdf_heading">Sign up and down load our Information Package to learn more about our rates</h2>
          <form action="download_pdf.php" method="post">
            <label class="download_pdf_label">Name</label>
            <input name="name" class="download_pdf_input" type="text" required>
            <label class="download_pdf_label">Email</label>
            <input name="email" class="download_pdf_input" type="email" required>
            <div class="download_btn_keeper">
                <button type="submit" class="common_btn_home"><span class="material-icons">download</span> DOWNLOAD</button>
            </div>
          <form>
      </div>
  </div>`;
  return strHTML;
}


function returnMaintenanceRequestHTML(){
  const strHTML = `
  <div class="maintenance_request_box">
      <div class="maintenance_request_box_inside">

          <h2 class="maintenance_heading"><img class="maintenance_img" src="assets/footer/main-icon.png">Maintenance Request</h2>
          <p class="maintenance_tagline">*For maintenance emergencies please call your assigned property manager</p>

          <div>
          <form action="maintenance_request.php" method="post"  enctype="multipart/form-data">
              <label class="download_pdf_label">Tenant Name</label>
              <input name="tenantName" class="download_pdf_input" type="text" required>
              <label class="download_pdf_label">Property Address</label>
              <input name="propertyAddress" class="download_pdf_input" type="text" required>
              <label class="download_pdf_label">Tenant Email</label>
              <input name="tenantEmail" class="download_pdf_input" type="email" required>
              <label class="download_pdf_label">Phone Number</label>
              <input name="phoneNumber" class="download_pdf_input" type="text" required>
              <label class="download_pdf_label">Description of Issue</label>
              <textarea name="descriptionOfIssue" class="download_pdf_input download_pdf_textarea" required></textarea>
              <label class="download_pdf_label">Upload Pictures</label>
              <input type="file" accept="image/png, image/gif, image/jpeg, image/jpg" name="fileToUpload" class="download_pdf_input download_type_file" required>

              <div class="download_btn_keeper">
                  <button type="submit" class="common_btn_home">SEND</button>
              </div>
            <form>
          </div>
      </div>
  </div>`;

  return strHTML;
}




function returnInquireNowHTML(){
  const strHTML = `
  <div class="maintenance_request_box">
      <div class="maintenance_request_box_inside">

          <h2 class="maintenance_heading" style="font-weight: 600; font-size: 28px; margin-bottom: 33px;">Inquire About Management Services</h2>

          <div>
          <form action="inquire_query.php" method="post">
              <label class="download_pdf_label">Name</label>
              <input name="name" class="download_pdf_input" type="text" required>
              <label class="download_pdf_label">Email</label>
              <input name="email" class="download_pdf_input" type="email" required>
              <label class="download_pdf_label">Phone Number</label>
              <input name="phoneNumber" class="download_pdf_input" type="text" required>
              <label class="download_pdf_label">Address</label>
              <input name="address" class="download_pdf_input" type="text" required>
              <label class="download_pdf_label">What Services are you interested in?</label>
              <textarea name="interestedIn" class="download_pdf_input download_pdf_textarea" required></textarea>
              
              <div class="download_btn_keeper">
                  <button type="submit" class="common_btn_home">SEND</button>
              </div>
            <form>
          </div>
      </div>
  </div>`;

  return strHTML;
}



const showDownloadBtn = () => show_universal_modal( '600px', '400px', returnDownloadPDFHTML());

const showMaintenanceBtn = () => show_universal_modal( '600px', '600px', returnMaintenanceRequestHTML());

const showInquireBtn = () => show_universal_modal( '600px', '600px', returnInquireNowHTML());





