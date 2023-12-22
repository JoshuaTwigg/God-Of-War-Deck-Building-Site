
const element = document.getElementById("horseImg");

// Define the options for the Intersection Observer
const options = {
  root: null,
  rootMargin: '0px',
  threshold: 0
};

// Create a new Intersection Observer
const observer = new IntersectionObserver(function(entries, observer) {
  entries.forEach(entry => {
    // If element is in viewport, add the 'show' class to trigger the animation
    if (entry.isIntersecting) {
      element.classList.add('show');
      // console.log("SHOWING")
    }
    else {
      element.classList.remove('show');
    }
  });
}, options);

// Start observing the element
observer.observe(element);


// window.addEventListener("scroll",()=>{
//     const scrollAmount = window.scrollY
//     console.log(scrollAmount) 
// })
    
       


