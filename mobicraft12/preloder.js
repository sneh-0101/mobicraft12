  // Add loading state
  document.body.classList.add('loading');

  // Simulate processing time (3 seconds)
  window.addEventListener("load", () => {
    setTimeout(() => {
      document.getElementById("preloader").style.display = "none";
      document.body.classList.remove('loading');
    }, 1800); // Change 3000 to desired time
  });