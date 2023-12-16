$(".searchBar").on("keyup", function () {
  var value = $(this).val().toLowerCase();
  $("table tbody tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });
});

// $(".edit").each(function() {
//   $(this).on("click", (e) => {
//     e.preventDefault()
//     $(".modal-editResidents").show()
//   })
// })

// $(".closeBtnEdit").on("click", () => {
//   $(".modal-editResidents").hide()
// })

// ! EDIT OFFICIAL
function editOfficial(that) {
  id = $(that).attr("data-id");
  fname = $(that).attr("data-fname");
  mname = $(that).attr("data-mname");
  lname = $(that).attr("data-lname");
  suffix = $(that).attr("data-suffix");
  chair = $(that).attr("data-chair");
  pos = $(that).attr("data-pos");
  start = $(that).attr("data-start");
  end = $(that).attr("data-end");
  status = $(that).attr("data-status");

  $("#official_id").val(id);
  $("#officialName_fname1").val(fname);
  $("#officialName_mname1").val(mname);
  $("#officialName_lname1").val(lname);
  $("#officialName_suffix1").val(suffix);
  $("#chairmanship1").val(chair);
  $("#position1").val(pos);
  $("#term-start1").val(start);
  $("#term-end1").val(end);
  $("#status1").val(status);
}

// ! EDIT RESIDENT
function editResident(that) {
  id = $(that).attr("data-id");
  fname = $(that).attr("data-fname");
  mname = $(that).attr("data-mname");
  lname = $(that).attr("data-lname");
  houseNo = $(that).attr("data-houseNo");
  sex = $(that).attr("data-sex");
  street = $(that).attr("data-street");
  subD = $(that).attr("data-subdivision");
  dbirth = $(that).attr("data-dbirth");
  pbirth = $(that).attr("data-pbirth");
  cstatus = $(that).attr("data-cstatus");
  occu = $(that).attr("data-occupation");
  email = $(that).attr("data-email");
  contact = $(that).attr("data-contactNo");
  vstatus = $(that).attr("data-vstatus");
  citizen = $(that).attr("data-citizenship");
  hholdNo = $(that).attr("data-householdNo");
  osy = $(that).attr("data-osy");
  pwd = $(that).attr("data-pwd");
  ext = $(that).attr("data-ext");

  $("#indetity").prop("disabled", false);

  $("#id").val(id);
  $("#firstname").val(fname);
  $("#middlename").val(mname);
  $("#lastname").val(lname);

  $("#sex").val(sex);
  $("#dob").val(dbirth);
  $("#place-of-birth").val(pbirth);

  $("#house-no").val(houseNo);
  $("#street").val(street);
  $("#subdivision").val(subD);

  $("#civil-status").val(cstatus);
  $("#occupation").val(occu);
  $("#email").val(email);
  $("#contact-no").val(contact);
  $("#voter-status").val(vstatus);
  $("#citizenship").val(citizen);
  $("#household-no").val(hholdNo);
  $("#out-of-school-youth").prop("checked", osy);
  $("#person-with-disability").prop("checked", pwd);
  $("#ext").val(ext);
}

// ! BUSINESS
function editBusiness(that) {
  id = $(that).attr("data-id");
  taxpayer_fname = $(that).attr("data-fname");
  taxpayer_mname = $(that).attr("data-mname");
  taxpayer_lname = $(that).attr("data-lname");
  taxpayer_suffix = $(that).attr("data-suffix");

  business_name = $(that).attr("data-business_name");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");

  business_type = $(that).attr("data-business_type");
  business_status = $(that).attr("data-business_status");
  business_started = $(that).attr("data-business_started");

  $("#business_id").val(id);
  $("#taxPayer_fname").val(taxpayer_fname);
  $("#taxPayer_mname").val(taxpayer_mname);
  $("#taxPayer_lname").val(taxpayer_lname);
  $("#taxPayer_suffix").val(taxpayer_suffix);

  $("#taxPayer_houseNo").val(houseNo);
  $("#taxPayer_street").val(street);
  $("#taxPayer_subdivision").val(subdivision);

  $("#businessType").val(business_type);
  $("#business_name").val(business_name);
  $("#date_started").val(business_started);
  $("#businessStatus").val(business_status);
}

// ! EDIT IDFORM
function editIdForm(that) {
  id = $(that).attr("data-id");
  applicant_fname = $(that).attr("data-applicant_fname");
  applicant_mname = $(that).attr("data-applicant_mname");
  applicant_lname = $(that).attr("data-applicant_lname");
  applicant_suffix = $(that).attr("data-applicant_suffix");

  requestor_fname = $(that).attr("data-requestor_fname");
  requestor_mname = $(that).attr("data-requestor_mname");
  requestor_lname = $(that).attr("data-requestor_lname");
  requestor_suffix = $(that).attr("data-requestor_suffix");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");
  pob = $(that).attr("data-pob");
  dob = $(that).attr("data-dob");
  civil_status = $(that).attr("data-civil_status");
  contact_no = $(that).attr("data-contact_no");
  document_for = $(that).attr("data-document_for");
  purpose = $(that).attr("data-purpose");
  date_requested = $(that).attr("data-date_requested");
  status = $(that).attr("data-status");
  seen = $(that).attr("data-seen");

  $("#idform_id").val(id);
  $("#applicant_fname1").val(applicant_fname);
  $("#applicant_mname1").val(applicant_mname);
  $("#applicant_lname1").val(applicant_lname);
  $("#applicant_suffix1").val(applicant_suffix);

  $("#requestor_fname1").val(requestor_fname);
  $("#requestor_mname1").val(requestor_mname);
  $("#requestor_lname1").val(requestor_lname);
  $("#requestor_suffix1").val(requestor_suffix);

  $("#house_no1").val(house_no);
  $("#street1").val(street);
  $("#subdivision1").val(subdivision);

  $("#place_of_birth1").val(pob);
  $("#birth_date1").val(dob);
  $("#civil_status1").val(civil_status);
  $("#contact_number1").val(contact_no);
  $("#documentFor1").val(document_for);
  $("#purpose1").val(purpose);
  $("#date_requested").val(date_requested);
  $("#status").val(status);
  $("#seen").val(seen);
}

// ! EDIT BRGY CLEARANCE
function editBrgyClearance(that) {
  id = $(that).attr("data-id");
  applicant_fname = $(that).attr("data-applicant_fname");
  applicant_mname = $(that).attr("data-applicant_mname");
  applicant_lname = $(that).attr("data-applicant_lname");
  applicant_suffix = $(that).attr("data-applicant_suffix");

  requestor_fname = $(that).attr("data-requestor_fname");
  requestor_mname = $(that).attr("data-requestor_mname");
  requestor_lname = $(that).attr("data-requestor_lname");
  requestor_suffix = $(that).attr("data-requestor_suffix");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");
  pob = $(that).attr("data-pob");
  dob = $(that).attr("data-dob");
  purpose = $(that).attr("data-purpose");
  date_requested = $(that).attr("data-date_requested");
  status = $(that).attr("data-status");
  seen = $(that).attr("data-seen");

  $("#brgyClearance_id").val(id);
  $("#applicant_fname1").val(applicant_fname);
  $("#applicant_mname1").val(applicant_mname);
  $("#applicant_lname1").val(applicant_lname);
  $("#applicant_suffix1").val(applicant_suffix);

  $("#requestor_fname1").val(requestor_fname);
  $("#requestor_mname1").val(requestor_mname);
  $("#requestor_lname1").val(requestor_lname);
  $("#requestor_suffix1").val(requestor_suffix);

  $("#house_no1").val(house_no);
  $("#street1").val(street);
  $("#subdivision1").val(subdivision);

  $("#place_of_birth1").val(pob);
  $("#birth_date1").val(dob);
  $("#purpose1").val(purpose);
  $("#date_requested").val(date_requested);
  $("#status").val(status);
  $("#seen").val(seen);
}

// ! ENDORSEMENT CERTIFICATE
function editEndorsementCert(that) {
  id = $(that).attr("data-id");
  applicant_fname = $(that).attr("data-applicant_fname");
  applicant_mname = $(that).attr("data-applicant_mname");
  applicant_lname = $(that).attr("data-applicant_lname");
  applicant_suffix = $(that).attr("data-applicant_suffix");

  requestor_fname = $(that).attr("data-requestor_fname");
  requestor_mname = $(that).attr("data-requestor_mname");
  requestor_lname = $(that).attr("data-requestor_lname");
  requestor_suffix = $(that).attr("data-requestor_suffix");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");
  purpose = $(that).attr("data-purpose");
  documentFor = $(that).attr("data-documentFor");
  date_requested = $(that).attr("data-date_requested");
  status = $(that).attr("data-status");
  seen = $(that).attr("data-seen");

  $(".endorsementCert_id").val(id);
  $(".applicant_fname").val(applicant_fname);
  $(".applicant_mname").val(applicant_mname);
  $(".applicant_lname").val(applicant_lname);
  $(".applicant_suffix").val(applicant_suffix);

  $(".requestor_fname").val(requestor_fname);
  $(".requestor_mname").val(requestor_mname);
  $(".requestor_lname").val(requestor_lname);
  $(".requestor_suffix").val(requestor_suffix);

  $(".house_no").val(house_no);
  $(".street").val(street);
  $(".subdivision").val(subdivision);

  $(".purpose").val(purpose);
  $(".documentFor").val(documentFor);
  $(".date_requested").val(date_requested);
  $(".status").val(status);
  $(".seen").val(seen);
}

// ! CERTIFICATE OF INDIGENCY
function editCertOfIndigency(that) {
  id = $(that).attr("data-id");
  applicant_fname = $(that).attr("data-applicant_fname");
  applicant_mname = $(that).attr("data-applicant_mname");
  applicant_lname = $(that).attr("data-applicant_lname");
  applicant_suffix = $(that).attr("data-applicant_suffix");

  requestor_fname = $(that).attr("data-requestor_fname");
  requestor_mname = $(that).attr("data-requestor_mname");
  requestor_lname = $(that).attr("data-requestor_lname");
  requestor_suffix = $(that).attr("data-requestor_suffix");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");
  purpose = $(that).attr("data-purpose");
  documentFor = $(that).attr("data-documentFor");
  date_requested = $(that).attr("data-date_requested");
  status = $(that).attr("data-status");
  seen = $(that).attr("data-seen");

  $(".certOfIndigency_id").val(id);
  $(".applicant_fname").val(applicant_fname);
  $(".applicant_mname").val(applicant_mname);
  $(".applicant_lname").val(applicant_lname);
  $(".applicant_suffix").val(applicant_suffix);

  $(".requestor_fname").val(requestor_fname);
  $(".requestor_mname").val(requestor_mname);
  $(".requestor_lname").val(requestor_lname);
  $(".requestor_suffix").val(requestor_suffix);

  $(".house_no").val(house_no);
  $(".street").val(street);
  $(".subdivision").val(subdivision);

  $(".purpose").val(purpose);
  $(".documentFor").val(documentFor);
  $(".date_requested").val(date_requested);
  $(".status").val(status);
  $(".seen").val(seen);
}

// ! CERTIFICATE OF LBR
function certOfLbr(that) {
  id = $(that).attr("data-id");
  applicant_fname = $(that).attr("data-applicant_fname");
  applicant_mname = $(that).attr("data-applicant_mname");
  applicant_lname = $(that).attr("data-applicant_lname");
  applicant_suffix = $(that).attr("data-applicant_suffix");

  requestor_fname = $(that).attr("data-requestor_fname");
  requestor_mname = $(that).attr("data-requestor_mname");
  requestor_lname = $(that).attr("data-requestor_lname");
  requestor_suffix = $(that).attr("data-requestor_suffix");

  parent_fname = $(that).attr("data-parent_fname");
  parent_mname = $(that).attr("data-parent_mname");
  parent_lname = $(that).attr("data-parent_lname");
  parent_suffix = $(that).attr("data-parent_suffix");

  father_fname = $(that).attr("data-father_fname");
  father_mname = $(that).attr("data-father_mname");
  father_lname = $(that).attr("data-father_lname");
  father_suffix = $(that).attr("data-father_suffix");

  mother_fname = $(that).attr("data-mother_fname");
  mother_mname = $(that).attr("data-mother_mname");
  mother_lname = $(that).attr("data-mother_lname");
  mother_suffix = $(that).attr("data-mother_suffix");

  dob = $(that).attr("data-date_of_birth");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");
  documentFor = $(that).attr("data-documentFor");
  date_requested = $(that).attr("data-date_requested");
  status = $(that).attr("data-status");
  seen = $(that).attr("data-seen");

  $(".certOFlbr_id").val(id);
  $(".applicant_fname").val(applicant_fname);
  $(".applicant_mname").val(applicant_mname);
  $(".applicant_lname").val(applicant_lname);
  $(".applicant_suffix").val(applicant_suffix);

  $(".requestor_fname").val(requestor_fname);
  $(".requestor_mname").val(requestor_mname);
  $(".requestor_lname").val(requestor_lname);
  $(".requestor_suffix").val(requestor_suffix);

  $(".parent_fname").val(parent_fname);
  $(".parent_mname").val(parent_mname);
  $(".parent_lname").val(parent_lname);
  $(".parent_suffix").val(parent_suffix);

  $(".father_fname").val(father_fname);
  $(".father_mname").val(father_mname);
  $(".father_lname").val(father_lname);
  $(".father_suffix").val(father_suffix);

  $(".mother_fname").val(mother_fname);
  $(".mother_mname").val(mother_mname);
  $(".mother_lname").val(mother_lname);
  $(".mother_suffix").val(mother_suffix);

  $(".dob").val(dob);

  $(".house_no").val(house_no);
  $(".street").val(street);
  $(".subdivision").val(subdivision);

  $(".documentFor").val(documentFor);
  $(".date_requested").val(date_requested);
  $(".status").val(status);
  $(".seen").val(seen);
}

// ! EDIT BUSINESS CLEARANCE
function editBusinessClearance(that) {
  id = $(that).attr("data-id");
  business_name = $(that).attr("data-business_name");
  owner_fname = $(that).attr("data-business_owner_fname");
  owner_mname = $(that).attr("data-business_owner_mname");
  owner_lname = $(that).attr("data-business_owner_lname");
  owner_suffix = $(that).attr("data-business_owner_suffix");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");

  documentFor = $(that).attr("data-documentFor");
  dateApplied = $(that).attr("data-date_applied");
  status = $(that).attr("data-status");

  $("#business_id").val(id);
  $("#businessName").val(business_name);
  $("#business_owner_fname").val(owner_fname);
  $("#business_owner_mname").val(owner_mname);
  $("#business_owner_lname").val(owner_lname);
  $("#business_owner_suffix").val(owner_suffix);

  $("#house_no").val(house_no);
  $("#street").val(street);
  $("#subdivision").val(subdivision);

  $("#documentFor").val(documentFor);
  $("#date_applied").val(dateApplied);
  $("#status").val(status);
}

// ! EDIT BUSINESS CLEARANCE
function editBusinessClosure(that) {
  id = $(that).attr("data-id");
  business_name = $(that).attr("data-business_name");
  owner_fname = $(that).attr("data-business_owner_fname");
  owner_mname = $(that).attr("data-business_owner_mname");
  owner_lname = $(that).attr("data-business_owner_lname");
  owner_suffix = $(that).attr("data-business_owner_suffix");

  house_no = $(that).attr("data-house_no");
  street = $(that).attr("data-street");
  subdivision = $(that).attr("data-subdivision");

  documentFor = $(that).attr("data-documentFor");
  dateApplied = $(that).attr("data-date_applied");
  status = $(that).attr("data-status");

  $("#business_id").val(id);
  $("#businessName").val(business_name);
  $("#business_owner_fname").val(owner_fname);
  $("#business_owner_mname").val(owner_mname);
  $("#business_owner_lname").val(owner_lname);
  $("#business_owner_suffix").val(owner_suffix);

  $("#house_no").val(house_no);
  $("#street").val(street);
  $("#subdivision").val(subdivision);

  $("#documentFor").val(documentFor);
  $("#date_applied").val(dateApplied);
  $("#status").val(status);
}

// ! EDIT BLOTTER
function editBlotter(that) {
  id = $(that).attr("data-id");
  complainant_fname = $(that).attr("data-complainant-fname");
  complainant_mname = $(that).attr("data-complainant-mname");
  complainant_lname = $(that).attr("data-complainant-lname");
  complainant_suffix = $(that).attr("data-complainant-suffix");

  respondent_fname = $(that).attr("data-respondent-fname");
  respondent_mname = $(that).attr("data-respondent-mname");
  respondent_lname = $(that).attr("data-respondent-lname");
  respondent_suffix = $(that).attr("data-respondent-suffix");

  victim_fname = $(that).attr("data-victim-fname");
  victim_mname = $(that).attr("data-victim-mname");
  victim_lname = $(that).attr("data-victim-lname");
  victim_suffix = $(that).attr("data-victim-suffix");

  type = $(that).attr("data-type");
  l = $(that).attr("data-location");
  date = $(that).attr("data-date");
  time = $(that).attr("data-time");
  details = $(that).attr("data-details");
  status = $(that).attr("data-status");

  $("#blotter_id").val(id);
  $("#complainant_fname1").val(complainant_fname);
  $("#complainant_mname1").val(complainant_mname);
  $("#complainant_lname1").val(complainant_lname);
  $("#complainant_suffix1").val(complainant_suffix);

  $("#respondent_fname1").val(respondent_fname);
  $("#respondent_mname1").val(respondent_mname);
  $("#respondent_lname1").val(respondent_lname);
  $("#respondent_suffix1").val(respondent_suffix);

  $("#victim_fname1").val(victim_fname);
  $("#victim_mname1").val(victim_mname);
  $("#victim_lname1").val(victim_lname);
  $("#victim_suffix1").val(victim_suffix);

  $("#timeBlotter1").val(time);
  $("#typeBlotter1").val(type);
  $("#locationBlotter1").val(l);
  $("#dateBlotter1").val(date);
  $("#statusBlotter1").val(status);
  $("#detailsBlotter1").val(details);
}

// ! EDIT COMPLAIN
function complainEdit(that) {
  id = $(that).attr("data-id");
  complainant_fname = $(that).attr("data-complainant-fname");
  complainant_mname = $(that).attr("data-complainant-mname");
  complainant_lname = $(that).attr("data-complainant-lname");
  complainant_suffix = $(that).attr("data-complainant-suffix");
  date = $(that).attr("data-date");
  l = $(that).attr("data-location");
  time = $(that).attr("data-time");
  details = $(that).attr("data-details");
  status = $(that).attr("data-status");

  $("#complain_id").val(id);
  $("#complainant_fname1").val(complainant_fname);
  $("#complainant_mname1").val(complainant_mname);
  $("#complainant_lname1").val(complainant_lname);
  $("#complainant_suffix1").val(complainant_suffix);
  $("#dateComplain1").val(date);
  $("#locationComplain1").val(l);
  $("#timeComplain1").val(time);
  $("#detailComplain1").val(details);
  $("#statusComplain1").val(status);
}

// ! EDIT AWARENESS
function editAwareness(that) {
  id = $(that).attr("data-id");
  complainant_fname = $(that).attr("data-firstname");
  complainant_mname = $(that).attr("data-middlename");
  complainant_lname = $(that).attr("data-lastname");
  complainant_suffix = $(that).attr("data-suffix");
  date = $(that).attr("data-date");
  time = $(that).attr("data-time");
  l = $(that).attr("data-location");
  details = $(that).attr("data-details");
  status = $(that).attr("data-status");

  $("#awareness_id").val(id);
  $("#complainant_fname1").val(complainant_fname);
  $("#complainant_mname1").val(complainant_mname);
  $("#complainant_lname1").val(complainant_lname);
  $("#complainant_suffix1").val(complainant_suffix);
  $("#dateAwareness1").val(date);
  $("#timeAwareness1").val(time);
  $("#locationAwareness1").val(l);
  $("#detailAwareness1").val(details);
  $("#statusAwareness1").val(status);
}

// ! ANNOUNCEMENT
function editAnnouncementSys(that) {
  id = $(that).attr("data-id");
  title = $(that).attr("data-title");
  details = $(that).attr("data-details");
  date_announcement = $(that).attr("data-date_announcement");
  image_announcement = $(that).attr("data-image_announcement");
  begin_date = $(that).attr("data-begin_date");
  end_date = $(that).attr("data-until_date");

  $("#announcement_id").val(id);
  $("#title1").val(title);
  $("#date1").val(date_announcement);
  $("#details1").val(details);
  $("#from1").val(begin_date);
  $("#until1").val(end_date);
  $("#image1").val(image_announcement);
}

function editPassword(that) {
  id = $(that).attr("data-id");
  username = $(that).attr("data-username");
  email = $(that).attr("data-email");

  console.log(email);

  $("#id").val(id);
  $("#username-user1").val(username);
  $("#update-email").val(email);
}

const importBtn = document.querySelector(".importBtn");
const importCon = document.querySelector(".import-container");
if (importBtn) {
  importBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    importCon.style.display = "flex";

    if (importCon.style.display == "flex") {
      const importMain = document.querySelector("#submitImport");

      const fileVal = document.querySelector("#fileToUpload");
      const labelVal = document.querySelector("#labelValue");

      fileVal.addEventListener("change", (e) => {
        if (e.target.value) {
          labelVal.innerHTML = e.target.value;
        }
      });

      importMain.addEventListener("submit", (e) => {
        importCon.style.display = "none";
      });
    }
  });

  document.addEventListener("click", function (event) {
    const importForm = document.querySelector(".import");
    let isClickInside = importForm.contains(event.target);
    if (!isClickInside) {
      importCon.style.display = "none";
    }
  });
}

const restoreBtn = document.querySelector(".restoreBtn");
const restoreCon = document.querySelector(".restore-container");

restoreBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  restoreCon.style.display = "flex";
  console.log("restoreBtn clicked");

  if (restoreCon.style.display == "flex") {
    const restoreMain = document.querySelector("#submitRestore");

    const fileRestore = document.querySelector("#fileToRestore");
    const restoreVal = document.querySelector("#restoreLabel");

    fileRestore.addEventListener("change", (e) => {
      if (e.target.value) {
        restoreVal.innerHTML = e.target.value;
      }
    });

    restoreMain.addEventListener("submit", (e) => {
      restoreCon.style.display = "none";
    });
  }

  document.addEventListener("click", function (event) {
    const restoreForm = document.querySelector(".restoreForm");
    let isRestoreForm = restoreForm.contains(event.target);
    if (!isRestoreForm) {
      restoreCon.style.display = "none";
    }
  });
});

function createAccount(that) {
  id = $(that).attr("data-id");
  fname = $(that).attr("data-fname");
  mname = $(that).attr("data-mname");
  lname = $(that).attr("data-lname");
  age = $(that).attr("data-age");
  gender = $(that).attr("data-gender");
  cstatus = $(that).attr("data-cstatus");
  houseNo = $(that).attr("data-houseNo");
  street = $(that).attr("data-street");
  subdi = $(that).attr("data-subdivision");
  dbirth = $(that).attr("data-dbirth");
  pbirth = $(that).attr("data-pbirth");
  email = $(that).attr("data-email");
  $("#res_id").val(id);
  $("#res_firstname").val(fname);
  $("#res_middlename").val(mname);
  $("#res_lastname").val(lname);
  $("#res_age").val(age);
  $("#res_gender").val(gender);
  $("#res_cstatus").val(cstatus);
  $("#res_houseNo").val(houseNo);
  $("#res_subdivision").val(subdi);
  $("#res_street").val(street);
  $("#res_dbirth").val(dbirth);
  $("#res_pbirth").val(pbirth);
  $("#res_email").val(email);
}

const accountContainer = document.querySelector(".active_account");
const accountBtn = document.querySelectorAll(".accountBtn");

accountBtn.forEach((accBtn) => {
  accBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    accountContainer.style.display = "flex";

    const resSubmit = document.querySelector(".res_submit");
    resSubmit.addEventListener("submit", (e) => {
      console.log("resSubmit");
    });
    document.addEventListener("click", function (event) {
      const accountForm = document.querySelector(".account");
      let isAccountForm = accountForm.contains(event.target);
      console.log("l2");
      if (!isAccountForm) {
        accountContainer.style.display = "none";
      }
    });
  });
});

// Add Households
function displayDetails() {
  document.getElementById("reviewHead").innerText =
    document.getElementById("household-head").value;

  const memberList = document.getElementById("membersTable");
  memberList.innerHTML = "";
  document.querySelectorAll(".member-form").forEach((members) => {
    const tableRow = document.createElement("tr");
    const fields = [
      "firstname",
      "middlename",
      "lastname",
      "dob",
      "sex",
      "pob",
      "citizenship",
      "occupation",
      "civilStatus",
    ];

    fields.forEach((fieldRow) => {
      const tableData = document.createElement("td");

      tableData.innerText = members.querySelector(
        'input[name="firstname"]'
      ).value;
      tableData.innerText = members.querySelector(
        'input[name="middlename"]'
      ).value;
      tableData.innerText = members.querySelector(
        'input[name="lastname"]'
      ).value;
      tableData.innerText = members.querySelector('input[name="dob"]').value;
      tableData.innerText = members.querySelector('input[name="sex"]').value;
      tableData.innerText = members.querySelector('input[name="pob"]').value;
      tableData.innerText = members.querySelector(
        'input[name="citizenship"]'
      ).value;
      tableData.innerText = members.querySelector(
        'input[name="occupation"]'
      ).value;
      tableData.innerText = members.querySelector(
        'input[name="civilStatus"]'
      ).value;
      tableRow.appendChild(tableData);
    });
    memberList.appendChild(tableRow);
  });
}

// ! Chat
// Function to update chat messages
function updateChat() {
  var messagesContainer = document.getElementById("chat-container");
  if (messagesContainer) {
    var isScrolledToBottom =
      messagesContainer.scrollHeight - messagesContainer.clientHeight <=
      messagesContainer.scrollTop + 1;
  }

  var urlParams = new URLSearchParams(window.location.search);
  var fname = urlParams.get("fname");
  var mname = urlParams.get("mname");
  var lname = urlParams.get("lname");

  $.get(
    "./model/get_chat.php?fname=" +
      encodeURIComponent(fname) +
      "&mname=" +
      encodeURIComponent(mname) +
      "&lname=" +
      encodeURIComponent(lname),
    function (messages) {
      $("#chat-container").html(messages);

      if (isScrolledToBottom) {
        scrollChatToBottom();
      }
    }
  );
}

// Periodically update chat messages every 3 seconds
setInterval(updateChat, 3000);

// Submit new message
$("#chatForm").submit(function (e) {
  e.preventDefault();
  console.log("chat");

  $.post("./model/reply_message.php", $("#chatForm").serialize(), function () {
    $("#user-message").val("");
    updateChat();
  });
});

function scrollChatToBottom() {
  var messagesContainer = document.getElementById("chat-container");
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

// ! INQUIRY
// Function to update chat messages
function updateInquiry() {
  var inquiryContainer = document.getElementById("inquiry-container");
  if (inquiryContainer) {
    var isScrolledToBottom =
      inquiryContainer.scrollHeight - inquiryContainer.clientHeight <=
      inquiryContainer.scrollTop + 1;
  }

  var urlParamsInquiry = new URLSearchParams(window.location.search);
  var name = urlParamsInquiry.get("name");

  $.get(
    "./model/get_inquiry.php?name=" + encodeURIComponent(name),
    function (messages) {
      $("#inquiry-container").html(messages);

      if (isScrolledToBottom) {
        scrollChatToBottom();
      }
    }
  );
}

// Periodically update chat messages every 3 seconds
setInterval(updateInquiry, 3000);

// Submit new message
$("#inquiryForm").submit(function (e) {
  e.preventDefault();
  console.log("chat");

  $.post(
    "./model/reply_contact.php",
    $("#inquiryForm").serialize(),
    function () {
      $("#inquiry-user-message").val("");
      updateChat();
    }
  );
});

function scrollChatToBottom() {
  var messagesContainer = document.getElementById("inquiry-container");
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
}
