// Clear scroll position when reload
history.scrollRestoration = "manual";

// Handle showing and hiding navbar and change navbar selected

window.onscroll = function () {
  /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
  if (window.scrollY > 80) {
    document.getElementById("navbar").style.bottom = "0";
  } else {
    document.getElementById("navbar").style.bottom = "-80px";
  }
  if (window.scrollY > 152) {
    document.getElementById("musicPlayer").style.bottom = "152px";
  } else {
    document.getElementById("musicPlayer").style.bottom = "-22px";
  }
};

// Handle Animations and Changing opacity of navbar item based on content showed on viewport

// Welcome page
const observerWelcomePageButton = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const buttonWelcome = document.querySelector("#welcomaPage_content_button");

      if (entry?.isIntersecting) {
        setTimeout(() => {
          buttonWelcome.style.visibility = "visible";
          buttonWelcome?.classList.add("animate__zoomIn");
        }, 500);
        return;
      }
    });
  },
  { threshold: 0.3 }
);

observerWelcomePageButton.observe(document.querySelector("#welcomePage"));

// CountaDown page
const observerCountdownPageButton = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const imageTop = document.querySelector("#countDown_top_image").querySelector("img");
      const countDownTitle = document.querySelector("#countDown_title");
      const countDownLine = document.querySelector("#countDown_content").querySelector("hr");
      const countDownDate = document.querySelector("#countDown_date");
      const countDownTimer = document.querySelector("#countDown_timer");
      const countDownButton = document.querySelector("#countDown_content").querySelector("button");
      const countDownText = document.querySelector("#countDown_text");

      if (entry?.isIntersecting) {
        imageTop.style.animation = "slideInDown 1s";
        countDownTitle.style.animation = "fadeInDown 1s";
        countDownLine.style.animation = "fadeInDown 1s";
        countDownDate.style.animation = "fadeInDown 1s";
        countDownText.style.animation = "fadeInUp 1s";

        setTimeout(() => {
          countDownTimer.style.visibility = "visible";
          countDownTimer.style.animation = "zoomIn 1s";
        }, 500);

        setTimeout(() => {
          countDownButton.style.visibility = "visible";
          countDownButton.style.animation = "zoomIn 1s";
        }, 1000);
        return;
      }
    });
  },
  { threshold: 0.3 }
);

observerCountdownPageButton.observe(document.querySelector("#countDown"));

/* Bride */
const observerBride = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      if (entry?.isIntersecting) {
        document.getElementById("bride_button").style.opacity = 1;
        return;
      }
      document.getElementById("bride_button").style.opacity = 0.2;
    });
  },
  { threshold: 0.3 }
);

observerBride.observe(document.querySelector("#bride"));

const firstBride = document.getElementById("first_bride");
const firstBrideObeserver = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      if (entry?.isIntersecting) {
        firstBride.style.visibility = "visible";
        firstBride.style.animation = "zoomIn 1s";
        return;
      }
    });
  },
  { threshold: 0.3 }
);

firstBrideObeserver.observe(firstBride);

const secondBride = document.getElementById("second_bride");
const secondBrideObeserver = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      if (entry?.isIntersecting) {
        secondBride.style.visibility = "visible";
        secondBride.style.animation = "zoomIn 1s";
        return;
      }
    });
  },
  { threshold: 0.3 }
);

secondBrideObeserver.observe(secondBride);

/* Wedding Story */

const weddingStory = document.querySelector("#weddingStory");
const observerWeddingStory = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      if (entry?.isIntersecting) {
        weddingStory.style.visibility = "visible";
        weddingStory.style.animation = "zoomIn 1s";
        setTimeout(() => {
          const title = weddingStory.querySelector("h5");
          title.style.visibility = "visible";
          title.style.animation = "fadeIn 1s";
        }, 500);
        setTimeout(() => {
          const text = weddingStory.querySelector("p");
          text.style.visibility = "visible";
          text.style.animation = "fadeIn 1s";
        }, 1000);
        return;
      }
    });
  },
  { threshold: 0.3 }
);

observerWeddingStory.observe(weddingStory);

/* Date */
const date = document.querySelector("#date");
const observerDate = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const dateTop = document.getElementById("date_top");
      const dateButtom = document.getElementById("date_buttom");
      const dateContainer = document.getElementById("date_container");
      const dateMap = document.getElementById("date_map");

      if (entry?.isIntersecting) {
        document.getElementById("date_button").style.opacity = 1;

        dateTop.style.visibility = "visible";
        dateTop.style.animation = "fadeInDown 1s";

        dateButtom.style.visibility = "visible";
        dateButtom.style.animation = "fadeInUp 1s";

        setTimeout(() => {
          dateContainer.style.visibility = "visible";
          dateContainer.style.animation = "fadeIn 1s";
        }, 500);
        setTimeout(() => {
          dateMap.style.visibility = "visible";
          dateMap.style.animation = "zoomIn 1s";
        }, 1000);
        return;
      }
      document.getElementById("date_button").style.opacity = 0.2;
    });
  },
  { threshold: 0.3 }
);

observerDate.observe(date);

/* Gift */
const gift = document.querySelector("#gift");
const observerGift = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      if (entry?.isIntersecting) {
        document.getElementById("gift_button").style.opacity = 1;
        return;
      }
      document.getElementById("gift_button").style.opacity = 0.2;
    });
  },
  { threshold: 0.8 }
);

const observerGiftAnimation = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const giftCardContainer = gift.querySelector("#gift_card_container");
      if (entry?.isIntersecting) {
        gift.style.visibility = "visible";
        gift.style.animation = "fadeIn 1s";
        setTimeout(() => {
          giftCardContainer.style.visibility = "visible";
          giftCardContainer.style.animation = "zoomIn 1s";
        }, 1000);
        return;
      }
    });
  },
  { threshold: 0.3 }
);

observerGift.observe(gift);
observerGiftAnimation.observe(gift);

/* RSVP */
const rsvp = document.querySelector("#rsvp");
const observerRSVP = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const rsvpForm = document.querySelector("#rsvp_form");
      const rsvpWishesContainer = document.querySelector("#rsvp_wishes_container");
      if (entry?.isIntersecting) {
        document.getElementById("rsvp_button").style.opacity = 1;

        rsvp.style.visibility = "visible";
        rsvp.style.animation = "fadeIn 1s";
        setTimeout(() => {
          rsvpForm.style.visibility = "visible";
          rsvpForm.style.animation = "zoomIn 1s";
        }, 500);
        setTimeout(() => {
          rsvpWishesContainer.style.visibility = "visible";
          rsvpWishesContainer.style.animation = "zoomIn 1s";
        }, 1000);
        return;
      }
      document.getElementById("rsvp_button").style.opacity = 0.2;
    });
  },
  { threshold: 0.3 }
);

observerRSVP.observe(rsvp);

/* Gallery */
const gallery = document.querySelector("#gallery");
const observerGallery = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const galleryImageContainer = document.querySelector(".gallery_images_container");
      const galleryTop = document.getElementById("gallery_top");
      const galleryButtom = document.getElementById("galery_buttom");
      const galleryTitle = document.getElementById("gallery_title");

      if (entry?.isIntersecting) {
        galleryTop.style.visibility = "visible";
        galleryTop.style.animation = "fadeInDown 1s";

        galleryButtom.style.visibility = "visible";
        galleryButtom.style.animation = "fadeInUp 1s";

        setTimeout(() => {
          galleryTitle.style.visibility = "visible";
          galleryTitle.style.animation = "fadeIn 1s";
        }, 500);
        setTimeout(() => {
          galleryImageContainer.style.visibility = "visible";
          galleryImageContainer.style.animation = "slideInUp 1s";
        }, 1000);
        return;
      }
    });
  },
  { threshold: 0.3 }
);

observerGallery.observe(gallery);

/* Clossing Message */
const clossingMessage = document.querySelector("#clossingMessage");
const observerClossingMessage = new IntersectionObserver(
  (entries) => {
    entries?.forEach((entry) => {
      const clossingMessageOrnament = document.getElementById("clossingMessage_ornament_buttom");

      if (entry?.isIntersecting) {
        clossingMessage.style.visibility = "visible";
        clossingMessage.style.animation = "fadeIn 1s";
        setTimeout(() => {
          clossingMessageOrnament.style.visibility = "visible";
          clossingMessageOrnament.style.animation = "slideInUp 1s";
        }, 500);
        return;
      }
    });
  },
  { threshold: 0.3 }
);

observerClossingMessage.observe(clossingMessage);

// Handle behaviour when clicking buka undangan button
const activateScroll = () => {
  console.log("scroll");
  document.body.style.overflow = "scroll";

  var element = document.getElementById("countDown");
  element.scrollIntoView({
    block: "start",
    behavior: "smooth",
  });
  // auto play music when opening invitation
  document.querySelector("audio").play();
  pausedButton.style.display = "none";
  playedButton.style.display = "block";
};

const openInvitationButton = document.getElementById("welcomaPage_content_button");

openInvitationButton.addEventListener("click", activateScroll);

// Handle scroll to section when clicking navbar
const goToAnchor = (anchor) => {
  var element = document.getElementById(anchor);
  element?.scrollIntoView({
    top: 10,
    block: "start",
    behavior: "smooth",
  });
};

const navList = document.querySelectorAll(".nav");
navList?.forEach((element) => {
  const target = element.getAttribute("id").split("_")[0];
  element.addEventListener("click", () => goToAnchor(target));
});

// Handle timer countdown
const getDate = document.querySelector("#countDown_date").getAttribute("attr-val");
var target_date = new Date(getDate).getTime(); // waktu target dalam format timestamp
var countdown = setInterval(function () {
  var current_date = new Date().getTime(); // waktu sekarang dalam format timestamp
  var diff = target_date - current_date; // selisih waktu dalam milidetik

  var days = Math.floor(diff / (1000 * 60 * 60 * 24)); // jumlah hari
  var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // jumlah jam
  var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60)); // jumlah menit
  var seconds = Math.floor((diff % (1000 * 60)) / 1000); // jumlah detik

  if (days < 0 && hours < 0 && minutes < 0 && seconds < 0) {
    days = 0;
    hours = 0;
    minutes = 0;
    seconds = 0;
  }

  document.getElementById("countDown_timer_days").innerHTML = days;
  document.getElementById("countDown_timer_hours").innerHTML = hours;
  document.getElementById("countDown_timer_minutes").innerHTML = minutes;
  document.getElementById("countDown_timer_seconds").innerHTML = seconds;

  if (diff < 0) {
    // jika waktu target sudah lewat, hentikan countdown
    clearInterval(countdown);
    document.getElementById("countDown_timer").innerHTML = "Waktu sudah habis";
  }
}, 1000); // update setiap 1 detik

// Handle word counting and max word for text area
const rsvpTextAreaInput = document.getElementById("rsvp_text_area_input");

function countWord() {
  // Get the input text value
  const words = rsvpTextAreaInput.value;

  // Initialize the word counter
  let count = 0;

  // Split the words on each
  // space character
  const split = words.split(" ");

  // Loop through the words and
  // increase the counter when
  // each split word is not empty
  for (let i = 0; i < split.length; i++) {
    if (split[i] != "") {
      count += 1;
    }
  }

  // Display it as output
  document.getElementById("rsvp_the_count_current").innerHTML = count;
}

function maxWord(e) {
  const maxWords = rsvpTextAreaInput.getAttribute("max-word");
  // Get the input text value
  const words = rsvpTextAreaInput.value;

  // Split the words on each
  // space character
  const split = words.split(" ");
  if (e.keyCode != 8 && e.keyCode != 46 && split?.length > maxWords) {
    e.preventDefault();
  }
}

rsvpTextAreaInput.addEventListener("input", countWord);
rsvpTextAreaInput.addEventListener("keydown", (e) => maxWord(e));

// Handle music player
const playedButton = document.querySelector("#musicPlayer_played");
const pausedButton = document.querySelector("#musicPlayer_paused");

playedButton.addEventListener("click", () => {
  document.querySelector("audio").pause();
  playedButton.style.display = "none";
  pausedButton.style.display = "block";
});
pausedButton.addEventListener("click", () => {
  document.querySelector("audio").play();
  pausedButton.style.display = "none";
  playedButton.style.display = "block";
});

// Handle copy rekening number
const copyButtonRek = document.querySelector("#copy_rekening");
copyButtonRek?.addEventListener("click", (e) => {
  const rekening = copyButtonRek.getAttribute("rek-number");
  navigator.clipboard.writeText(rekening);
  alert("Copied the text: " + rekening);
});

// Handle copy rekening number
const copyButtonAdress = document.querySelector("#copy_adrress");
copyButtonAdress?.addEventListener("click", (e) => {
  const adressDetail = document.querySelector("#address")?.textContent;
  navigator.clipboard.writeText(adressDetail);
  alert("Copied the text: " + adressDetail);
});
