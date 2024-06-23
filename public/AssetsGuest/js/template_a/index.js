// Clear scroll position when reload
history.scrollRestoration = 'manual';

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

}

// Handle Animations and Changing opacity of navbar item based on content showed on viewport

// CountaDown page
const observerCountdownPageButton = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const imageTop = document.querySelector('#countDown_top_image').querySelector('img');
    const countDownContent = document.querySelector('#countDown_content');


    if (entry?.isIntersecting) {
      imageTop.style.animation = 'slideInDown 1s';

      setTimeout(() => {
        countDownContent.style.visibility = 'visible';
        countDownContent.style.animation = 'zoomIn 1s';
  
      }, 800)
	  return;
    }
  });
}, { threshold: 0.3 });

observerCountdownPageButton.observe(document.querySelector('#countDown'));

/* Bride */
const observerBride = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {
          document.getElementById("bride_button").style.opacity = 1;
	    return;
    }
    document.getElementById("bride_button").style.opacity = 0.2;
  });
}, { threshold: 0.3 });

observerBride.observe(document.querySelector('#bride'));

const firstBride = document.getElementById("first_bride")
const firstBrideObeserver = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {
      firstBride.style.visibility = 'visible';
      firstBride.style.animation = 'zoomIn 1s';
	    return;
    }
  });
}, { threshold: 0.3 });

firstBrideObeserver.observe(firstBride);

const secondBride = document.getElementById("second_bride");
const secondBrideObeserver = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {
      secondBride.style.visibility = 'visible';
      secondBride.style.animation = 'zoomIn 1s';
	    return;
    }
  });
}, { threshold: 0.3 });

secondBrideObeserver.observe(secondBride);


/* Wedding Story */

const weddingStory = document.querySelector('#weddingStory');
const observerWeddingStory = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {
      setTimeout(() => {
        weddingStory.style.visibility = 'visible';
        weddingStory.style.animation = 'zoomIn 1s';
      }, 800);
	    return;
    }
  });
}, { threshold: 0.3 });

observerWeddingStory.observe(weddingStory);


/* Date */
const date = document.querySelector('#date');
const observerDate = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    const dateTopLeft = document.getElementById("date_top_left");
    const dateTopRight = document.getElementById("date_top_right");
    const dateButtomLeft = document.getElementById("date_buttom_left");
    const dateButtomRight = document.getElementById("date_buttom_right");
    const dateContainer = document.getElementById("date_container");

    if (entry?.isIntersecting) {
      document.getElementById("date_button").style.opacity = 1;

      setTimeout(() => {
        dateTopLeft.style.visibility = 'visible';
        dateTopLeft.style.animation = 'rotateInDownLeft 1s';
  
        dateTopRight.style.visibility = 'visible';
        dateTopRight.style.animation = 'rotateInDownRight 1s';  

        dateButtomLeft.style.visibility = 'visible';
        dateButtomLeft.style.animation = 'rotateInUpLeft 1s';
  
        dateButtomRight.style.visibility = 'visible';
        dateButtomRight.style.animation = 'rotateInUpRight 1s';  

        dateContainer.style.visibility = 'visible';
        dateContainer.style.animation = 'fadeIn 1s';
      }, 800);
	    return;
    }
    document.getElementById("date_button").style.opacity = 0.2;
  });
}, { threshold: 0.3 });

observerDate.observe(date);

/* Gift */
const gift = document.querySelector('#gift');
const observerGift= new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {
          document.getElementById("gift_button").style.opacity = 1;
	    return;
    }
    document.getElementById("gift_button").style.opacity = 0.2;
  });
}, { threshold: 0.8 });

const observerGiftAnimation= new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    const giftCardContainer = gift.querySelector('#gift_card_container')
    if (entry?.isIntersecting) {
      gift.style.visibility = 'visible';
      gift.style.animation = 'fadeIn 1s';
      setTimeout(() => {
        giftCardContainer.style.visibility = 'visible';
        giftCardContainer.style.animation = 'zoomIn 1s';
      }, 1000)
	    return;
    }
  });
}, { threshold: 0.3 });

observerGift.observe(gift);
observerGiftAnimation.observe(gift);

/* RSVP */
const rsvp = document.querySelector('#rsvp');
const observerRSVP = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const rsvpForm = document.querySelector('#rsvp_form');
    const rsvpWishesContainer = document.querySelector('#rsvp_wishes_container');
    if (entry?.isIntersecting) {
      document.getElementById("rsvp_button").style.opacity = 1;
      
      rsvp.style.visibility = 'visible';
      rsvp.style.animation = 'fadeIn 1s';
      setTimeout(() => {
        rsvpForm.style.visibility = 'visible';
        rsvpForm.style.animation = 'zoomIn 1s';
      }, 500);
      setTimeout(() => {
        rsvpWishesContainer.style.visibility = 'visible';
        rsvpWishesContainer.style.animation = 'zoomIn 1s';
      }, 1000);
	    return;
    }
    document.getElementById("rsvp_button").style.opacity = 0.2;
  });
}, { threshold: 0.3 });

observerRSVP.observe(rsvp);


/* Gallery */
const gallery = document.querySelector('#gallery');
const observerGallery = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const galleryImageContainer = document.querySelector('.gallery_images_container');
    const galleryTopLeft = document.getElementById("gallery_top_left");
    const galleryTopRight = document.getElementById("gallery_top_right");
    const galleryTopLine = document.getElementById("gallery_top_line");

    const galleryButtomLeft = document.getElementById("gallery_buttom_left");
    const galleryButtomRight = document.getElementById("gallery_buttom_right");
    const galleryButtomLine = document.getElementById("gallery_buttom_line");

    const galleryTitle = document.getElementById("gallery_title");

    if (entry?.isIntersecting) {
      setTimeout(() => {
        galleryTopLine.style.visibility = 'visible';
        galleryTopLine.style.animation = 'fadeInDown 1s';

        galleryTopLeft.style.visibility = 'visible';
        galleryTopLeft.style.animation = 'rotateInDownLeft 1s';
  
        galleryTopRight.style.visibility = 'visible';
        galleryTopRight.style.animation = 'rotateInDownRight 1s';  

        galleryTitle.style.visibility = 'visible';
        galleryTitle.style.animation = 'fadeIn 1s';

        galleryButtomLeft.style.visibility = 'visible';
        galleryButtomLeft.style.animation = 'rotateInUpLeft 1s';
  
        galleryButtomRight.style.visibility = 'visible';
        galleryButtomRight.style.animation = 'rotateInUpRight 1s'; 
        
        galleryButtomLine.style.visibility = 'visible';
        galleryButtomLine.style.animation = 'fadeInUp 1s';
      },500);
      setTimeout(() => {
        galleryImageContainer.style.visibility = 'visible';
        galleryImageContainer.style.animation = 'slideInUp 1s';
      }, 1000);
	    return;
    }
  });
}, { threshold: 0.3 });

observerGallery.observe(gallery);

/* Clossing Message */
const clossingMessage = document.querySelector('#clossingMessage_content');
const observerClossingMessage = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const clossingMessageOrnament = document.getElementById("clossingMessage_ornament_buttom");

    if (entry?.isIntersecting) {
           

      setTimeout(() => {
        clossingMessageOrnament.style.visibility = 'visible';
        clossingMessageOrnament.style.animation = 'slideInUp 1s';
      }, 500);
      setTimeout(() => {
        clossingMessage.style.visibility = 'visible';
        clossingMessage.style.animation = 'fadeIn 1s';
      }, 800);
	    return;
    }
  });
}, { threshold: 0.3 });

observerClossingMessage.observe(clossingMessage);

// Handle behaviour when clicking buka undangan button
const activateScroll = () => {
  document.body.style.overflow = 'scroll';

  var element = document.getElementById('countDown');
  element.scrollIntoView({
    block: 'start',
    behavior: 'smooth'
  });
  // auto play music when opening invitation
  document.querySelector("audio").play();
  pausedButton.style.display = 'none';
  playedButton.style.display = 'block';
}

const openInvitationButton = document.getElementById('welcomaPage_content_button');

openInvitationButton.addEventListener('click', activateScroll);


// Handle scroll to section when clicking navbar
const goToAnchor = (anchor) => {
  var element = document.getElementById(anchor);
  element?.scrollIntoView({
    top: 10,
    block: 'start',
    behavior: 'smooth'
  });

}

const navList = document.querySelectorAll('.nav');
navList?.forEach((element) => {
  const target = element.getAttribute('id').split('_')[0];
  element.addEventListener('click', () => goToAnchor(target));
});


// Handle timer countdown
const getDate = document.querySelector('#countDown_date').getAttribute('attr-val');
var target_date = new Date(getDate).getTime(); // waktu target dalam format timestamp
var countdown = setInterval(function() {
var current_date = new Date().getTime(); // waktu sekarang dalam format timestamp
var diff = target_date - current_date; // selisih waktu dalam milidetik

var days = Math.floor(diff / (1000 * 60 * 60 * 24)); // jumlah hari
var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)); // jumlah jam
var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60)); // jumlah menit
var seconds = Math.floor((diff % (1000 * 60)) / 1000); // jumlah detik

if (days < 0 && hours < 0 && minutes < 0 && seconds < 0) {
    days = 0 
    hours = 0
    minutes = 0
    seconds = 0
}

document.getElementById("countDown_timer_days").innerHTML = days 
document.getElementById("countDown_timer_hours").innerHTML = hours
document.getElementById("countDown_timer_minutes").innerHTML = minutes
document.getElementById("countDown_timer_seconds").innerHTML = seconds 

if (diff < 0) { // jika waktu target sudah lewat, hentikan countdown
    clearInterval(countdown);
    document.getElementById("countDown_timer").innerHTML = "Waktu sudah habis";
}
}, 1000); // update setiap 1 detik


// Handle word counting and max word for text area
const rsvpTextAreaInput = document.getElementById('rsvp_text_area_input');

function countWord() { 
          
  // Get the input text value 
  const words = rsvpTextAreaInput.value; 

  // Initialize the word counter 
  let count = 0; 

  // Split the words on each 
  // space character  
  const split = words.split(''); 

  // Loop through the words and  
  // increase the counter when  
  // each split word is not empty 
  for (let i = 0; i < split.length; i++) { 
      if (split[i] != "") { 
          count += 1; 
      } 
  } 

  // Display it as output 
  document.getElementById("rsvp_the_count_current") 
    .innerHTML = count; 
} 

rsvpTextAreaInput.addEventListener('input', countWord);

// Handle music player
const playedButton = document.querySelector("#musicPlayer_played");
const pausedButton = document.querySelector("#musicPlayer_paused");

playedButton.addEventListener("click", () => {
  document.querySelector("audio").pause();
  playedButton.style.display = 'none';
  pausedButton.style.display = 'block';
});
pausedButton.addEventListener("click", () => {
  document.querySelector("audio").play();
  pausedButton.style.display = 'none';
  playedButton.style.display = 'block';
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
