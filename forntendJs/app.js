const activeMenuEl = document.querySelector("#active-menu");
const activeConEl = document.querySelector("#active-container");

const menuEl = document.querySelector("#menu");
if (menuEl !== null) {
  menuEl.addEventListener("click", () => {
    activeMenuEl.classList.add("show");
  });
}

const closeMenuEl = document.querySelector("#close-menu");
if (closeMenuEl !== null) {
  closeMenuEl.addEventListener("click", () => {
    activeMenuEl.classList.remove("show");
  });
}

const serviceNoAcc = document.querySelectorAll(".service-noAcc");

const loginEl = document.querySelectorAll(".login");
const activeLogin = document.querySelector(".active-login");
const closeLoginEl = document.querySelector(".active-login-close");

loginEl.forEach((login) => {
  login.addEventListener("click", () => {
    console.log("log");
    activeLogin.style.display = "block";

    closeLoginEl.addEventListener("click", () => {
      activeLogin.style.display = "none";
    });
  });
});
serviceNoAcc.forEach((noAcc) => {
  noAcc.addEventListener("click", () => {
    console.log("no account");
    activeLogin.style.display = "block";

    closeLoginEl.addEventListener("click", () => {
      activeLogin.style.display = "none";
    });
  });
});

// * subHeader
const subHeaderEl = document.querySelector("#subHeader");
document.addEventListener("scroll", (e) => {
  if (window.screen.width > 375) {
    if (window.scrollY > 310) {
      subHeaderEl.classList.add("scroll");
    } else {
      subHeaderEl.classList.remove("scroll");
    }
  } else {
    subHeaderEl.classList.remove("scroll");
  }
});
// * End of subHeader

// * Services

const serviceBtn = document.querySelectorAll(".service-btn");
const serviceEl = document.querySelectorAll(".active-service");
const closeService = document.querySelectorAll(".active-service-close");
const submitRequest = document.querySelectorAll(".active-service-request");
const successEl = document.querySelector(".active-success");
const forEl = document.querySelectorAll(".for");
const requestorEl = document.querySelectorAll(".requestor");
const requestorName = document.querySelectorAll(".requestorName");

serviceBtn.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    serviceEl[i].style.display = "block";
    console.log("Service", i);

    closeService[i].addEventListener("click", () => {
      serviceEl[i].style.display = "none";
    });

    forEl.forEach((forService, i) => {
      forService.addEventListener("change", (e) => {
        if (e.target.value === "Someone") {
          console.log("Service for someone", e.target.value);

          requestorEl[i].style.display = "flex";
          requestorName[i].setAttribute("required", "");
        } else {
          requestorEl[i].style.display = "none";
          requestorName[i].removeAttribute("required", "");
        }
      });
    });
  });
});

// * REPORT

const reportBtn = document.querySelectorAll(".report-btn");
const activeReport = document.querySelectorAll(".active-report");
const closeReport = document.querySelectorAll(".active-report-close");
const submitReport = document.querySelectorAll(".active-report-submit");

reportBtn.forEach((btn, i) => {
  btn.addEventListener("click", () => {
    activeReport[i].style.display = "block";

    closeReport[i].addEventListener("click", () => {
      activeReport[i].style.display = "none";
    });
  });
});

// ! confirmation for requesting and report
const activeForm = document.querySelectorAll(".main-form");

const fakeBtn = document.querySelectorAll(".fake-btn");
const confirmation = document.querySelectorAll(".confirmation");
const cancelRequest = document.querySelectorAll(".cancel-request");

fakeBtn.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    confirmation[index].style.display = "flex";
    activeForm[index].style.display = "none";
    console.log(index);
  });

  cancelRequest[index].addEventListener("click", () => {
    confirmation[index].style.display = "none";
    activeForm[index].style.display = "block";
  });
});

// * CANCEL REQUEST
const cancelItem = document.querySelectorAll(".cancel-item");
const cancelContainer = document.querySelectorAll(".cancel-container");
const abortCancelItem = document.querySelectorAll(".abort-cancel-item");

cancelItem.forEach((btn, index) => {
  btn.addEventListener("click", () => {
    cancelContainer[index].style.display = "flex";
  });

  abortCancelItem[index].addEventListener("click", () => {
    cancelContainer[index].style.display = "none";
  });
});

// TODO it shows the message but it goes to the top to show the message
const closeMessage = document.querySelector(".close-icon-message");
document.addEventListener("DOMContentLoaded", function () {
  if (successEl) {
    successEl.style.display = "block";
    // setTimeout(function () {
    //   successEl.style.display = "none";
    // }, 2000);
    closeMessage.addEventListener("click", () => {
      successEl.style.display = "none";
    });
  }
});
// TODO end

// * End of services

// * Announcements\
// * End of Announcements

/// * car table scroll
// const cartBody = document.querySelector("table tbody");
// console.log("table cart");
// // Check if the number of rows exceeds 5, then add the scroll class
// if (cartBody && cartBody.rows.length > 10) {
//   cartBody.classList.add("scroll");
// }

// ! CHAT
const chatBtn = document.querySelector(".chat-btn");
const chatScreen = document.querySelector(".chat-screen");
const closeChat = document.querySelector(".close-chat");

chatBtn.addEventListener("click", () => {
  // Get the computed style of the element
  const computedStyle = window.getComputedStyle(chatScreen);
  const currentTransform = computedStyle.transform;

  // Check the current transform value
  if (currentTransform === "matrix(1, 0, 0, 1, 1000, 0)") {
    chatScreen.style.transform = "translateX(0)";
  } else {
    chatScreen.style.transform = "translateX(1000px)";
    chatBtn.style.display = "flex";
  }
});

closeChat.addEventListener("click", () => {
  chatScreen.style.transform = "translate(1000px)";
  chatBtn.style.display = "flex";
});

// Function to update chat messages
function updateChat() {
  var messagesContainer = document.getElementById("messagesContainer");
  var isScrolledToBottom =
    messagesContainer.scrollHeight - messagesContainer.clientHeight <=
    messagesContainer.scrollTop + 1;

  $.get("./frontendModel/get_chat.php", function (messages) {
    $("#messagesContainer").html(messages);

    if (isScrolledToBottom) {
      scrollChatToBottom();
    }
  });
}

// Periodically update chat messages every 3 seconds
setInterval(updateChat, 3000);

// Submit new message
$("#chatForm").submit(function (e) {
  e.preventDefault();
  console.log("chat");

  $.post(
    "./frontendModel/send_chat.php",
    $("#chatForm").serialize(),
    function () {
      $("#messageInput").val("");
      updateChat();
      console.log("chat2");
    }
  );
});

function scrollChatToBottom() {
  var messagesContainer = document.getElementById("messagesContainer");
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

// ! PROFILE
const downBtn = document.querySelector(".down-btn");
const profileOption = document.querySelector(".profile-option");

downBtn.addEventListener("click", () => {
  profileOption.style.height = "fit-content";
  profileOption.style.padding = ".5rem";
});

// ! AWARENESS CONFIRMATION
const awarenessBtn = document.querySelector(".awarenessBtn");
const awarenessConfirmationCon = document.querySelector(".confirmAwareness");
const cancelAwareness = document.querySelector(".cancelAwareness");

awarenessBtn.addEventListener("click", () => {
  awarenessConfirmationCon.style.display = "flex";

  cancelAwareness.addEventListener("click", () => {
    awarenessConfirmationCon.style.display = "none";
  });
});
