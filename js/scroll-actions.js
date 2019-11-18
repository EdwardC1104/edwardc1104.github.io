var tween = TweenLite.to("#hello", 1, {className: "+=big-text"});

const controller = new ScrollMagic.Controller();

const scene = new ScrollMagic.Scene({
	triggerElement: ".animation1",
	duration: 1000,
	triggerHook: 0.25

})
	.setTween(tween)
	.setPin(".animation1")
	.addIndicators()
	.addTo(controller);


/*const LeftToRight = {
	curviness: 2,
	autoRotate: false,
	values: [
		{ x: -0 , y: 0 },
		{ x: window.innerWidth + -680, y: 0 }
	]
};

const tween = new TimelineLite();

tween.add(
	TweenLite.to('#lefttoright', 1, {
		bezier: LeftToRight,
		ease: Power1.easeInOut
	})
);

const controller = new ScrollMagic.Controller();

const scene = new ScrollMagic.Scene({
	triggerElement: ".animation",
	duration: 2000,
	triggerHook: 0.5

})
	.setTween(tween)
	.addIndicators()
	.addTo(controller);*/


/*const flightPath = {
	curviness: 2,
	autoRotate: true,
	values: [
		{ x: 100, y: -20 },
		{ x: 300, y: 10 },
		{ x: 500, y: 100 },
		{ x: 750, y: -100 },
		{ x: 350, y: -50 },
		{ x: 600, y: 100 },
		{ x: 800, y: 0 },
		{ x: window.innerWidth, y: -250 }
	]
};

const tween = new TimelineLite();

tween.add(
	TweenLite.to('.paper-plane', 1, {
		bezier: flightPath,
		ease: Power1.easeInOut
	})
);

const controller = new ScrollMagic.Controller();

const scene = new ScrollMagic.Scene({
	triggerElement: ".animation",
	duration: 1000,
	triggerHook: 0.5

})
	.setTween(tween)
	.addIndicators()
	.addTo(controller);*/