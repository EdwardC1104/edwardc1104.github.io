AOS.init({
    duration: 800
});

const flightPath = {
    curviness: 1.25,
    autoRotate: true,
    values: [
        {x: (window.innerWidth * 0.25), y: (window.innerHeight * -0.02)},
        {x: (window.innerWidth * 0.5), y: (window.innerHeight * 0.01)},
        {x: (window.innerWidth * 0.7 ), y: (window.innerHeight * 0.03)},
        {x: (window.innerWidth), y: (window.innerHeight * -0.05)}
    ]
}

const tween = new TimelineLite();

tween.add(
 TweenLite.to(".fish", 1, {
  bezier: flightPath,
  ease: Power1.easeInOut
 })
);

const controller = new ScrollMagic.Controller();

const scene = new ScrollMagic.Scene({
    triggerElement: ".reef-animation",
    duration: 1500,
    triggerHook: 0.75,
    offset: 300
})
    .setTween(tween)
    //.addIndicators()
    .addTo(controller);
