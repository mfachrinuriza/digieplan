// Clear scroll position when reload
history.scrollRestoration = 'manual';

document.querySelector('.scroller').onscroll = function () {
   if (document.querySelector('.scroller').scrollTop > 90) {
     document.getElementById("musicPlayer").style.bottom = "90px";
   } else {
     document.getElementById("musicPlayer").style.bottom = "-22px";
  }
}
 
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


 

// Handle Animations and Changing opacity of navbar item based on content showed on viewport

const flowerTopLeft = document.querySelector('#flowerTopLeft');
const flowerTopRight = document.querySelector('#flowerTopRight');
const flowerBottomLeft = document.querySelector('#flowerBottomLeft');
const flowerBottomRight = document.querySelector('#flowerBottomRight');

const flowerContainerRectangle = document.querySelector('#white_rectangle');

// CountaDown page
const observerCountdownPageTop = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
  
    const countDownContent = document.querySelector('#countDown_content');
    const countDownTimer = document.querySelector('#countDown_timer');


    if (entry?.isIntersecting) {
      countDownContent.style.visibility = 'visible';
      countDownContent.style.animation = 'zoomIn 1s';
      setTimeout(() => {
        flowerTopLeft.style.visibility = 'visible';
        flowerTopLeft.style.animation = 'fadeInLeft 1s';
        
        flowerTopRight.style.visibility = 'visible';
        flowerTopRight.style.animation = 'fadeInRight 1s';

        flowerBottomLeft.style.visibility = 'visible';
        flowerBottomLeft.style.animation = 'fadeInLeft 1s';
        
        flowerBottomRight.style.visibility = 'visible';
        flowerBottomRight.style.animation = 'fadeInRight 1s';
      }, 800);

      setTimeout(() => {
        countDownTimer.style.visibility = 'visible';
        countDownTimer.style.animation = 'zoomIn 1s';
      }, 1000)

      flowerContainerRectangle.style.visibility = 'hidden';
	  return;
    }
  });
}, { threshold: 0.1 });

observerCountdownPageTop.observe(document.querySelector('#countDown'));

/* Bride */
const firstBride = document.getElementById("first_bride")
const firstBrideObeserver = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {
      firstBride.style.visibility = 'visible';
      firstBride.style.animation = 'zoomIn 1s';
      flowerContainerRectangle.style.visibility = 'visible';
      flowerContainerRectangle.style.animation = 'zoomIn 1s';
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


const bride = document.getElementById("bride_content");
const brideObeserver = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    if (entry?.isIntersecting) {

      bride.style.visibility = 'visible';
      bride.style.animation = 'zoomIn 1s';
	    return;
    }
  });
}, { threshold: 0.3 });

brideObeserver.observe(bride);


/* Wedding Story */

const weddingStory = document.querySelector('#weddingStory_content');
const observerWeddingStory = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    if (entry?.isIntersecting) {

      weddingStory.style.visibility = 'visible';
      weddingStory.style.animation = 'zoomIn 1s';
    }
    else {
      // flowerContainer.style.height = '100vh';
    }
    return;
  });
}, { threshold: 0.3 });

observerWeddingStory.observe(weddingStory);


/* Date */
const date = document.querySelector('#date');
const observerDate = new IntersectionObserver(entries => {
  entries?.forEach(entry => {

    const dateContainer = document.getElementById("date_container");

    if (entry?.isIntersecting) {

      document.querySelector("body").scrollTo(0, 0);
      dateContainer.style.visibility = 'visible';
      dateContainer.style.animation = 'fadeIn 1s';
	    return;
    }
  });
}, { threshold: 0.3 });

observerDate.observe(date);

/* Gift */
const gift = document.querySelector('#gift');

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

observerGiftAnimation.observe(gift);

/* RSVP */
const rsvp = document.querySelector('#rsvp_content');
const observerRSVP = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const rsvpForm = document.querySelector('#rsvp_form');
    const rsvpWishesContainer = document.querySelector('#rsvp_wishes_container');

    if (entry?.isIntersecting) {

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
  });
}, { threshold: 0.3 });

observerRSVP.observe(rsvp);

/* INSTAGRAM FILTER */
const filter = document.querySelector('#filter');
const observerFilter = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const filterContent = document.querySelector('#filter_content');
    
    if (entry?.isIntersecting) {
      filterContent.style.visibility = 'visible';
      filterContent.style.animation = 'zoomIn 1s';
    }
  });
}, { threshold: 0.3 });

observerFilter.observe(filter);

/* Gallery */
const gallery = document.querySelector('#gallery');
const observerGallery = new IntersectionObserver(entries => {
  entries?.forEach(entry => {
    const galleryImageContainer = document.querySelector('.gallery_images_container');
    const galleryDivider = document.getElementById("gallery_divider");
    const galleryTitle = document.getElementById("gallery_title");

    if (entry?.isIntersecting) {
      setTimeout(() => {
        galleryTitle.style.visibility = 'visible';
        galleryTitle.style.animation = 'fadeIn 1s';
        
        galleryDivider.style.visibility = 'visible';
        galleryDivider.style.animation = 'fadeIn 1s';
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
    if (entry?.isIntersecting) {
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
  document.querySelector('.scroller').style.overflowY = 'scroll';

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

// Form validation
window.onload = function () {

  var form = document.getElementById("rsvp_form");

  var pristine = new Pristine(form);

  form.addEventListener('submit', function (e) {
      e.preventDefault();
      var valid = pristine.validate();
      if (valid) {
          const formValue = Object.values(form).reduce((obj,field) => { obj[field.name] = field.value; return obj }, {})
          alert('Form is valid: ' + formValue);
          form.reset();
      }
      });
};


