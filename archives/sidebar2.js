
document.addEventListener('DOMContentLoaded', function() {
  var riLink = document.querySelector('.ri');
  var residentInfoLink = document.querySelector('.residentInfo');
  var householdLink = document.querySelector('.household');
  var businessInfoLink = document.querySelector('.businessInfo');
  var ccLink = document.querySelector('.cc');
  var idFormLink = document.querySelector('.idform');
  var bClearanceLink = document.querySelector('.b-clearance');
  var eCertificateLink = document.querySelector('.e-certificate');
  var cIndigencyLink = document.querySelector('.c-indigency');
  var cLateBirthLink = document.querySelector('.c-latebirth');
  var bbClearanceLink = document.querySelector('.bb-clearance');
  var rsLink = document.querySelector('.rs');
  var blotterLink = document.querySelector('.blotter1');
  var complainLink = document.querySelector('.complain1');
  var awarenessLink = document.querySelector('.awareness1');
  var umLink = document.querySelector('.um');
  var usersLink = document.querySelector('.users');
  var cmLink = document.querySelector('.cm');
  var bInformationLink = document.querySelector('.b-information');
  var announcementLink = document.querySelector('.announcement');
  var backupLink = document.querySelector('.backup');
  var restoreLink = document.querySelector('.restore');
  // var requestLink = document.querySelector('.request');
  var sidebar = document.querySelector('.sidebar');

  // Function to hide all sections except the specified one
  function hideSections(exceptSection) {
    var sections = [
      residentInfoLink,
      householdLink,
      businessInfoLink,
      idFormLink,
      bClearanceLink,
      eCertificateLink,
      cIndigencyLink,
      cLateBirthLink,
      bbClearanceLink,
      blotterLink,
      complainLink,
      awarenessLink,
      usersLink,
      bInformationLink,
      announcementLink,
      backupLink,
      restoreLink,
      // requestLink
    ];

    sections.forEach(function(section) {
      if (section !== exceptSection) {
        section.style.display = 'none';
      }
    });
  }
  riLink.addEventListener('click', function(event) {
    event.preventDefault();
    hideSections(residentInfoLink);
    residentInfoLink.style.display = 'block';
    householdLink.style.display = 'block';
    businessInfoLink.style.display = 'block';
    
  });

  ccLink.addEventListener('click', function(event) {
    event.preventDefault();
    hideSections(bClearanceLink);
    idFormLink.style.display = 'block';
    bClearanceLink.style.display = 'block';
    eCertificateLink.style.display = 'block';
    cIndigencyLink.style.display = 'block';
    cLateBirthLink.style.display = 'block';
    bbClearanceLink.style.display = 'block';
  });

  rsLink.addEventListener('click', function(event) {
    event.preventDefault();
    hideSections(complainLink);
    blotterLink.style.display = 'block';
    complainLink.style.display = 'block';
    awarenessLink.style.display = 'block';
  });

  umLink.addEventListener('click', function(event) {
    event.preventDefault();
    hideSections(usersLink);
    usersLink.style.display = 'block';
  });

  cmLink.addEventListener('click', function(event) {
    event.preventDefault();
    hideSections(bInformationLink);
    bInformationLink.style.display = 'block';
    announcementLink.style.display = 'block';
    backupLink.style.display = 'block';
    restoreLink.style.display = 'block';
    // requestLink.style.display = 'block';
  });

  sidebar.addEventListener('mouseleave', function() {
    hideSections(null);
  });
});


