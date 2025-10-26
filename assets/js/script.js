document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".cart-qty").forEach(input => {
    input.addEventListener("change", () => {
      const cartId = input.dataset.cartId;
      const quantity = input.value;

      fetch("update-cart.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `cart_id=${cartId}&quantity=${quantity}`
      })
      .then(res => res.text())
      .then(data => {
        if (data === "updated") {
          location.reload();
        }
      });
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  AOS.init({
    duration: 1200,
    once: true,
    easing: 'ease-in-out',
  });

  // Existing cart AJAX logic here...
});

gsap.from(".hero-overlay h1", {
  y: -50,
  opacity: 0,
  duration: 1.5,
  ease: "power3.out"
});

gsap.from(".hero-overlay p", {
  y: 50,
  opacity: 0,
  duration: 1.5,
  delay: 0.3,
  ease: "power3.out"
});

gsap.from(".btn", {
  scale: 0.8,
  opacity: 0,
  duration: 1,
  delay: 0.6,
  ease: "back.out(1.7)"
});

gsap.utils.toArray(".product-card").forEach(card => {
  gsap.from(card, {
    scrollTrigger: {
      trigger: card,
      start: "top 90%",
      toggleActions: "play none none none"
    },
    y: 30,
    opacity: 0,
    rotateX: 15,
    duration: 1,
    ease: "power2.out"
  });
});

const heroOverlay = document.querySelector(".hero-overlay");
heroOverlay.addEventListener("mousemove", (e) => {
  const { offsetWidth: width, offsetHeight: height } = heroOverlay;
  let x = e.offsetX / width - 0.5;
  let y = e.offsetY / height - 0.5;

  gsap.to(".hero-overlay h1", {
    rotationY: x * 10,
    rotationX: y * 10,
    transformPerspective: 1000,
    ease: "power2.out",
    duration: 0.5
  });

  gsap.to(".hero-overlay p", {
    rotationY: x * 5,
    rotationX: y * 5,
    transformPerspective: 1000,
    ease: "power2.out",
    duration: 0.5
  });
});

heroOverlay.addEventListener("mouseleave", () => {
  gsap.to([".hero-overlay h1", ".hero-overlay p"], {
    rotationY: 0,
    rotationX: 0,
    duration: 0.5
  });
});
