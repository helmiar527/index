const serviceCard = document.querySelectorAll(".service-card");
const img = document.querySelectorAll(".img-fluid");

serviceCard.forEach((card, i) => {
  card.dataset.aos = "flip-up";
  card.dataset.aosDelay = i * 100;
  card.dataset.aosDuration = 1000;
});
img.forEach((img, i) => {
  img.dataset.aos = "zoom-in";
  img.dataset.aosDelay = i * 100;
  img.dataset.aosDuration = 1000;
});
AOS.init({
  once: false,
  duration: 1500,
});

gsap.registerPlugin(TextPlugin);
gsap.to(".welcome", {
  duration: 3,
  text: "Welcome To My Website HelmiAR527",
});
gsap.from(".desc", {
  opacity: 0,
  delay: 0.5,
  duration: 1,
  y: -100,
});
gsap.from(".taucari", {
  opacity: 0,
  delay: 1,
  duration: 1,
});
gsap.to(".index1", {
  scrollTrigger: ".index1",
  duration: 3,
  text: "Convenience in every activity.",
});
gsap.from(".main-nav-1", {
  opacity: 0,
  duration: 1,
  y: -100,
});
gsap.from(".main-nav-2", {
  opacity: 0,
  duration: 1,
  delay: 0.1,
  y: -100,
});
gsap.from(".main-nav-3", {
  opacity: 0,
  duration: 1,
  delay: 0.2,
  y: -100,
});
gsap.from(".main-nav-4", {
  opacity: 0,
  duration: 1,
  delay: 0.3,
  y: -100,
});
gsap.from(".main-nav-5", {
  opacity: 0,
  duration: 1,
  delay: 0.4,
  y: -100,
});
gsap.from(".main-nav-6", {
  opacity: 0,
  duration: 1,
  delay: 0.5,
  y: -100,
});
gsap.from(".main-nav-7", {
  opacity: 0,
  duration: 1,
  delay: 0.6,
  y: -100,
});
