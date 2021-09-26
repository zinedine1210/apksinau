// Komentar GSAP
gsap.registerPlugin(TextPlugin);
gsap.from(".kplTimeline", {
  duration: 1,
  y: -50,
  ease: "bounce"
})

gsap.to(".jumbot h1", {
  duration: 2.5,
  text: "Yuk kenalan dengan Teman Sinau lainnya"
});

gsap.from(".jumbot p", {
  delay: 2.5,
  duration: 2,
  opacity: 0,
  x: -100,
  ease: "elastic"
});

gsap.from(".detailmember .col-9", {
  opacity: 0,
  duration: 3,
  text: ""
})

// AKhir GSAP

// AOS
AOS.init({
  duration: 1000
});
// Akhir AOS

function goBack() {
  window.history.back();
}